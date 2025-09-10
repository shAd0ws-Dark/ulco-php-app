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
 * Ulcosalles Controller
 *
 * @property \App\Model\Table\UlcosallesTable $Ulcosalles
 */
class UlcosallesController extends AppController
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
    
    public function classe()
    {
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $query = $this->Ulcosalles->find();
        $query->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($query);
        
         $filter = ['Ulcosalles.idschool'=>$codeetabli];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);
        
    
    
        $this->stat(); 
        $this->set(compact('ulcosalles'));
        $this->set('classe','classe');
        $this->set('mtnotes',$mtnote);
        
    }
    
    public function classedir()
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $query = $this->Ulcosalles->find();
        $query->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($query);
        
         $filter = ['Ulcosalles.idschool'=>$codeetabli];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);
        
    
    
        $this->stat(); 
        $this->set(compact('ulcosalles'));
        $this->set('classe','classe');
        $this->set('mtnotes',$mtnote);
        
    }
    
    public function pclasse()
    {
        $this->viewBuilder()->setLayout('proflayout');
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
        
        
        
        $filter2 = ['Ulcoenseignes.ulcoprof_id'=>$idprof,'Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filter2) {
        return $q->where($filter2);
    });
        
        $filter = ['Ulcosalles.idschool'=>$codeetabli,'Ulconotes.ulcoprof_id'=>$idprof];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);
        
    
        $this->stat(); 
        $this->set('ulcosalles',$query);
        $this->set('classe','classe');
        $this->set('mtnotes',$mtnote);
        
    }
    
    public function classestudent()
    {
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $query = $this->Ulcosalles->find();
        $query->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($query);
        
         $filter = ['Ulcosalles.idschool'=>$codeetabli];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);

        $this->stat(); 
        $this->set(compact('ulcosalles'));
        $this->set('classe','classe');
        $this->set('mtnotes',$mtnote);
        
    }
    
    public function classestudentdir()
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $query = $this->Ulcosalles->find();
        $query->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($query);
        
         $filter = ['Ulcosalles.idschool'=>$codeetabli];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);

        $this->stat(); 
        $this->set(compact('ulcosalles'));
        $this->set('classe','classe');
        $this->set('mtnotes',$mtnote);
        
    }
    
    public function classebul()
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $query = $this->Ulcosalles->find();
        $query->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($query);
        
         $filter = ['Ulcosalles.idschool'=>$codeetabli];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);

        $this->stat(); 
        $this->set(compact('ulcosalles'));
        $this->set('classe','classe');
        $this->set('mtnotes',$mtnote);
        
    }
    
    public function classeparentdir()
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $query = $this->Ulcosalles->find();
        $query->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($query);
        
         $filter = ['Ulcosalles.idschool'=>$codeetabli];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);

        $this->stat(); 
        $this->set(compact('ulcosalles'));
        $this->set('classe','parent');
        $this->set('mtnotes',$mtnote);
        
    }
    
    public function pclassestudent()
    {
        
        $this->viewBuilder()->setLayout('proflayout');
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
        $filter2 = ['Ulcoenseignes.ulcoprof_id'=>$idprof,'Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filter2) {
        return $q->where($filter2);
    });
        
        $filter = ['Ulcosalles.idschool'=>$codeetabli,'Ulconotes.ulcoprof_id'=>$idprof];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);

        $this->stat(); 
        $this->set('ulcosalles',$query);
        $this->set('classe','classe');
        $this->set('mtnotes',$mtnote);
        
    }
    
    public function noteclassestudent()
    {
        
        $this->viewBuilder()->setLayout('proflayout');
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
        $filter2 = ['Ulcoenseignes.ulcoprof_id'=>$idprof,'Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filter2) {
        return $q->where($filter2);
    });
        
        $filter = ['Ulcosalles.idschool'=>$codeetabli,'Ulconotes.ulcoprof_id'=>$idprof];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);

        $this->stat(); 
        $this->set('ulcosalles',$query);
        $this->set('classe','prof');
        $this->set('mtnotes',$mtnote);
        
    }
    
    
    public function enoteclassestudent()
    {
        
        $this->viewBuilder()->setLayout('proflayout');
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
        $filter2 = ['Ulcoenseignes.ulcoprof_id'=>$idprof,'Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filter2) {
        return $q->where($filter2);
    });
        
        $filter = ['Ulcosalles.idschool'=>$codeetabli,'Ulconotes.ulcoprof_id'=>$idprof];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);

        $this->stat(); 
        $this->set('ulcosalles',$query);
        $this->set('classe','prof');
        $this->set('mtnotes',$mtnote);
        
    }
    
    
    public function enoteclassestudentdir()
    {
        
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $query = $this->Ulcosalles->find();
        $query->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($query);
        
         $filter = ['Ulcosalles.idschool'=>$codeetabli];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);
        
    
    

        $this->stat(); 
        $this->set(compact('ulcosalles'));
        $this->set('classe','classe');
        $this->set('mtnotes',$mtnote);
        
    }
    
    public function classeprof()
    {
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $query = $this->Ulcosalles->find();
        $query->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($query);
        
        $filter = ['Ulcosalles.idschool'=>$codeetabli];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);
        

        $this->stat(); 
        $this->set(compact('ulcosalles'));
        $this->set('classe','prof');
        $this->set('mtnotes',$mtnote);
       
        
    }
    
    public function classeprofdir()
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $query = $this->Ulcosalles->find();
        $query->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($query);
        
        
         $filter = ['Ulcosalles.idschool'=>$codeetabli];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);

        $this->stat(); 
        $this->set(compact('ulcosalles'));
        $this->set('classe','prof');
        $this->set('mtnotes',$mtnote);
        
    }
    
    public function ttclasseprofdir()
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $query = $this->Ulcosalles->find();
        $query->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($query);
        

        $this->stat(); 
        $this->set(compact('ulcosalles'));
        $this->set('classe','prof');
        
        
    }

    /**
     * View method
     *
     * @param string|null $id Ulcosalle id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function detailclasse($id = null)
    {
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        
        $ulcosalle = $this->Ulcosalles->get($id, contain: []);
        $prof=$ulcosalle->idproftitu;
        $salleid=$ulcosalle->id;
        
        $esetstud = $this->fetchTable('Ulcostudents')->find();
		$esetstud->select(['id','idschool','ulcosalle_id']);
		$esetstud->where(['idschool' => $codeetabli,'ulcosalle_id' => $salleid]);
        $rowstud = $esetstud->count();
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcosalle_id']);
		$esetnote->where(['ulcosalle_id' => $salleid]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcosalle_id'=>$salleid]);
        
        // DETAIL PROF
        $esetprof = $this->fetchTable('Ulcoprofs')->find();
		//$esetprof->select(['id','student_passcode','rdvdate','deposit_centre','iddate']);
		$esetprof->where(['id' => $prof]);
        $rowid = $esetprof->count();
        if($rowid==1){
                    
		foreach ($esetprof as $rowid) {
            
            $nomprof=$rowid->Nom;
            $prenomprof=$rowid->Prenom;
            $telprof=$rowid->Tel;
            $emailprof=$rowid->Email;
            $addresseprof=$rowid->Ville;
        }   
        }
        
        $filter = ['Ulcosalles.idschool'=>$codeetabli];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);
        
        $this->stat(); 
        
        $this->set(compact('ulcosalle'));
        $this->set('classe','classe');
        $this->set('nomprof',$nomprof);
        $this->set('prenomprof',$prenomprof);
        $this->set('telprof',$telprof);
        $this->set('mailprof',$emailprof);
        $this->set('adprof',$addresseprof);
        $this->set('nbreleve',$rowstud);
        $this->set('totalnotes',$mt);
        $this->set('notemax',$rownote);
        $this->set('mtnotes',$mtnote);
    }
    
    public function detailclassedir($id = null)
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        
        $ulcosalle = $this->Ulcosalles->get($id, contain: []);
        $prof=$ulcosalle->idproftitu;
        $salleid=$ulcosalle->id;
        
        $esetstud = $this->fetchTable('Ulcostudents')->find();
		$esetstud->select(['id','idschool','ulcosalle_id']);
		$esetstud->where(['idschool' => $codeetabli,'ulcosalle_id' => $salleid]);
        $rowstud = $esetstud->count();
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcosalle_id']);
		$esetnote->where(['ulcosalle_id' => $salleid]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcosalle_id'=>$salleid]);
        
        // DETAIL PROF
        $esetprof = $this->fetchTable('Ulcoprofs')->find();
		//$esetprof->select(['id','student_passcode','rdvdate','deposit_centre','iddate']);
		$esetprof->where(['id' => $prof]);
        $rowid = $esetprof->count();
        if($rowid==1){
                    
		foreach ($esetprof as $rowid) {
            
            $nomprof=$rowid->Nom;
            $prenomprof=$rowid->Prenom;
            $telprof=$rowid->Tel;
            $emailprof=$rowid->Email;
            $addresseprof=$rowid->Ville;
        }   
        }
        
        $filter = ['Ulcosalles.idschool'=>$codeetabli];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);
        
        $this->stat(); 
        $this->set(compact('ulcosalle'));
        $this->set('classe','classe');
        $this->set('nomprof',$nomprof);
        $this->set('prenomprof',$prenomprof);
        $this->set('telprof',$telprof);
        $this->set('mailprof',$emailprof);
        $this->set('adprof',$addresseprof);
        $this->set('nbreleve',$rowstud);
        $this->set('totalnotes',$mt);
        $this->set('notemax',$rownote);
        $this->set('mtnotes',$mtnote);
    }
    
    
    public function pdetailclasse($id = null)
    {
        $this->viewBuilder()->setLayout('proflayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $telprof=$user->tel;

        $ulcosalle = $this->Ulcosalles->get($id, contain: []);
        $prof=$ulcosalle->idproftitu;
        $salleid=$ulcosalle->id;
        
        $esetstud = $this->fetchTable('Ulcostudents')->find();
		$esetstud->select(['id','idschool','ulcosalle_id']);
		$esetstud->where(['idschool' => $codeetabli,'ulcosalle_id' => $salleid]);
        $rowstud = $esetstud->count();
        
        $esetp = $this->fetchTable('Ulcoprofs')->find();
		$esetp->select(['id','Tel']);
		$esetp->where(['Tel' => $telprof]);
        $rowsp = $esetp->count();
        if($rowsp==1){
                    
		foreach ($esetp as $rowsp) {
            
            $idprof=$rowsp->id;
            
           
        } 
        } 
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcosalle_id']);
		$esetnote->where(['ulcosalle_id' => $salleid,'ulcoprof_id'=>$idprof]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcosalle_id'=>$salleid,'ulcoprof_id'=>$idprof]);
        
        // DETAIL PROF
        $esetprof = $this->fetchTable('Ulcoprofs')->find();
		//$esetprof->select(['id','student_passcode','rdvdate','deposit_centre','iddate']);
		$esetprof->where(['id' => $prof]);
        $rowid = $esetprof->count();
        if($rowid==1){
                    
		foreach ($esetprof as $rowid) {
            
            $nomprof=$rowid->Nom;
            $prenomprof=$rowid->Prenom;
            $telprof=$rowid->Tel;
            $emailprof=$rowid->Email;
            $addresseprof=$rowid->Ville;
        }   
        }
        
        $filter = ['Ulcosalles.idschool'=>$codeetabli,'Ulconotes.ulcoprof_id'=>$idprof];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles'])
    ->leftJoinWith('Ulcosalles')
    ->where($filter)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);
        
     $filterm = ['ulcoprof_id' => $idprof,'ulcosalle_id' => $salleid];
                
   $mtnotem=$this->fetchTable('Ulconotes')->find();
   $mtnotem->select(['totalmarks' => $mtnotem->func()->sum('note'),'totalseq' => $mtnotem->func()->count('note')])
    ->where($filterm)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        

        
        $this->stat(); 
        $this->set(compact('ulcosalle'));
        $this->set('classe','classe');
        $this->set('nomprof',$nomprof);
        $this->set('prenomprof',$prenomprof);
        $this->set('telprof',$telprof);
        $this->set('mailprof',$emailprof);
        $this->set('adprof',$addresseprof);
        $this->set('nbreleve',$rowstud);
        $this->set('totalnotes',$mt);
        $this->set('notemax',$rownote);
        $this->set('mtnotes',$mtnote);
        $this->set('mtnotems',$mtnotem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ulcosalle = $this->Ulcosalles->newEmptyEntity();
        if ($this->request->is('post')) {
            $ulcosalle = $this->Ulcosalles->patchEntity($ulcosalle, $this->request->getData());
            if ($this->Ulcosalles->save($ulcosalle)) {
                $this->Flash->success(__('The ulcosalle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ulcosalle could not be saved. Please, try again.'));
        }
        $this->set(compact('ulcosalle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ulcosalle id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ulcosalle = $this->Ulcosalles->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ulcosalle = $this->Ulcosalles->patchEntity($ulcosalle, $this->request->getData());
            if ($this->Ulcosalles->save($ulcosalle)) {
                $this->Flash->success(__('The ulcosalle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ulcosalle could not be saved. Please, try again.'));
        }
        $this->set(compact('ulcosalle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ulcosalle id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ulcosalle = $this->Ulcosalles->get($id);
        if ($this->Ulcosalles->delete($ulcosalle)) {
            $this->Flash->success(__('The ulcosalle has been deleted.'));
        } else {
            $this->Flash->error(__('The ulcosalle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
