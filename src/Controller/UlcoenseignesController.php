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
 * Ulcoenseignes Controller
 *
 * @property \App\Model\Table\UlcoenseignesTable $Ulcoenseignes
 */
class UlcoenseignesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    
    
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
    
    public function proflist($id=null)
    {
         $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        
        $esetsms = $this->fetchTable('Ulcosms')->find();
		//$esetpa->select(['id','libele']);
		 $esetsms->where(['utype' => $usertype,'destinataire'=>'PR']);
        $ulcosms = $this->paginate($esetsms);
        
        $filter = ['Ulcoenseignes.ulcosalle_id' => $id];
        
        $query = $this->Ulcoenseignes->find()
    ->groupBy(['Ulcoenseignes.ulcoprof_id'])
    ->contain('Ulcoprofs', function ($q) use ($filter) {
        return $q->where($filter);
    });
        
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
        
        $querysalle = $this->fetchTable('Ulcosalles')->find();
        $querysalle->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($querysalle);
        
        $this->stat(); 
        $listprofs=$this->paginate($query);
        $this->set(compact('listprofs'));
         $this->set(compact('ulcosalles'));
        $this->set('classe','prof');
        $this->set('nomsalle',$nomsalle);
        $this->set(compact('ulcosms'));
        
    } 
    
    public function proflistdir($id=null)
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $filter = ['Ulcoenseignes.ulcosalle_id' => $id];
        
        $query = $this->Ulcoenseignes->find()
    ->groupBy(['Ulcoenseignes.ulcoprof_id'])
    ->contain('Ulcoprofs', function ($q) use ($filter) {
        return $q->where($filter);
    });
        
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
        
        $querysalle = $this->fetchTable('Ulcosalles')->find();
        $querysalle->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($querysalle);
        
        $this->stat(); 
        $listprofs=$this->paginate($query);
        $this->set(compact('listprofs'));
         $this->set(compact('ulcosalles'));
        $this->set('classe','prof');
        $this->set('nomsalle',$nomsalle);
        
    }

    /**
     * View method
     *
     * @param string|null $id Ulcoenseigne id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function profdetail($id = null)
    {
        $ulcoenseigne = $this->Ulcoenseignes->get($id, contain: []);
        
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        
        $this->stat(); 
        $this->set(compact('ulcoenseigne'));
        $this->set('classe','classe');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function profaffectdir($id=null)
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->where(['idschool' => $codeetabli]);
        
        $esetmat = $this->fetchTable('Ulcomatieres')->find();
        
        $esetprof = $this->fetchTable('Ulcoprofs')->find();
		$esetprof->select(['id','Nom','Prenom']);
		$esetprof->where(['id' => $id]);
        $rowprof = $esetprof->count();
        
        if($rowprof==1){
                    
		foreach ($esetprof as $rowprof) {
            
            $nomprof=$rowprof->Nom;
            $prenomprof=$rowprof->Prenom;
           
        }
        }
        
        $filter = ['Ulcoenseignes.ulcoprof_id'=>$id,'Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->Ulcoenseignes->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filter) {
        return $q->where($filter);
    });
        
         
       
		
        
        $ulcoenseigne = $this->Ulcoenseignes->newEmptyEntity();
        if ($this->request->is('post')) {
            $ulcoenseigne = $this->Ulcoenseignes->patchEntity($ulcoenseigne, $this->request->getData());
            
            $ulcoenseigne->idschool=$codeetabli;
            $ulcoenseigne->createdby=$user->id;
            $ulcoenseigne->ulcoprof_id=$id;
            
            
            if( $ulcoenseigne->ulcosalle_id==0 or $ulcoenseigne->ulcomatiere_id==0){
            
            $this->Flash->warning(' <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>Attention! Tous les champs sont obligatoir.
                            </div>',['escape'=>false]);

                return $this->redirect(['action' => '',$id]);
        }
            
            $check = $this->Ulcoenseignes->find()
    ->where(['idschool'=>$codeetabli,'ulcomatiere_id'=>$ulcoenseigne->ulcomatiere_id,'ulcosalle_id'=>$ulcoenseigne->ulcosalle_id]);
            
            $rowcheck = $check->count();
        
        if($rowcheck>=1){
            
            $this->Flash->warning(' <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>Attention! Cette affectation est impossible / Poste déja occupé.
                            </div>',['escape'=>false]);

                return $this->redirect(['action' => '',$id]);
        }
            
            
            if ($this->Ulcoenseignes->save($ulcoenseigne)) {
                $this->Flash->success(' <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>Bravo! Enregistrement réussi.
                            </div>',['escape'=>false]);

                return $this->redirect(['action' => '',$id]);
            }
           //var_dump($ulcoenseigne);
            $this->Flash->error('<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>Oups désolé! Une érreur est survenue, bien vouloir réessayer plus tard.
                            </div>',['escape'=>false]);
        }
        $this->stat(); 
        $this->set(compact('ulcoenseigne'));
        $this->set('classe','prof');
        $this->set('choosemats',$esetmat);
        $this->set('listsalles',$esetsalle);
        $this->set('profsalles',$query);
        $this->set('nomprof',$nomprof.' '.$prenomprof);
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Ulcoenseigne id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ulcoenseigne = $this->Ulcoenseignes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ulcoenseigne = $this->Ulcoenseignes->patchEntity($ulcoenseigne, $this->request->getData());
            if ($this->Ulcoenseignes->save($ulcoenseigne)) {
                $this->Flash->success(__('The ulcoenseigne has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ulcoenseigne could not be saved. Please, try again.'));
        }
        $this->set(compact('ulcoenseigne'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ulcoenseigne id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ulcoenseigne = $this->Ulcoenseignes->get($id);
        if ($this->Ulcoenseignes->delete($ulcoenseigne)) {
            $this->Flash->success(__('The ulcoenseigne has been deleted.'));
        } else {
            $this->Flash->error(__('The ulcoenseigne could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
