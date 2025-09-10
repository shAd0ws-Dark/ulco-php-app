<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry; 
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
 * Ulcotimetables Controller
 *
 * @property \App\Model\Table\UlcotimetablesTable $Ulcotimetables
 */
class UlcotimetablesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Ulcotimetables->find()
            ->contain(['Ulcomatieres', 'Ulcosalles', 'Ulcoprofs']);
        $ulcotimetables = $this->paginate($query);

        $this->set(compact('ulcotimetables'));
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

    /**
     * View method
     *
     * @param string|null $id Ulcotimetable id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ulcotimetable = $this->Ulcotimetables->get($id, contain: ['Ulcomatieres', 'Ulcosalles', 'Ulcoprofs']);
        $this->set(compact('ulcotimetable'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function ttadd($id = null)
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele','idproftitu']);
		$esetsalle->where(['id' => $id]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            $idprof=$rowssalle->idproftitu;
           
        }
        }
      
        
            
        
        $ulcotimetable = $this->Ulcotimetables->newEmptyEntity();
        if ($this->request->is('post')) {
            $ulcotimetable = $this->Ulcotimetables->patchEntity($ulcotimetable, $this->request->getData());
            
             $ulcotimetable->idschool=$codeetabli;
            $ulcotimetable->createdby=$user->id;
            $ulcotimetable->ulcosalle_id=$id;
            
            $qexist = $this->Ulcotimetables->find()
                ->where(['idschool'=>$codeetabli,'Horaire'=>$ulcotimetable->Horaire,'Jour'=>$ulcotimetable->Jour,'ulcoprof_id'=>$ulcotimetable->ulcoprof_id]);
            $rowexist=$qexist->count();
            if($rowexist>=1){
                    
	       $this->Flash->warning(' <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>Attention! Professeur déjà occuppé à cette heure.
                            </div>',['escape'=>false]);

                return $this->redirect(['action' => '',$id]);
        }
            
            if ($this->Ulcotimetables->save($ulcotimetable)) {
                $this->Flash->success(' <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>Bravo! Insertion réussi.
                            </div>',['escape'=>false]);

                return $this->redirect(['action' => '',$id]);
            }
            //var_dump($ulcostudent);
            $this->Flash->error('<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>Oups désolé! Une érreur est survenue, bien vouloir réessayer plus tard.
                            </div>',['escape'=>false]);
        }
        $ulcomatieres = $this->Ulcotimetables->Ulcomatieres->find('list')->all();
        $ulcosalles = $this->Ulcotimetables->Ulcosalles->find('list')->where(['idschool'=>$codeetabli]);
        
        $filter = ['Ulcoenseignes.ulcosalle_id' => $id];
        
        $ulcoprof = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcoprof_id'])
    ->contain('Ulcoprofs', function ($q) use ($filter) {
        return $q->where($filter);
        //$ulcoprofs = $this->Ulcotimetables->Ulcoprofs->find('list')->where(['idschool'=>$codeetabli]);
         });
        
         
    //lun
     $filterlun = ['Ulcotimetables.idschool'=>$codeetabli,'ulcosalle_id'=>$id,'Jour'=>'1'];
                
   $lun=$this->fetchTable('Ulcotimetables')->find();
   $lun->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filterlun)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcoprofs'])
    ->enableAutoFields(true);
   
        //Mar
$filtermar = ['Ulcotimetables.idschool'=>$codeetabli,'ulcosalle_id'=>$id,'Jour'=>'2'];
                
   $mar=$this->fetchTable('Ulcotimetables')->find();
   $mar->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filtermar)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcoprofs'])
    ->enableAutoFields(true);
    
        //Mer
$filtermer = ['Ulcotimetables.idschool'=>$codeetabli,'ulcosalle_id'=>$id,'Jour'=>'3'];
                
   $mer=$this->fetchTable('Ulcotimetables')->find();
   $mer->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filtermer)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcoprofs'])
    ->enableAutoFields(true);
 
        //jeu
$filterjeu = ['Ulcotimetables.idschool'=>$codeetabli,'ulcosalle_id'=>$id,'Jour'=>'4'];
                
   $jeu=$this->fetchTable('Ulcotimetables')->find();
   $jeu->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filterjeu)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcoprofs'])
    ->enableAutoFields(true);
   
 //Ven
$filterven = ['Ulcotimetables.idschool'=>$codeetabli,'ulcosalle_id'=>$id,'Jour'=>'5'];
                
   $ven=$this->fetchTable('Ulcotimetables')->find();
   $ven->select(['idschool','ulcomatiere_id','Horaire','ulcosalle_id'])
    ->where($filterven)
    ->order(['Horaire' => 'ASC'])
    ->contain(['Ulcomatieres','Ulcoprofs'])
    ->enableAutoFields(true);
        
        $this->stat();
       
        $this->set(compact('ulcotimetable', 'ulcomatieres', 'ulcosalles'));
        $this->set('classe','prof');
        $this->set('nomsalle',$nomsalle);
        $this->set('ulcoprofs',$ulcoprof);
        $this->set('idsalle',$id);
        $this->set('lundis',$lun);
         $this->set('mardis',$mar);
         $this->set('mercredis',$mer);
         $this->set('jeudis',$jeu);
         $this->set('vendredis',$ven);
        
    }
    
    public function checkhoraire(){
         $user = $this->request->getAttribute('identity');
         $codeetabli=$user->Ucode;
        
        $jj=$this->request->getData('jj');
        $idsalle=$this->request->getData('idsalle');
  $filtreheure = $this->fetchTable('Ulcotimetables')->find()
            ->select(['Horaire'])
            ->where(['Ulcotimetables.Jour'=>$jj,'Ulcotimetables.ulcosalle_id'=>$idsalle,'Ulcotimetables.idschool'=>$codeetabli]);
        
        $essetheure = $this->fetchTable('Horaires')->find()
            ->where(['Horaires.libele NOT IN'=>$filtreheure]);
        
        echo '<option  selected="selected">-Horaires disponibles-</option>';
		foreach ($essetheure as $rowsdep) {
		$valu=$rowsdep->libele;
		$label=$rowsdep->libele;
	echo('<option value="'.$valu.'">'.$label.'</option>');
        }
      $this->render('ttadd');
		exit();  
    }
    
    public function checkmatiere(){
         $user = $this->request->getAttribute('identity');
         $codeetabli=$user->Ucode;
        
        $prof=$this->request->getData('prof');
        $idsalle=$this->request->getData('idsalle');
        
         $esetprof = $this->fetchTable('Ulcoprofs')->find();
		$esetprof->where(['id' => $prof]);
        $rowsprof = $esetprof->count();
        
        if($rowsprof==1){
                    
		foreach ($esetprof as $rowsprof) {
            
            $nomprof=$rowsprof->full_name;
            
           
        }
        }
  
        $filter = ['Ulcoenseignes.ulcosalle_id' => $idsalle,'Ulcoenseignes.idschool' => $codeetabli,'Ulcoenseignes.ulcoprof_id' => $prof];
         $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcomatiere_id'])
    ->contain('Ulcomatieres', function ($q) use ($filter) {
        return $q->where($filter);
    });
        
        //echo '<option  value="">-Matière(s)-'.$nomprof.'</option>';
		foreach ($query as $rowsdep) {
		$valu=$rowsdep->ulcomatiere->id;
		$label=$rowsdep->ulcomatiere->libele;
	echo('<option value="'.$valu.'">'.$label.' ('.$nomprof.')</option>');
        }
      $this->render('ttadd');
		exit();  
    }

    /**
     * Edit method
     *
     * @param string|null $id Ulcotimetable id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ulcotimetable = $this->Ulcotimetables->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ulcotimetable = $this->Ulcotimetables->patchEntity($ulcotimetable, $this->request->getData());
            if ($this->Ulcotimetables->save($ulcotimetable)) {
                $this->Flash->success(__('The ulcotimetable has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ulcotimetable could not be saved. Please, try again.'));
        }
        $ulcomatieres = $this->Ulcotimetables->Ulcomatieres->find('list', limit: 200)->all();
        $ulcosalles = $this->Ulcotimetables->Ulcosalles->find('list', limit: 200)->all();
        $ulcoprofs = $this->Ulcotimetables->Ulcoprofs->find('list', limit: 200)->all();
        $this->set(compact('ulcotimetable', 'ulcomatieres', 'ulcosalles', 'ulcoprofs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ulcotimetable id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ulcotimetable = $this->Ulcotimetables->get($id);
        if ($this->Ulcotimetables->delete($ulcotimetable)) {
            $this->Flash->success(__('The ulcotimetable has been deleted.'));
        } else {
            $this->Flash->error(__('The ulcotimetable could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
