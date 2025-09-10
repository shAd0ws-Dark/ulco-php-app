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
 * Ulcoprofs Controller
 *
 * @property \App\Model\Table\UlcoprofsTable $Ulcoprofs
 */
class UlcoprofsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function proflistaffectdir()
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        $query = $this->Ulcoprofs->find()
            ->where(['idschool'=>$codeetabli]);
        
        $this->stat(); 
        $this->set('listprofs',$query);
        $this->set('classe','prof');
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
     * @param string|null $id Ulcoprof id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function profdetail($id = null)
    {
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        $ulcoprof = $this->Ulcoprofs->get($id, contain: []);
        
        $esetsms = $this->fetchTable('Ulcosms')->find();
		//$esetpa->select(['id','libele']);
		 $esetsms->where(['utype' => $usertype,'destinataire'=>'PR']);
        $ulcosms = $this->paginate($esetsms);
        
        $filter = ['Ulcoenseignes.ulcoprof_id'=>$id,'Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filter) {
        return $q->where($filter);
    });
        
        $this->stat(); 
        $this->set(compact('ulcosms'));
        $this->set(compact('ulcoprof'));
        $this->set('classe','prof');
        $this->set('profsalles',$query);
    }
    
    public function profdetaildir($id = null)
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        $ulcoprof = $this->Ulcoprofs->get($id, contain: []);
        
        $esetsms = $this->fetchTable('Ulcosms')->find();
		//$esetpa->select(['id','libele']);
		 $esetsms->where(['utype' => $usertype,'destinataire'=>'PR']);
        $ulcosms = $this->paginate($esetsms);
        
        $filter = ['Ulcoenseignes.ulcoprof_id'=>$id,'Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filter) {
        return $q->where($filter);
    });
        
        $this->stat(); 
        $this->set(compact('ulcosms'));
        $this->set(compact('ulcoprof'));
        $this->set('classe','prof');
        $this->set('profsalles',$query);
    }
    
    
    
    public function profmatperdetail($profid,$ids)
    {
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        $ulcoprof = $this->Ulcoprofs->get($profid, contain: []);
        
        
        
        $esetsms = $this->fetchTable('Ulcosms')->find();
		//$esetpa->select(['id','libele']);
		 $esetsms->where(['utype' => $usertype,'destinataire'=>'PR']);
        $ulcosms = $this->paginate($esetsms);
        
     
    
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele','idproftitu']);
		$esetsalle->where(['id' => $ids]);
        $rowssalle = $esetsalle->count();
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            
           
        } 
        }

        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcoprof_id','ulcomatiere_id','ulcosalle_id']);
		$esetnote->where(['ulcoprof_id' => $profid]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcoprof_id' => $profid]);
        
        
        $filter = ['ulcoprof_id' => $profid,'ulcosalle_id' => $ids];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note')])
    ->where($filter)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
        
     $filterx = ['Ulcoenseignes.ulcoprof_id'=>$profid,'Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filterx) {
        return $q->where($filterx);
    });
            
    
  
        $this->stat(); 
        $this->set(compact('ulcoprof'));
        $this->set(compact('ulcosms'));
        $this->set('classe','prof');
        $this->set('nomsalle',$nomsalle);
        $this->set('totalnotes',$mt);
        $this->set('mtnotes',$mtnote);
        $this->set('notemax',$rownote);
        $this->set('profsalles',$query);
      
       
        
    }
    
    public function profmatperdetaildir($profid,$ids)
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        $ulcoprof = $this->Ulcoprofs->get($profid, contain: []);
        
        
        
        $esetsms = $this->fetchTable('Ulcosms')->find();
		//$esetpa->select(['id','libele']);
		 $esetsms->where(['utype' => $usertype,'destinataire'=>'PR']);
        $ulcosms = $this->paginate($esetsms);
        
     
    
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele','idproftitu']);
		$esetsalle->where(['id' => $ids]);
        $rowssalle = $esetsalle->count();
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            
           
        } 
        }

        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcoprof_id','ulcomatiere_id','ulcosalle_id']);
		$esetnote->where(['ulcoprof_id' => $profid]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcoprof_id' => $profid]);
        
        
        $filter = ['ulcoprof_id' => $profid,'ulcosalle_id' => $ids];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note')])
    ->where($filter)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
        
     $filterx = ['Ulcoenseignes.ulcoprof_id'=>$profid,'Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filterx) {
        return $q->where($filterx);
    });
            
    
  
        $this->stat(); 
        $this->set(compact('ulcoprof'));
        $this->set(compact('ulcosms'));
        $this->set('classe','prof');
        $this->set('nomsalle',$nomsalle);
        $this->set('totalnotes',$mt);
        $this->set('mtnotes',$mtnote);
        $this->set('notemax',$rownote);
        $this->set('profsalles',$query);
      
       
        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function profadd()
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $ulcoprof = $this->Ulcoprofs->newEmptyEntity();
        
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        
        
        if ($this->request->is('post')) {
            $ulcoprof = $this->Ulcoprofs->patchEntity($ulcoprof, $this->request->getData());
            $ulcoprof->idschool=$codeetabli;
            $ulcoprof->Createdby=$user->id;
            if ($this->Ulcoprofs->save($ulcoprof)) {
                $this->Flash->success(' <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>Bravo! Enregistrement réussi.
                            </div>',['escape'=>false]);

                return $this->redirect(['action' => '']);
            }
            //var_dump($ulcoprof);
            $this->Flash->error('<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>Oups désolé! Une érreur est survenue, bien vouloir réessayer plus tard.
                            </div>',['escape'=>false]);
        }
        $this->stat(); 
        $this->set(compact('ulcoprof'));
        $this->set('classe','prof',['escape'=>false]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ulcoprof id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ulcoprof = $this->Ulcoprofs->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ulcoprof = $this->Ulcoprofs->patchEntity($ulcoprof, $this->request->getData());
            if ($this->Ulcoprofs->save($ulcoprof)) {
                $this->Flash->success(__('The ulcoprof has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ulcoprof could not be saved. Please, try again.'));
        }
        $this->set(compact('ulcoprof'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ulcoprof id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ulcoprof = $this->Ulcoprofs->get($id);
        if ($this->Ulcoprofs->delete($ulcoprof)) {
            $this->Flash->success(__('The ulcoprof has been deleted.'));
        } else {
            $this->Flash->error(__('The ulcoprof could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
