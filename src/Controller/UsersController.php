<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry; 
use Cake\ORM\Query\SelectQuery;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\Utility\Security;
use Cake\Event\Event;
use Cake\I18n\FrozenTime;
use Cake\Datasource\ConnectionManager;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Database\StatementInterface;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Initialize controller
     *
     * @return void
     */
   

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);
        
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        
        $querysalle = $this->fetchTable('Ulcosalles')->find();
        $querysalle->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($querysalle);
        
   $filter = ['Ulcosalles.idschool'=>$codeetabli];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    //->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);
        $this->stat(); 
        $this->set(compact('ulcosalles'));
        $this->set(compact('users'));
       
        $this->set('mtnotes',$mtnote);
        $this->set('classe','home');
         
    }
    
    public function stat()
    {
       
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        
        $querysalle = $this->fetchTable('Ulcosalles')->find();
        $querysalle->where(['idschool'=>$codeetabli]);
        $ns = $querysalle->count();
        
        $queryeleve = $this->fetchTable('Ulcostudents')->find();
        $queryeleve->where(['idschool'=>$codeetabli]);
        $ne = $queryeleve->count();
        
        $queryprof = $this->fetchTable('Ulcoprofs')->find();
        $queryprof->where(['idschool'=>$codeetabli]);
        $np=$queryprof->count();
        
        $filterstat = ['Ulcosalles.idschool'=>$codeetabli];
                
   $mtnotestat=$this->fetchTable('Ulconotes')->find();
   $mtnotestat->select(['totalmarks' => $mtnotestat->func()->sum('note'),'totalseq' => $mtnotestat->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filterstat)
    //->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);
        
   
       $this->set('ne',$ne);
       $this->set('ns',$ns);
       $this->set('np',$np);
        /*$statresult = array('ns' => $ns, 'ne'=>$ne);
              exit(json_encode($statresult)); */  
      
     $this->set('pgs',$mtnotestat);   
    }
    
     public function direction()
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $query = $this->Users->find();
        $users = $this->paginate($query);
        
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        
        $querysalle = $this->fetchTable('Ulcosalles')->find();
        $querysalle->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($querysalle);
         
         $filter = ['Ulcosalles.idschool'=>$codeetabli];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    //->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);
      
        $this->set('mtnotes',$mtnote);
        $this->set(compact('ulcosalles'));
        $this->set(compact('users'));
        $this->set('classe','home');
        $this->stat();  
    }
    
    public function prof()
    {
        $this->viewBuilder()->setLayout('proflayout');
        $query = $this->Users->find();
        $users = $this->paginate($query);
        
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $telprof=$user->tel;
        
        $esetp = $this->fetchTable('Ulcoprofs')->find();
		$esetp->select(['id','Tel']);
		$esetp->where(['Tel' => $telprof]);
        $rowsp = $esetp->count();
        if($rowsp==1){
                    
		foreach ($esetp as $rowsp) {
            
            $idprof=$rowsp->id;
            
           
        } 
        } 
      
        
        $filter = ['Ulcoenseignes.ulcoprof_id'=>$idprof,'Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filter) {
        return $q->where($filter);
    }); 
        
   
    $filter2 = ['ulcoprof_id'=>$idprof];            
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       ->where($filter2);
        
        $this->stat();

        
        $this->set('profsalles',$query);
        $this->set('mtnotes',$mtnote);
        $this->set(compact('users'));
        $this->set('classe','home');
    }
    
    
    public function timet()
    {
        $this->viewBuilder()->setLayout('proflayout');
        $query = $this->Users->find();
        $users = $this->paginate($query);
        
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $telprof=$user->tel;
        
        $esetp = $this->fetchTable('Ulcoprofs')->find();
		$esetp->select(['id','Tel']);
		$esetp->where(['Tel' => $telprof]);
        $rowsp = $esetp->count();
        if($rowsp==1){
                    
		foreach ($esetp as $rowsp) {
            
            $idprof=$rowsp->id;
            
           
        } 
        } 
      
        
        $filter = ['Ulcoenseignes.ulcoprof_id'=>$idprof,'Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filter) {
        return $q->where($filter);
    }); 
        
    //LUNDI
    
     $filterlun = ['Ulcotimetables.idschool'=>$codeetabli,'ulcoprof_id'=>$idprof,'Jour'=>'1'];
                
   $lun=$this->fetchTable('Ulcotimetables')->find();
   $lun->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filterlun)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcosalles'])
    ->enableAutoFields(true);
        
$filtermar = ['Ulcotimetables.idschool'=>$codeetabli,'ulcoprof_id'=>$idprof,'Jour'=>'2'];
                
   $mar=$this->fetchTable('Ulcotimetables')->find();
   $mar->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filtermar)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcosalles'])
    ->enableAutoFields(true);
       
$filtermer = ['Ulcotimetables.idschool'=>$codeetabli,'ulcoprof_id'=>$idprof,'Jour'=>'3'];
                
   $mer=$this->fetchTable('Ulcotimetables')->find();
   $mer->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filtermer)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcosalles'])
    ->enableAutoFields(true);
        
$filterjeu = ['Ulcotimetables.idschool'=>$codeetabli,'ulcoprof_id'=>$idprof,'Jour'=>'4'];
                
   $jeu=$this->fetchTable('Ulcotimetables')->find();
   $jeu->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filterjeu)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcosalles'])
    ->enableAutoFields(true);
   
 
$filterven = ['Ulcotimetables.idschool'=>$codeetabli,'ulcoprof_id'=>$idprof,'Jour'=>'5'];
                
   $ven=$this->fetchTable('Ulcotimetables')->find();
   $ven->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filterven)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcosalles'])
    ->enableAutoFields(true);
        
        $this->stat();

         $this->set('lundis',$lun);
         $this->set('mardis',$mar);
         $this->set('mercredis',$mer);
         $this->set('jeudis',$jeu);
         $this->set('vendredis',$ven);
        $this->set('profsalles',$query);
        $this->set(compact('users'));
        $this->set('classe','home');
    }
    
    
    
    public function timetdir($id=null)
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $query = $this->Users->find();
        $users = $this->paginate($query);
        
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $telprof=$user->tel;
        $idprof=$id;
     
        $esetp = $this->fetchTable('Ulcoprofs')->find();
		$esetp->where(['id' => $idprof]);
        $rowsp = $esetp->count();
        if($rowsp==1){
                    
		foreach ($esetp as $rowsp) {
            
            $nomprof=$rowsp->full_name;
            
           
        } 
        } 
        
        $filter = ['Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filter) {
        return $q->where($filter);
    }); 
        
    //LUNDI
    
     $filterlun = ['Ulcotimetables.idschool'=>$codeetabli,'ulcoprof_id'=>$idprof,'Jour'=>'1'];
                
   $lun=$this->fetchTable('Ulcotimetables')->find();
   $lun->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filterlun)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcosalles'])
    ->enableAutoFields(true);
        
$filtermar = ['Ulcotimetables.idschool'=>$codeetabli,'ulcoprof_id'=>$idprof,'Jour'=>'2'];
                
   $mar=$this->fetchTable('Ulcotimetables')->find();
   $mar->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filtermar)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcosalles'])
    ->enableAutoFields(true);
       
$filtermer = ['Ulcotimetables.idschool'=>$codeetabli,'ulcoprof_id'=>$idprof,'Jour'=>'3'];
                
   $mer=$this->fetchTable('Ulcotimetables')->find();
   $mer->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filtermer)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcosalles'])
    ->enableAutoFields(true);
        
$filterjeu = ['Ulcotimetables.idschool'=>$codeetabli,'ulcoprof_id'=>$idprof,'Jour'=>'4'];
                
   $jeu=$this->fetchTable('Ulcotimetables')->find();
   $jeu->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filterjeu)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcosalles'])
    ->enableAutoFields(true);
   
 
$filterven = ['Ulcotimetables.idschool'=>$codeetabli,'ulcoprof_id'=>$idprof,'Jour'=>'5'];
                
   $ven=$this->fetchTable('Ulcotimetables')->find();
   $ven->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filterven)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcosalles'])
    ->enableAutoFields(true);
        
        $this->stat();

         $this->set('lundis',$lun);
         $this->set('mardis',$mar);
         $this->set('mercredis',$mer);
         $this->set('jeudis',$jeu);
         $this->set('vendredis',$ven);
        $this->set('profsalles',$query);
        $this->set(compact('users'));
        $this->set('classe','prof');
        $this->set('nomprof',$nomprof);
    }
    
    
public function paren()
    {
        $this->viewBuilder()->setLayout('parlayout');
        $query = $this->Users->find();
        $users = $this->paginate($query);
        
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $telparen=$user->tel;
        
        $esetp = $this->fetchTable('Ulcoparents')->find();
		$esetp->select(['id','Telpere','idschool']);
		$esetp->where(['Telpere' => $telparen,'idschool'=>$codeetabli]);
        $rowsp = $esetp->count();
        if($rowsp==1){
                    
		foreach ($esetp as $rowsp) {
            
            $idparen=$rowsp->id; 
           
        } 
        } 
        $filterp=['ulcoparent_id' => $idparen,'Ulcostudents.idschool'=>$codeetabli];
        $esetpa = $this->fetchTable('Ulcostudents')->find();
		$esetpa->select(['id','idschool','ulcoparent_id','ulcosalle_id','Nom','Prenom'])
		->where($filterp)
        ->contain(['Ulcosalles'])
        ->enableAutoFields(true);
       
     $student = $this->paginate($esetpa); 
        
        
   
   $filtern = ['Ulcosalles.idschool'=>$codeetabli,'Ulcostudents.ulcoparent_id'=>$idparen];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles','Ulcostudents'])
    //->leftJoinWith('Ulcostudents')
    ->where($filtern)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);
        
        

        $this->stat();
        $this->set('mtnotes',$mtnote);
        $this->set('students',$student);
        $this->set(compact('users'));
        $this->set('classe','home');
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function adduulco()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('classe','home');
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful login, renders view otherwise.
     */
    public function login()
    {
       $result = $this->Authentication->getResult();
    // If the user is logged in send them away.
    if ($result->isValid()) {
        $target = $this->Authentication->getLoginRedirect() ?? '/';
        return $this->redirect($target);
    }
    if ($this->request->is('post')) {
        $this->Flash->error('Invalid username or password');
    }
    }
    
    public function logout()
{
    $this->Authentication->logout();
    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
}
}
