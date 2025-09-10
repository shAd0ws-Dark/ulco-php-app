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
 * Ulcostudents Controller
 *
 * @property \App\Model\Table\UlcostudentsTable $Ulcostudents
 */
class UlcostudentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Ulcostudents->find();
        $ulcostudents = $this->paginate($query);

        $this->stat(); 
        $this->set(compact('ulcostudents'));
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
     * @param string|null $id Ulcostudent id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function studentlist($id = null)
    {
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        //$ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $query = $this->Ulcostudents->find();
        $query->where(['idschool'=>$codeetabli,'ulcosalle_id'=>$id]);
        $query->order(['Nom' => 'ASC']);
        $ulcostudents = $this->paginate($query);
        
        $querysalle = $this->fetchTable('Ulcosalles')->find();
        $querysalle->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($querysalle);
        
        $esetsms = $this->fetchTable('Ulcosms')->find();
		//$esetpa->select(['id','libele']);
		 $esetsms->where(['utype' => $usertype,'destinataire'=>'PA']);
        $ulcosms = $this->paginate($esetsms);
        
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele']);
		$esetsalle->where(['id' => $id]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
           
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
        $this->set(compact('ulcosms'));
        $this->set(compact('ulcostudents'));
        $this->set(compact('ulcosalles'));
        $this->set('classe','classe');
        $this->set('nomsalle',$nomsalle);
        $this->set('mtnotes',$mtnote);
    }
    
    public function studentlistdir($id = null)
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        
        //$ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $query = $this->Ulcostudents->find();
        $query->where(['idschool'=>$codeetabli,'ulcosalle_id'=>$id]);
        $query->order(['Nom' => 'ASC']);
        $ulcostudents = $this->paginate($query);
        
        $querysalle = $this->fetchTable('Ulcosalles')->find();
        $querysalle->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($querysalle);
        
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele']);
		$esetsalle->where(['id' => $id]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
           
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
        $this->set(compact('ulcostudents'));
        $this->set(compact('ulcosalles'));
        $this->set('classe','classe');
        $this->set('nomsalle',$nomsalle);
        $this->set('mtnotes',$mtnote);
    }
    
    public function studentbullistdir($id = null)
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        
        //$ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $query = $this->Ulcostudents->find();
        $query->where(['idschool'=>$codeetabli,'ulcosalle_id'=>$id]);
        $query->order(['Nom' => 'ASC']);
        $ulcostudents = $this->paginate($query);
        
        $querysalle = $this->fetchTable('Ulcosalles')->find();
        $querysalle->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($querysalle);
        
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele']);
		$esetsalle->where(['id' => $id]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
           
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
        $this->set(compact('ulcostudents'));
        $this->set(compact('ulcosalles'));
        $this->set('classe','classe');
        $this->set('nomsalle',$nomsalle);
        $this->set('mtnotes',$mtnote);
    }
    
    public function parentlistdir($id = null)
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        //$ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $query = $this->Ulcostudents->find()
        ->contain(['Ulcoparents'])
        ->where(['Ulcostudents.idschool'=>$codeetabli,'ulcosalle_id'=>$id])
        ->order(['Ulcoparents.Nompere' => 'ASC'])
        ->groupBy(['Ulcostudents.ulcoparent_id'])
        ->enableAutoFields(true);
        
        
        $querysalle = $this->fetchTable('Ulcosalles')->find();
        $querysalle->where(['idschool'=>$codeetabli]);
        $ulcosalles = $this->paginate($querysalle);
        
        $esetsms = $this->fetchTable('Ulcosms')->find();
		//$esetpa->select(['id','libele']);
		 $esetsms->where(['utype' => $usertype,'destinataire'=>'PAD']);
        $ulcosms = $this->paginate($esetsms);
        
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele']);
		$esetsalle->where(['id' => $id]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
           
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
        $this->set('ulcostudents',$query);
        $this->set(compact('ulcosalles'));
        $this->set(compact('ulcosms'));
        $this->set('classe','parent');
        $this->set('nomsalle',$nomsalle);
        $this->set('mtnotes',$mtnote);
    }
    
    public function pstudentlist($id = null)
    {
        $this->viewBuilder()->setLayout('proflayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $telprof=$user->tel;
        
        //$ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $query = $this->Ulcostudents->find();
        $query->where(['idschool'=>$codeetabli,'ulcosalle_id'=>$id]);
        $query->order(['Nom' => 'ASC']);
        $ulcostudents = $this->paginate($query);
        
        $esetp = $this->fetchTable('Ulcoprofs')->find();
		$esetp->select(['id','Tel']);
		$esetp->where(['Tel' => $telprof]);
        $rowsp = $esetp->count();
        if($rowsp==1){
                    
		foreach ($esetp as $rowsp) {
            
            $idprof=$rowsp->id;
            
           
        } 
        } 
        
    
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele']);
		$esetsalle->where(['id' => $id]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
           
        }   
        }
        
        $filter = ['Ulcoenseignes.ulcoprof_id'=>$idprof,'Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filter) {
        return $q->where($filter);
    });
        
        $this->stat(); 
        $this->set(compact('ulcostudents'));
        $this->set('classe','classe');
        $this->set('nomsalle',$nomsalle);
        $this->set('profsalles',$query);
        
    }
    
    
    public function notestudentlist($id = null)
    {
        $this->viewBuilder()->setLayout('proflayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $telprof=$user->tel;
        
        //$ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $query = $this->Ulcostudents->find();
        $query->where(['idschool'=>$codeetabli,'ulcosalle_id'=>$id]);
        $query->order(['Nom' => 'ASC']);
        $ulcostudents = $this->paginate($query);
        
        $esetp = $this->fetchTable('Ulcoprofs')->find();
		$esetp->select(['id','Tel']);
		$esetp->where(['Tel' => $telprof]);
        $rowsp = $esetp->count();
        if($rowsp==1){
                    
		foreach ($esetp as $rowsp) {
            
            $idprof=$rowsp->id;
            
           
        } 
        } 
        
    
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele']);
		$esetsalle->where(['id' => $id]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            
            
           
        }   
        }
        
        $filter2 = ['ulcosalle_id'=>$id,'ulcoprof_id'=>$idprof];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
    ->where($filter2)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
        
        $filter = ['Ulcoenseignes.ulcoprof_id'=>$idprof,'Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filter) {
        return $q->where($filter);
    });
        
        $this->stat(); 
        $this->set(compact('ulcostudents'));
        $this->set('classe','prof');
        $this->set('nomsalle',$nomsalle);
        $this->set('profsalles',$query);
        $this->set('choosemats',$mtnote);
        $this->set('profid',$idprof);
        
    }
    
    
    
    public function enotestudentlist($id = null)
    {
        $this->viewBuilder()->setLayout('proflayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $telprof=$user->tel;
        
        //$ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $query = $this->Ulcostudents->find();
        $query->where(['idschool'=>$codeetabli,'ulcosalle_id'=>$id]);
        $query->order(['Nom' => 'ASC']);
        $ulcostudents = $this->paginate($query);
        
        $esetp = $this->fetchTable('Ulcoprofs')->find();
		$esetp->select(['id','Tel']);
		$esetp->where(['Tel' => $telprof]);
        $rowsp = $esetp->count();
        if($rowsp==1){
                    
		foreach ($esetp as $rowsp) {
            
            $idprof=$rowsp->id;
            
           
        } 
        } 
        
    
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele']);
		$esetsalle->where(['id' => $id]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            
            
           
        }   
        }
        
        $filter2 = ['ulcosalle_id'=>$id,'ulcoprof_id'=>$idprof];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
    ->where($filter2)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
        
        $filter = ['Ulcoenseignes.ulcoprof_id'=>$idprof,'Ulcoenseignes.idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcoenseignes')->find()
    ->groupBy(['Ulcoenseignes.ulcosalle_id'])
    ->contain('Ulcosalles', function ($q) use ($filter) {
        return $q->where($filter);
    });
        
        $this->stat(); 
        $this->set(compact('ulcostudents'));
        $this->set('classe','prof');
        $this->set('nomsalle',$nomsalle);
        $this->set('profsalles',$query);
        $this->set('choosemats',$mtnote);
        $this->set('profid',$idprof);
        
    }
    
    public function enotestudentlistdir($id = null)
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $telprof=$user->tel;
        
        //$ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $query = $this->Ulcostudents->find();
        $query->where(['idschool'=>$codeetabli,'ulcosalle_id'=>$id]);
        $query->order(['Nom' => 'ASC']);
        $ulcostudents = $this->paginate($query);
        
         
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele']);
		$esetsalle->where(['id' => $id]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            
            
           
        }   
        }
        
        $filter2 = ['ulcosalle_id'=>$id];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
    ->where($filter2)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
        
        $filter = ['idschool'=>$codeetabli];
        $query = $this->fetchTable('Ulcosalles')->find()
        ->where($filter);
        
        $this->stat(); 
        $this->set(compact('ulcostudents'));
        $this->set('classe','prof');
        $this->set('nomsalle',$nomsalle);
        $this->set('choosemats',$mtnote);
        $this->set('profsalles',$query);
        
        
        
    }
    
    public function studentdetail($id = null)
    {
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        $ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $idsalle = $ulcostudent->ulcosalle_id;
        $ulcostudent_id = $ulcostudent->id;
        $idparent = $ulcostudent->ulcoparent_id;
        
        $esetsms = $this->fetchTable('Ulcosms')->find();
		//$esetpa->select(['id','libele']);
		 $esetsms->where(['utype' => $usertype,'destinataire'=>'PA']);
        $ulcosms = $this->paginate($esetsms);
        
        $esetpa = $this->fetchTable('Ulcoparents')->find();
		//$esetpa->select(['id','libele']);
		$esetpa->where(['id' => $idparent]);
        $rowspa = $esetpa->count();
        
        if($rowspa==1){
                    
		foreach ($esetpa as $rowspa) {
            
            $nompere=$rowspa->Nompere.' '.$rowspa->Prenompere;
            $nommere=$rowspa->Nommere.' '.$rowspa->Prenommere;
            $nomtuteur=$rowspa->Tuteur;
            $telpere=$rowspa->Telpere;
            $telmere=$rowspa->Telmere;
            $teltuteur=$rowspa->Teltuteur;
            $adpere=$rowspa->Adpere;
            $admere=$rowspa->Admere;
            $adtuteur=$rowspa->Adtuteur;
           
        }   
        }
        
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele','idproftitu']);
		$esetsalle->where(['id' => $idsalle]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            $idprof=$rowssalle->idproftitu;
           
        } 
                 // DETAIL PROF
        $esetprof = $this->fetchTable('Ulcoprofs')->find();
		//$esetprof->select(['id','student_passcode','rdvdate','deposit_centre','iddate']);
		$esetprof->where(['id' => $idprof]);
        $rowid = $esetprof->count();
        if($rowid==1){
                    
		foreach ($esetprof as $rowid) {
            
            $nomprof=$rowid->Nom.' '.$rowid->Prenom;
            $telprof=$rowid->Tel;
            $emailprof=$rowid->Email;
            $addresseprof=$rowid->Ville;
        }   
        }
        }
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcostudent_id']);
		$esetnote->where(['ulcostudent_id' => $ulcostudent_id]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcostudent_id'=>$ulcostudent_id]);
        
        
        $filter = ['ulcostudent_id'=>$ulcostudent_id,'trim'=>1];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
    ->where($filter)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
        $filters2 = ['ulcostudent_id'=>$ulcostudent_id,'trim'=>2];
                
   $mtnotes2=$this->fetchTable('Ulconotes')->find();
   $mtnotes2->select(['totalmarks' => $mtnotes2->func()->sum('note'),'totalseq' => $mtnotes2->func()->count('note'),])
    ->where($filters2)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true); 
        
        $filters3 = ['ulcostudent_id'=>$ulcostudent_id,'trim'=>3];
                
   $mtnotes3=$this->fetchTable('Ulconotes')->find();
   $mtnotes3->select(['totalmarks' => $mtnotes3->func()->sum('note'),'totalseq' => $mtnotes3->func()->count('note'),])
    ->where($filters3)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
     
      
        
       $this->stat(); 
        $this->set(compact('ulcostudent'));
        $this->set(compact('ulcosms'));
        $this->set('classe','classe');
        $this->set('nomsalle',$nomsalle);
        $this->set('nompere',$nompere);
        $this->set('nommere',$nommere);
        $this->set('nomtuteur',$nomtuteur);
        $this->set('telpere',$telpere);
        $this->set('telmere',$telmere);
        $this->set('teltuteur',$teltuteur);
        $this->set('adpere',$adpere);
        $this->set('admere',$admere);
        $this->set('adtuteur',$adtuteur);
        $this->set('nomprof',$nomprof);
        $this->set('telprof',$telprof);
        $this->set('mailprof',$emailprof);
        $this->set('adprof',$addresseprof);
        $this->set('idsalle',$idsalle);
         $this->set('totalnotes',$mt);
         $this->set('mtnotes',$mtnote);
         $this->set('mtnotess2',$mtnotes2);
         $this->set('mtnotess3',$mtnotes3);
        $this->set('notemax',$rownote);
    }
    
    public function studentdetaildir($id = null)
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        $ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $idsalle = $ulcostudent->ulcosalle_id;
        $ulcostudent_id = $ulcostudent->id;
        $idparent = $ulcostudent->ulcoparent_id;
        
        $esetsms = $this->fetchTable('Ulcosms')->find();
		//$esetpa->select(['id','libele']);
		 $esetsms->where(['utype' => $usertype,'destinataire'=>'PA']);
        $ulcosms = $this->paginate($esetsms);
        
        $esetpa = $this->fetchTable('Ulcoparents')->find();
		//$esetpa->select(['id','libele']);
		$esetpa->where(['id' => $idparent]);
        $rowspa = $esetpa->count();
        
        if($rowspa==1){
                    
		foreach ($esetpa as $rowspa) {
            
            $nompere=$rowspa->Nompere.' '.$rowspa->Prenompere;
            $nommere=$rowspa->Nommere.' '.$rowspa->Prenommere;
            $nomtuteur=$rowspa->Tuteur;
            $telpere=$rowspa->Telpere;
            $telmere=$rowspa->Telmere;
            $teltuteur=$rowspa->Teltuteur;
            $adpere=$rowspa->Adpere;
            $admere=$rowspa->Admere;
            $adtuteur=$rowspa->Adtuteur;
           
        }   
        }
        
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele','idproftitu']);
		$esetsalle->where(['id' => $idsalle]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            $idprof=$rowssalle->idproftitu;
           
        } 
                 // DETAIL PROF
        $esetprof = $this->fetchTable('Ulcoprofs')->find();
		//$esetprof->select(['id','student_passcode','rdvdate','deposit_centre','iddate']);
		$esetprof->where(['id' => $idprof]);
        $rowid = $esetprof->count();
        if($rowid==1){
                    
		foreach ($esetprof as $rowid) {
            
            $nomprof=$rowid->Nom.' '.$rowid->Prenom;
            $telprof=$rowid->Tel;
            $emailprof=$rowid->Email;
            $addresseprof=$rowid->Ville;
        }   
        }
        }
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcostudent_id']);
		$esetnote->where(['ulcostudent_id' => $ulcostudent_id]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcostudent_id'=>$ulcostudent_id]);
        
        
        $filter = ['ulcostudent_id'=>$ulcostudent_id,'trim'=>1];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
    ->where($filter)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
        $filters2 = ['ulcostudent_id'=>$ulcostudent_id,'trim'=>2];
                
   $mtnotes2=$this->fetchTable('Ulconotes')->find();
   $mtnotes2->select(['totalmarks' => $mtnotes2->func()->sum('note'),'totalseq' => $mtnotes2->func()->count('note'),])
    ->where($filters2)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true); 
        
        $filters3 = ['ulcostudent_id'=>$ulcostudent_id,'trim'=>3];
                
   $mtnotes3=$this->fetchTable('Ulconotes')->find();
   $mtnotes3->select(['totalmarks' => $mtnotes3->func()->sum('note'),'totalseq' => $mtnotes3->func()->count('note'),])
    ->where($filters3)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
     
      
        
       $this->stat(); 
        $this->set(compact('ulcostudent'));
        $this->set(compact('ulcosms'));
        $this->set('classe','classe');
        $this->set('nomsalle',$nomsalle);
        $this->set('nompere',$nompere);
        $this->set('nommere',$nommere);
        $this->set('nomtuteur',$nomtuteur);
        $this->set('telpere',$telpere);
        $this->set('telmere',$telmere);
        $this->set('teltuteur',$teltuteur);
        $this->set('adpere',$adpere);
        $this->set('admere',$admere);
        $this->set('adtuteur',$adtuteur);
        $this->set('nomprof',$nomprof);
        $this->set('telprof',$telprof);
        $this->set('mailprof',$emailprof);
        $this->set('adprof',$addresseprof);
        $this->set('idsalle',$idsalle);
         $this->set('totalnotes',$mt);
         $this->set('mtnotes',$mtnote);
         $this->set('mtnotess2',$mtnotes2);
         $this->set('mtnotess3',$mtnotes3);
        $this->set('notemax',$rownote);
    }
    
    
    
    public function pstudentdetail($id = null)
    {
        $this->viewBuilder()->setLayout('proflayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        $telprof=$user->tel;
        
        $ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $idsalle = $ulcostudent->ulcosalle_id;
        $ulcostudent_id = $ulcostudent->id;
        $idparent = $ulcostudent->ulcoparent_id;
        
        $esetsms = $this->fetchTable('Ulcosms')->find();
		//$esetpa->select(['id','libele']);
		 $esetsms->where(['utype' => $usertype,'destinataire'=>'PA']);
        $ulcosms = $this->paginate($esetsms);
        
        $esetpa = $this->fetchTable('Ulcoparents')->find();
		//$esetpa->select(['id','libele']);
		$esetpa->where(['id' => $idparent]);
        $rowspa = $esetpa->count();
        
        $esetp = $this->fetchTable('Ulcoprofs')->find();
		$esetp->select(['id','Tel']);
		$esetp->where(['Tel' => $telprof]);
        $rowsp = $esetp->count();
        if($rowsp==1){
                    
		foreach ($esetp as $rowsp) {
            
            $idprof=$rowsp->id;
            
           
        } 
        } 
        
        if($rowspa==1){
                    
		foreach ($esetpa as $rowspa) {
            
            $nompere=$rowspa->Nompere.' '.$rowspa->Prenompere;
            $nommere=$rowspa->Nommere.' '.$rowspa->Prenommere;
            $nomtuteur=$rowspa->Tuteur;
            $telpere=$rowspa->Telpere;
            $telmere=$rowspa->Telmere;
            $teltuteur=$rowspa->Teltuteur;
            $adpere=$rowspa->Adpere;
            $admere=$rowspa->Admere;
            $adtuteur=$rowspa->Adtuteur;
           
        }   
        }
        
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele','idproftitu']);
		$esetsalle->where(['id' => $idsalle]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            $idproft=$rowssalle->idproftitu;
           
        } 
                 // DETAIL PROF
        $esetprof = $this->fetchTable('Ulcoprofs')->find();
		//$esetprof->select(['id','student_passcode','rdvdate','deposit_centre','iddate']);
		$esetprof->where(['id' => $idproft]);
        $rowid = $esetprof->count();
        if($rowid==1){
                    
		foreach ($esetprof as $rowid) {
            
            $nomprof=$rowid->Nom.' '.$rowid->Prenom;
            $telprof=$rowid->Tel;
            $emailprof=$rowid->Email;
            $addresseprof=$rowid->Ville;
        }   
        }
        }
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcostudent_id']);
		$esetnote->where(['ulcostudent_id' => $ulcostudent_id,'ulcosalle_id'=>$idsalle,'ulcoprof_id'=>$idprof]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle,'ulcoprof_id'=>$idprof]);
        
        
        $filter = ['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle,'ulcoprof_id'=>$idprof,'trim'=>1];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
    ->where($filter)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
        $filters2 = ['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle,'ulcoprof_id'=>$idprof,'trim'=>2];
                
   $mtnotes2=$this->fetchTable('Ulconotes')->find();
   $mtnotes2->select(['totalmarks' => $mtnotes2->func()->sum('note'),'totalseq' => $mtnotes2->func()->count('note'),])
    ->where($filters2)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true); 
        
        $filters3 = ['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle,'ulcoprof_id'=>$idprof,'trim'=>3];
                
   $mtnotes3=$this->fetchTable('Ulconotes')->find();
   $mtnotes3->select(['totalmarks' => $mtnotes3->func()->sum('note'),'totalseq' => $mtnotes3->func()->count('note'),])
    ->where($filters3)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
     
      
        
        $this->stat(); 
        $this->set(compact('ulcostudent'));
        $this->set(compact('ulcosms'));
        $this->set('classe','classe');
        $this->set('nomsalle',$nomsalle);
        $this->set('nompere',$nompere);
        $this->set('nommere',$nommere);
        $this->set('nomtuteur',$nomtuteur);
        $this->set('telpere',$telpere);
        $this->set('telmere',$telmere);
        $this->set('teltuteur',$teltuteur);
        $this->set('adpere',$adpere);
        $this->set('admere',$admere);
        $this->set('adtuteur',$adtuteur);
        $this->set('nomprof',$nomprof);
        $this->set('telprof',$telprof);
        $this->set('mailprof',$emailprof);
        $this->set('adprof',$addresseprof);
        $this->set('idsalle',$idsalle);
         $this->set('totalnotes',$mt);
         $this->set('mtnotes',$mtnote);
         $this->set('mtnotess2',$mtnotes2);
         $this->set('mtnotess3',$mtnotes3);
        $this->set('notemax',$rownote);
    }
    
    

    public function matieredetail($id,$matid,$trim)
    {
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        $ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $idsalle = $ulcostudent->ulcosalle_id;
        $ulcostudent_id = $ulcostudent->id;
        $idparent = $ulcostudent->ulcoparent_id;
        
        $esetsms = $this->fetchTable('Ulcosms')->find();
		//$esetpa->select(['id','libele']);
		 $esetsms->where(['utype' => $usertype,'destinataire'=>'PA']);
        $ulcosms = $this->paginate($esetsms);
        
     
    
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele','idproftitu']);
		$esetsalle->where(['id' => $idsalle]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            $idprof=$rowssalle->idproftitu;
           
        } 
                 // DETAIL PROF
        $esetprof = $this->fetchTable('Ulcoprofs')->find();
		//$esetprof->select(['id','student_passcode','rdvdate','deposit_centre','iddate']);
		$esetprof->where(['id' => $idprof]);
        $rowid = $esetprof->count();
        if($rowid==1){
                    
		foreach ($esetprof as $rowid) {
            
            $nomprof=$rowid->Nom.' '.$rowid->Prenom;
            $telprof=$rowid->Tel;
            $emailprof=$rowid->Email;
            $addresseprof=$rowid->Ville;
        }   
        }
        }
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcostudent_id']);
		$esetnote->where(['ulcostudent_id' => $ulcostudent_id]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcostudent_id'=>$ulcostudent_id]);
        
        
        $filter = ['ulcostudent_id'=>$ulcostudent_id,'trim'=>1];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
    ->where($filter)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
        
        $filters2 = ['ulcostudent_id'=>$ulcostudent_id,'trim'=>2];
                
   $mtnotes2=$this->fetchTable('Ulconotes')->find();
   $mtnotes2->select(['totalmarks' => $mtnotes2->func()->sum('note'),'totalseq' => $mtnotes2->func()->count('note'),])
    ->where($filters2)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true); 
        
        $filters3 = ['ulcostudent_id'=>$ulcostudent_id,'trim'=>3];
                
   $mtnotes3=$this->fetchTable('Ulconotes')->find();
   $mtnotes3->select(['totalmarks' => $mtnotes3->func()->sum('note'),'totalseq' => $mtnotes3->func()->count('note'),])
    ->where($filters3)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
    
        $filterd = ['ulcostudent_id'=>$ulcostudent_id,'trim'=>$trim,'ulcomatiere_id'=>$matid];
                
   $mtnoted=$this->fetchTable('Ulconotes')->find();
   $mtnoted->select(['note','chapitre'])
    ->where($filterd);
    $mtnoteds=$this->paginate($mtnoted);
        
    $mtd=$this->fetchTable('Ulconotes')->find();
		$mtd->select([
		'totald'=>$mtd->func()->sum('note'),'totalseqd' => $mtd->func()->count('note'),		
		]);	
		$mtd->where($filterd);
        
        
    $esetmat = $this->fetchTable('Ulcomatieres')->find();
		$esetmat->select(['id','libele']);
		$esetmat->where(['id' => $matid]);
        $rowmat = $esetmat->count();
        if($rowmat==1){
                    
		foreach ($esetmat as $rowmat) {
            
            $libelemat=$rowmat->libele;
          
        }   
        }
    
     
      
        
        $this->stat(); 
        $this->set(compact('ulcostudent'));
        $this->set(compact('ulcosms'));
        $this->set(compact('mtnoteds'));
        $this->set('classe','classe');
        $this->set('nomsalle',$nomsalle);
        $this->set('nomprof',$nomprof);
        $this->set('telprof',$telprof);
        $this->set('mailprof',$emailprof);
        $this->set('adprof',$addresseprof);
        $this->set('idsalle',$idsalle);
        $this->set('totalnotes',$mt);
        $this->set('percentmats',$mtd);
        $this->set('mtnotes',$mtnote);
        $this->set('mtnotess2',$mtnotes2);
         $this->set('mtnotess3',$mtnotes3);
        $this->set('notemax',$rownote);
        $this->set('nommatiere',$libelemat);
        $this->set('trim',$trim);
        
    }
    
    public function matieredetaildir($id,$matid,$trim)
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        $ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $idsalle = $ulcostudent->ulcosalle_id;
        $ulcostudent_id = $ulcostudent->id;
        $idparent = $ulcostudent->ulcoparent_id;
        
        $esetsms = $this->fetchTable('Ulcosms')->find();
		//$esetpa->select(['id','libele']);
		 $esetsms->where(['utype' => $usertype,'destinataire'=>'PA']);
        $ulcosms = $this->paginate($esetsms);
        
     
    
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele','idproftitu']);
		$esetsalle->where(['id' => $idsalle]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            $idprof=$rowssalle->idproftitu;
           
        } 
                 // DETAIL PROF
        $esetprof = $this->fetchTable('Ulcoprofs')->find();
		//$esetprof->select(['id','student_passcode','rdvdate','deposit_centre','iddate']);
		$esetprof->where(['id' => $idprof]);
        $rowid = $esetprof->count();
        if($rowid==1){
                    
		foreach ($esetprof as $rowid) {
            
            $nomprof=$rowid->Nom.' '.$rowid->Prenom;
            $telprof=$rowid->Tel;
            $emailprof=$rowid->Email;
            $addresseprof=$rowid->Ville;
        }   
        }
        }
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcostudent_id']);
		$esetnote->where(['ulcostudent_id' => $ulcostudent_id]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcostudent_id'=>$ulcostudent_id]);
        
        
        $filter = ['ulcostudent_id'=>$ulcostudent_id,'trim'=>1];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
    ->where($filter)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
        
        $filters2 = ['ulcostudent_id'=>$ulcostudent_id,'trim'=>2];
                
   $mtnotes2=$this->fetchTable('Ulconotes')->find();
   $mtnotes2->select(['totalmarks' => $mtnotes2->func()->sum('note'),'totalseq' => $mtnotes2->func()->count('note'),])
    ->where($filters2)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true); 
        
        $filters3 = ['ulcostudent_id'=>$ulcostudent_id,'trim'=>3];
                
   $mtnotes3=$this->fetchTable('Ulconotes')->find();
   $mtnotes3->select(['totalmarks' => $mtnotes3->func()->sum('note'),'totalseq' => $mtnotes3->func()->count('note'),])
    ->where($filters3)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
    
        $filterd = ['ulcostudent_id'=>$ulcostudent_id,'trim'=>$trim,'ulcomatiere_id'=>$matid];
                
   $mtnoted=$this->fetchTable('Ulconotes')->find();
   $mtnoted->select(['note','chapitre'])
    ->where($filterd);
    $mtnoteds=$this->paginate($mtnoted);
        
    $mtd=$this->fetchTable('Ulconotes')->find();
		$mtd->select([
		'totald'=>$mtd->func()->sum('note'),'totalseqd' => $mtd->func()->count('note'),		
		]);	
		$mtd->where($filterd);
        
        
    $esetmat = $this->fetchTable('Ulcomatieres')->find();
		$esetmat->select(['id','libele']);
		$esetmat->where(['id' => $matid]);
        $rowmat = $esetmat->count();
        if($rowmat==1){
                    
		foreach ($esetmat as $rowmat) {
            
            $libelemat=$rowmat->libele;
          
        }   
        }
    
     
      
        
        $this->stat(); 
        $this->set(compact('ulcostudent'));
        $this->set(compact('ulcosms'));
        $this->set(compact('mtnoteds'));
        $this->set('classe','classe');
        $this->set('nomsalle',$nomsalle);
        $this->set('nomprof',$nomprof);
        $this->set('telprof',$telprof);
        $this->set('mailprof',$emailprof);
        $this->set('adprof',$addresseprof);
        $this->set('idsalle',$idsalle);
        $this->set('totalnotes',$mt);
        $this->set('percentmats',$mtd);
        $this->set('mtnotes',$mtnote);
        $this->set('mtnotess2',$mtnotes2);
         $this->set('mtnotess3',$mtnotes3);
        $this->set('notemax',$rownote);
        $this->set('nommatiere',$libelemat);
        $this->set('trim',$trim);
        
    }
    
    
    public function pmatieredetail($id,$matid,$trim)
    {
        $this->viewBuilder()->setLayout('proflayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        $telprof=$user->tel;
        
        $ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $idsalle = $ulcostudent->ulcosalle_id;
        $ulcostudent_id = $ulcostudent->id;
        $idparent = $ulcostudent->ulcoparent_id;
        
        
           $esetp = $this->fetchTable('Ulcoprofs')->find();
		$esetp->select(['id','Tel']);
		$esetp->where(['Tel' => $telprof]);
        $rowsp = $esetp->count();
        if($rowsp==1){
                    
		foreach ($esetp as $rowsp) {
            
            $idprof=$rowsp->id;
            
           
        } 
        }
        
        $esetsms = $this->fetchTable('Ulcosms')->find();
		//$esetpa->select(['id','libele']);
		 $esetsms->where(['utype' => $usertype,'destinataire'=>'PA']);
        $ulcosms = $this->paginate($esetsms);
        
     
    
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele','idproftitu']);
		$esetsalle->where(['id' => $idsalle]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            $idproft=$rowssalle->idproftitu;
           
        } 
                 // DETAIL PROF
        $esetprof = $this->fetchTable('Ulcoprofs')->find();
		//$esetprof->select(['id','student_passcode','rdvdate','deposit_centre','iddate']);
		$esetprof->where(['id' => $idproft]);
        $rowid = $esetprof->count();
        if($rowid==1){
                    
		foreach ($esetprof as $rowid) {
            
            $nomprof=$rowid->Nom.' '.$rowid->Prenom;
            $telprof=$rowid->Tel;
            $emailprof=$rowid->Email;
            $addresseprof=$rowid->Ville;
        }   
        }
        }
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcostudent_id']);
		$esetnote->where(['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle,'ulcoprof_id'=>$idprof]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle,'ulcoprof_id'=>$idprof]);
        
        
        $filter = ['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle,'ulcoprof_id'=>$idprof,'trim'=>1];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
    ->where($filter)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
        
        $filters2 = ['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle,'ulcoprof_id'=>$idprof,'trim'=>2];
                
   $mtnotes2=$this->fetchTable('Ulconotes')->find();
   $mtnotes2->select(['totalmarks' => $mtnotes2->func()->sum('note'),'totalseq' => $mtnotes2->func()->count('note'),])
    ->where($filters2)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true); 
        
        $filters3 = ['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle,'ulcoprof_id'=>$idprof,'trim'=>3];
                
   $mtnotes3=$this->fetchTable('Ulconotes')->find();
   $mtnotes3->select(['totalmarks' => $mtnotes3->func()->sum('note'),'totalseq' => $mtnotes3->func()->count('note'),])
    ->where($filters3)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
    
        $filterd = ['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle,'ulcoprof_id'=>$idprof,'trim'=>$trim,'ulcomatiere_id'=>$matid];
                
   $mtnoted=$this->fetchTable('Ulconotes')->find();
   $mtnoted->select(['note','chapitre'])
    ->where($filterd);
    $mtnoteds=$this->paginate($mtnoted);
        
    $mtd=$this->fetchTable('Ulconotes')->find();
		$mtd->select([
		'totald'=>$mtd->func()->sum('note'),'totalseqd' => $mtd->func()->count('note'),		
		]);	
		$mtd->where($filterd);
        
        
    $esetmat = $this->fetchTable('Ulcomatieres')->find();
		$esetmat->select(['id','libele']);
		$esetmat->where(['id' => $matid]);
        $rowmat = $esetmat->count();
        if($rowmat==1){
                    
		foreach ($esetmat as $rowmat) {
            
            $libelemat=$rowmat->libele;
          
        }   
        }
    
     
      
        
        $this->stat(); 
        $this->set(compact('ulcostudent'));
        $this->set(compact('ulcosms'));
        $this->set(compact('mtnoteds'));
        $this->set('classe','classe');
        $this->set('nomsalle',$nomsalle);
        $this->set('nomprof',$nomprof);
        $this->set('telprof',$telprof);
        $this->set('mailprof',$emailprof);
        $this->set('adprof',$addresseprof);
        $this->set('idsalle',$idsalle);
        $this->set('totalnotes',$mt);
        $this->set('percentmats',$mtd);
        $this->set('mtnotes',$mtnote);
        $this->set('mtnotess2',$mtnotes2);
         $this->set('mtnotess3',$mtnotes3);
        $this->set('notemax',$rownote);
        $this->set('nommatiere',$libelemat);
        $this->set('trim',$trim);
        
    }
    
    
    public function parstudperform($id)
    {
        $this->viewBuilder()->setLayout('parlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        $telparen=$user->tel;
        
        $ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $idsalle = $ulcostudent->ulcosalle_id;
        $ulcostudent_id = $ulcostudent->id;
        $idparent = $ulcostudent->ulcoparent_id;
        
    
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele','idproftitu']);
		$esetsalle->where(['id' => $idsalle]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            $idproft=$rowssalle->idproftitu;
           
        } 
                 // DETAIL PROF
        $esetprof = $this->fetchTable('Ulcoprofs')->find();
		//$esetprof->select(['id','student_passcode','rdvdate','deposit_centre','iddate']);
		$esetprof->where(['id' => $idproft]);
        $rowid = $esetprof->count();
        if($rowid==1){
                    
		foreach ($esetprof as $rowid) {
            
            $nomprof=$rowid->Nom.' '.$rowid->Prenom;
            $telprof=$rowid->Tel;
            $emailprof=$rowid->Email;
            $addresseprof=$rowid->Ville;
        }   
        }
        }
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcostudent_id']);
		$esetnote->where(['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle]);
        
        
        $filter = ['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle,'trim'=>1];
                
   $mtnote1=$this->fetchTable('Ulconotes')->find();
   $mtnote1->select(['totalmarks' => $mtnote1->func()->sum('note'),'totalseq' => $mtnote1->func()->count('note'),])
    ->where($filter)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
        
        $filters2 = ['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle,'trim'=>2];
                
   $mtnotes2=$this->fetchTable('Ulconotes')->find();
   $mtnotes2->select(['totalmarks' => $mtnotes2->func()->sum('note'),'totalseq' => $mtnotes2->func()->count('note'),])
    ->where($filters2)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true); 
        
        $filters3 = ['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle,'trim'=>3];
                
   $mtnotes3=$this->fetchTable('Ulconotes')->find();
   $mtnotes3->select(['totalmarks' => $mtnotes3->func()->sum('note'),'totalseq' => $mtnotes3->func()->count('note'),])
    ->where($filters3)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
            
        
   $esetp = $this->fetchTable('Ulcoparents')->find();
		$esetp->select(['id','Telpere','idschool']);
		$esetp->where(['Telpere' => $telparen,'idschool'=>$codeetabli]);
        $rowsp = $esetp->count();
        if($rowsp==1){
                    
		foreach ($esetp as $rowsp) {
            
            $idparen=$rowsp->id; 
           
        } 
        } 
            
   
   $filtern = ['Ulcosalles.idschool'=>$codeetabli,'Ulcostudents.ulcoparent_id'=>$idparen];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles','Ulcostudents'])
    //->leftJoinWith('Ulcostudents')
    ->where($filtern)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true); 
     
      
        
        $this->stat(); 
        $this->set(compact('ulcostudent'));
        $this->set('classe','home');
        $this->set('nomsalle',$nomsalle);
        $this->set('nomprof',$nomprof);
        $this->set('telprof',$telprof);
        $this->set('mailprof',$emailprof);
        $this->set('adprof',$addresseprof);
        $this->set('idsalle',$idsalle);
        $this->set('totalnotes',$mt);
        $this->set('mtnotes',$mtnote);
        $this->set('mtnotess1',$mtnote1);
        $this->set('mtnotess2',$mtnotes2);
         $this->set('mtnotess3',$mtnotes3);
        $this->set('notemax',$rownote);
        
    }
    
    public function parstudperformdetail($id,$matid,$trim)
    {
        $this->viewBuilder()->setLayout('parlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        $telparen=$user->tel;
        
        $ulcostudent = $this->Ulcostudents->get($id, contain: []);
        $idsalle = $ulcostudent->ulcosalle_id;
        $ulcostudent_id = $ulcostudent->id;
        $idparent = $ulcostudent->ulcoparent_id;
        
  
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele','idproftitu']);
		$esetsalle->where(['id' => $idsalle]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            $idproft=$rowssalle->idproftitu;
           
        } 
                 // DETAIL PROF
        $esetprof = $this->fetchTable('Ulcoprofs')->find();
		//$esetprof->select(['id','student_passcode','rdvdate','deposit_centre','iddate']);
		$esetprof->where(['id' => $idproft]);
        $rowid = $esetprof->count();
        if($rowid==1){
                    
		foreach ($esetprof as $rowid) {
            
            $nomprof=$rowid->Nom.' '.$rowid->Prenom;
            $telprof=$rowid->Tel;
            $emailprof=$rowid->Email;
            $addresseprof=$rowid->Ville;
        }   
        }
        }
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcostudent_id']);
		$esetnote->where(['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle]);
        
        
    
        $filterd = ['ulcostudent_id'=>$ulcostudent_id,'ulcosalle_id'=>$idsalle,'trim'=>$trim,'ulcomatiere_id'=>$matid];
                
   $mtnoted=$this->fetchTable('Ulconotes')->find();
   $mtnoted->select(['note','chapitre'])
    ->where($filterd);
    $mtnoteds=$this->paginate($mtnoted);
        
    $mtd=$this->fetchTable('Ulconotes')->find();
		$mtd->select([
		'totald'=>$mtd->func()->sum('note'),'totalseqd' => $mtd->func()->count('note'),		
		]);	
		$mtd->where($filterd);
        
        
    $esetmat = $this->fetchTable('Ulcomatieres')->find();
		$esetmat->select(['id','libele']);
		$esetmat->where(['id' => $matid]);
        $rowmat = $esetmat->count();
        if($rowmat==1){
                    
		foreach ($esetmat as $rowmat) {
            
            $libelemat=$rowmat->libele;
          
        }   
        }
        
        $esetp = $this->fetchTable('Ulcoparents')->find();
		$esetp->select(['id','Telpere','idschool']);
		$esetp->where(['Telpere' => $telparen,'idschool'=>$codeetabli]);
        $rowsp = $esetp->count();
        if($rowsp==1){
                    
		foreach ($esetp as $rowsp) {
            
            $idparen=$rowsp->id; 
           
        } 
        } 
            
   
   $filtern = ['Ulcosalles.idschool'=>$codeetabli,'Ulcostudents.ulcoparent_id'=>$idparen];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles','Ulcostudents'])
    //->leftJoinWith('Ulcostudents')
    ->where($filtern)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);
    
     
      
        
        $this->stat(); 
        $this->set(compact('ulcostudent'));
        $this->set(compact('mtnoteds'));
        $this->set('classe','home');
        $this->set('nomsalle',$nomsalle);
        $this->set('nomprof',$nomprof);
        $this->set('telprof',$telprof);
        $this->set('mailprof',$emailprof);
        $this->set('adprof',$addresseprof);
        $this->set('idsalle',$idsalle);
        $this->set('totalnotes',$mt);
        $this->set('percentmats',$mtd);
        $this->set('mtnotes',$mtnote);
        $this->set('notemax',$rownote);
        $this->set('nommatiere',$libelemat);
        $this->set('trim',$trim);
        
    }
    
    
    public function parstudperformsalledetail($id,$matid,$trim)
    {
        $this->viewBuilder()->setLayout('parlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        $telparen=$user->tel;
        $idsalle=$id;
       
        
  
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele','idproftitu']);
		$esetsalle->where(['id' => $idsalle]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            $idproft=$rowssalle->idproftitu;
           
        } 
                 // DETAIL PROF
        $esetprof = $this->fetchTable('Ulcoprofs')->find();
		//$esetprof->select(['id','student_passcode','rdvdate','deposit_centre','iddate']);
		$esetprof->where(['id' => $idproft]);
        $rowid = $esetprof->count();
        if($rowid==1){
                    
		foreach ($esetprof as $rowid) {
            
            $nomprof=$rowid->Nom.' '.$rowid->Prenom;
            $telprof=$rowid->Tel;
            $emailprof=$rowid->Email;
            $addresseprof=$rowid->Ville;
        }   
        }
        }
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcostudent_id']);
		$esetnote->where(['ulcosalle_id'=>$idsalle]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcosalle_id'=>$idsalle]);
        
        
    
        $filterd = ['ulcosalle_id'=>$idsalle,'trim'=>$trim,'ulcomatiere_id'=>$matid];
                
   $mtnoted=$this->fetchTable('Ulconotes')->find();
   $mtnoted->select(['note','chapitre'])
    ->where($filterd);
    $mtnoteds=$this->paginate($mtnoted);
        
    $mtd=$this->fetchTable('Ulconotes')->find();
		$mtd->select([
		'totald'=>$mtd->func()->sum('note'),'totalseqd' => $mtd->func()->count('note'),		
		]);	
		$mtd->where($filterd);
        
        
    $esetmat = $this->fetchTable('Ulcomatieres')->find();
		$esetmat->select(['id','libele']);
		$esetmat->where(['id' => $matid]);
        $rowmat = $esetmat->count();
        if($rowmat==1){
                    
		foreach ($esetmat as $rowmat) {
            
            $libelemat=$rowmat->libele;
          
        }   
        }
        
        $esetp = $this->fetchTable('Ulcoparents')->find();
		$esetp->select(['id','Telpere','idschool']);
		$esetp->where(['Telpere' => $telparen,'idschool'=>$codeetabli]);
        $rowsp = $esetp->count();
        if($rowsp==1){
                    
		foreach ($esetp as $rowsp) {
            
            $idparen=$rowsp->id; 
           
        } 
        } 
            
   
   $filtern = ['Ulcosalles.idschool'=>$codeetabli,'Ulcostudents.ulcoparent_id'=>$idparen];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles','Ulcostudents'])
    //->leftJoinWith('Ulcostudents')
    ->where($filtern)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true);
    
     
      
        
       
        $this->stat(); 
        $this->set(compact('mtnoteds'));
        $this->set('classe','home');
        $this->set('nomsalle',$nomsalle);
        $this->set('nomprof',$nomprof);
        $this->set('telprof',$telprof);
        $this->set('mailprof',$emailprof);
        $this->set('adprof',$addresseprof);
        $this->set('idsalle',$idsalle);
        $this->set('totalnotes',$mt);
        $this->set('percentmats',$mtd);
        $this->set('mtnotes',$mtnote);
        $this->set('notemax',$rownote);
        $this->set('nommatiere',$libelemat);
        $this->set('trim',$trim);
        
    }
    
    public function parstudperformsalle($id)
    {
        $this->viewBuilder()->setLayout('parlayout');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        $telparen=$user->tel;
        
        $idsalle = $id;
        
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele','idproftitu']);
		$esetsalle->where(['id' => $idsalle]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
            $idproft=$rowssalle->idproftitu;
           
        } 
            
                 // DETAIL PROF
        $esetprof = $this->fetchTable('Ulcoprofs')->find();
		//$esetprof->select(['id','student_passcode','rdvdate','deposit_centre','iddate']);
		$esetprof->where(['id' => $idproft]);
        $rowid = $esetprof->count();
        if($rowid==1){
                    
		foreach ($esetprof as $rowid) {
            
            $nomprof=$rowid->Nom.' '.$rowid->Prenom;
            $telprof=$rowid->Tel;
            $emailprof=$rowid->Email;
            $addresseprof=$rowid->Ville;
        }   
        }
        }
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcostudent_id']);
		$esetnote->where(['ulcosalle_id'=>$idsalle]);
        $rownote = (20*$esetnote->count());
        
        // PERFORMANCE
		$mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcosalle_id'=>$idsalle]);
        
        
        $filter = ['ulcosalle_id'=>$idsalle,'trim'=>1];
                
   $mtnote1=$this->fetchTable('Ulconotes')->find();
   $mtnote1->select(['totalmarks' => $mtnote1->func()->sum('note'),'totalseq' => $mtnote1->func()->count('note'),])
    ->where($filter)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
        
        $filters2 = ['ulcosalle_id'=>$idsalle,'trim'=>2];
                
   $mtnotes2=$this->fetchTable('Ulconotes')->find();
   $mtnotes2->select(['totalmarks' => $mtnotes2->func()->sum('note'),'totalseq' => $mtnotes2->func()->count('note'),])
    ->where($filters2)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true); 
        
        $filters3 = ['ulcosalle_id'=>$idsalle,'trim'=>3];
                
   $mtnotes3=$this->fetchTable('Ulconotes')->find();
   $mtnotes3->select(['totalmarks' => $mtnotes3->func()->sum('note'),'totalseq' => $mtnotes3->func()->count('note'),])
    ->where($filters3)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
            
        
   $esetp = $this->fetchTable('Ulcoparents')->find();
		$esetp->select(['id','Telpere','idschool']);
		$esetp->where(['Telpere' => $telparen,'idschool'=>$codeetabli]);
        $rowsp = $esetp->count();
        if($rowsp==1){
                    
		foreach ($esetp as $rowsp) {
            
            $idparen=$rowsp->id; 
           
        } 
        } 
            
   
   $filtern = ['Ulcosalles.idschool'=>$codeetabli,'Ulcostudents.ulcoparent_id'=>$idparen];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
       
    ->contain(['Ulcosalles','Ulcostudents'])
    //->leftJoinWith('Ulcostudents')
    ->where($filtern)
    ->groupBy(['Ulconotes.ulcosalle_id'])
    ->enableAutoFields(true); 
     
      
        
       
        $this->stat(); 
        $this->set('classe','home');
        $this->set('nomsalle',$nomsalle);
        $this->set('nomprof',$nomprof);
        $this->set('telprof',$telprof);
        $this->set('mailprof',$emailprof);
        $this->set('adprof',$addresseprof);
        $this->set('idsalle',$idsalle);
        $this->set('totalnotes',$mt);
        $this->set('mtnotes',$mtnote);
        $this->set('mtnotess1',$mtnote1);
        $this->set('mtnotess2',$mtnotes2);
        $this->set('mtnotess3',$mtnotes3);
        $this->set('notemax',$rownote);
        
    }
    
    
    

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function savenote()
    {
         $ulconotesTable=$this->getTableLocator()->get('Ulconotes');
        $ulconote=$ulconotesTable->newEmptyEntity();
        $trim='trim';
        
        $idmatiere=$this->request->getData('matiereid');
        $sujet=$this->request->getData('suj');
        $sequence=$this->request->getData('sq');
        $trimestre=$this->request->getData('trim');
        $idsalle=$this->request->getData('salleid');
        $idstudent=$this->request->getData('studentid');
        $idprof=$this->request->getData('ulcoprof_id');
        $note=$this->request->getData('note');
        
        $ulconote->ulcosalle_id=$idsalle;
        $ulconote->ulcomatiere_id=$idmatiere;
        $ulconote->ulcoprof_id=$idprof;
        $ulconote->ulcostudent_id=$idstudent;
        $ulconote->sequence=$sequence;
        $ulconote->$trim=$trimestre;
        $ulconote->note=$note;
        $ulconote->chapitre=$sujet;
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcostudent_id','ulcoprof_id','sequence','trim','ulcomatiere_id']);
		$esetnote->where(['ulcostudent_id'=>$idstudent,'ulcomatiere_id'=>$idmatiere,'ulcoprof_id'=>$idprof,'sequence'=>$sequence,'trim'=>$trimestre,'ulcosalle_id'=>$idsalle,]);
        $rownote = $esetnote->count();
        
        if($rownote>=1){
            
          exit('deja');  
        }
        else{
        
        if ($ulconotesTable->save($ulconote)) {
			
			exit('saved');
            
        }
        
        else{
           exit('savefail'); 
        }
        
       } 
        
        
    }
    
    public function enote()
    {
        $ulconotesTable=$this->getTableLocator()->get('Ulconotes');
        $ulconote=$ulconotesTable->newEmptyEntity();
        $trim='trim';
        
        $idmatiere=$this->request->getData('matiereid');
        $sujet=$this->request->getData('suj');
        $sequence=$this->request->getData('sq');
        $trimestre=$this->request->getData('trim');
        $idsalle=$this->request->getData('salleid');
        $idstudent=$this->request->getData('studentid');
        $idprof=$this->request->getData('ulcoprof_id');
        $note=$this->request->getData('note');
        $test=$this->request->getData('test');
       
        $ulconote->ulcosalle_id=$idsalle;
        $ulconote->ulcomatiere_id=$idmatiere;
        $ulconote->ulcoprof_id=$idprof;
        $ulconote->ulcostudent_id=$idstudent;
        $ulconote->sequence=$sequence;
        $ulconote->$trim=$trimestre;
        $ulconote->note=$note;
        $ulconote->chapitre=$sujet;
        
         if($test=='test'){
            
            $query = $ulconotesTable->updateQuery();
    $query->set(['note' => $note])
    ->where(['ulcostudent_id'=>$idstudent,'ulcomatiere_id'=>$idmatiere,'ulcoprof_id'=>$idprof,'sequence'=>$sequence,'trim'=>$trimestre,'ulcosalle_id'=>$idsalle])
    ->execute();
        
             if($query){
                 
                 exit('updated');
             }
             else{
                 exit('notupdated');
             }
             
         }
        else{
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcostudent_id','ulcoprof_id','sequence','trim','ulcomatiere_id','note','chapitre']);
		$esetnote->where(['ulcostudent_id'=>$idstudent,'ulcomatiere_id'=>$idmatiere,'ulcoprof_id'=>$idprof,'sequence'=>$sequence,'trim'=>$trimestre,'ulcosalle_id'=>$idsalle]);
        $rownote = $esetnote->count();
        
        if($rownote>=1){
          
        foreach ($esetnote as $rownote) {
            
            $anote=$rownote->note;
            $chap=$rownote->chapitre;
          
        } 
            
           //exit($anote); 
          $noteresult = array('exist' => 'ok', 'lanote'=>$anote,'chapitre'=>$chap);
              exit(json_encode($noteresult));   
        }
        else{
			
			$noteresult = array('exist' => 'no', 'lanote'=>0);
              exit(json_encode($noteresult)); 

        
       } 
       } 
       
    }
    
    public function enotedir()
    {
        $ulconotesTable=$this->getTableLocator()->get('Ulconotes');
        $ulconote=$ulconotesTable->newEmptyEntity();
        $trim='trim';
        
        $idmatiere=$this->request->getData('matiereid');
        $sujet=$this->request->getData('suj');
        $sequence=$this->request->getData('sq');
        $trimestre=$this->request->getData('trim');
        $idsalle=$this->request->getData('salleid');
        $idstudent=$this->request->getData('studentid');
        //$idprof=$this->request->getData('ulcoprof_id');
        $note=$this->request->getData('note');
        $test=$this->request->getData('test');
       
        $ulconote->ulcosalle_id=$idsalle;
        $ulconote->ulcomatiere_id=$idmatiere;
        //$ulconote->idprof=$idprof;
        $ulconote->ulcostudent_id=$idstudent;
        $ulconote->sequence=$sequence;
        $ulconote->$trim=$trimestre;
        $ulconote->note=$note;
        $ulconote->chapitre=$sujet;
        
         if($test=='test'){
            
            $query = $ulconotesTable->updateQuery();
    $query->set(['note' => $note])
    ->where(['ulcostudent_id'=>$idstudent,'ulcomatiere_id'=>$idmatiere,'sequence'=>$sequence,'trim'=>$trimestre,'ulcosalle_id'=>$idsalle])
    ->execute();
        
             if($query){
                 
                 exit('updated');
             }
             else{
                 exit('notupdated');
             }
             
         }
        else{
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcostudent_id','ulcoprof_id','sequence','trim','ulcomatiere_id','note','chapitre']);
		$esetnote->where(['ulcostudent_id'=>$idstudent,'ulcomatiere_id'=>$idmatiere,'sequence'=>$sequence,'trim'=>$trimestre,'ulcosalle_id'=>$idsalle]);
        $rownote = $esetnote->count();
        
        if($rownote>=1){
          
        foreach ($esetnote as $rownote) {
            
            $anote=$rownote->note;
            $chap=$rownote->chapitre;
          
        } 
            
           //exit($anote); 
          $noteresult = array('exist' => 'ok', 'lanote'=>$anote,'chapitre'=>$chap);
              exit(json_encode($noteresult));   
        }
        else{
			
			$noteresult = array('exist' => 'no', 'lanote'=>0);
              exit(json_encode($noteresult)); 

        
       } 
       } 
       
    }

    public function studentadd()
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $ulcostudent = $this->Ulcostudents->newEmptyEntity();
        
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->where(['idschool' => $codeetabli]);
        
        $esetparent = $this->fetchTable('Ulcoparents')->find();
		$esetparent->where(['idschool' => $codeetabli]);
        
        
        
        if ($this->request->is('post')) {
            $ulcostudent = $this->Ulcostudents->patchEntity($ulcostudent, $this->request->getData());
            
            $ulcostudent->idschool=$codeetabli;
            $ulcostudent->Createdby=$user->id;
            
            if ($this->Ulcostudents->save($ulcostudent)) {
                $this->Flash->success(' <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>Bravo! Enregistrement réussi.
                            </div>',['escape'=>false]);

                return $this->redirect(['action' => '']);

            }
            //var_dump($ulcostudent);
            $this->Flash->error('<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>Oups désolé! Une érreur est survenue, bien vouloir réessayer plus tard.
                            </div>',['escape'=>false]);
        }
        $this->stat(); 
        $this->set(compact('ulcostudent'));
        $this->set('classe','classe');
        $this->set('listsalles',$esetsalle);
        $this->set('listparents',$esetparent);
    }
    
  
    
    public function bulletin($id = null)
    {
        $this->viewBuilder()->enableAutoLayout(false);    
        $this->viewBuilder()->setClassName('CakePdf.Pdf');
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        $school=$user->Etname;
        
        $ulcostudent = $this->Ulcostudents->get($id, contain: []);
        
        $esetsalle = $this->fetchTable('Ulcosalles')->find();
		$esetsalle->select(['id','libele']);
		$esetsalle->where(['id' => $ulcostudent->id]);
        $rowssalle = $esetsalle->count();
        
        if($rowssalle==1){
                    
		foreach ($esetsalle as $rowssalle) {
            
            $nomsalle=$rowssalle->libele;
           
        }   
        }
        
        $esetnote = $this->fetchTable('Ulconotes')->find();
		$esetnote->select(['id','ulcostudent_id','trim']);
		$esetnote->where(['ulcostudent_id' => $id,'trim'=>1]);
        $rownote = (20*$esetnote->count());
        
        $mt=$this->fetchTable('Ulconotes')->find();
		$mt->select([
		'total'=>$mt->func()->sum('note')		
		]);	
		$mt->where(['ulcostudent_id'=>$id,'trim'=>1]);
        
        $filter = ['ulcostudent_id'=>$id,'trim'=>1];
                
   $mtnote=$this->fetchTable('Ulconotes')->find();
   $mtnote->select(['totalmarks' => $mtnote->func()->sum('note'),'totalseq' => $mtnote->func()->count('note'),])
    ->where($filter)
    ->contain(['Ulcomatieres','Ulcoprofs'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
         $esetnote2 = $this->fetchTable('Ulconotes')->find();
		$esetnote2->select(['id','ulcostudent_id','trim']);
		$esetnote2->where(['ulcostudent_id' => $id,'trim'=>2]);
        $rownote2 = (20*$esetnote2->count());
        
        $mt2=$this->fetchTable('Ulconotes')->find();
		$mt2->select([
		'total'=>$mt2->func()->sum('note')		
		]);	
		$mt2->where(['ulcostudent_id'=>$id,'trim'=>2]);
        
        $filters2 = ['ulcostudent_id'=>$id,'trim'=>2];
                
   $mtnotes2=$this->fetchTable('Ulconotes')->find();
   $mtnotes2->select(['totalmarks' => $mtnotes2->func()->sum('note'),'totalseq' => $mtnotes2->func()->count('note'),])
    ->where($filters2)
    ->contain(['Ulcomatieres','Ulcoprofs'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true); 
        
        $esetnote3 = $this->fetchTable('Ulconotes')->find();
		$esetnote3->select(['id','ulcostudent_id','trim']);
		$esetnote3->where(['ulcostudent_id' => $id,'trim'=>3]);
        $rownote3 = (20*$esetnote3->count());
        
        $mt3=$this->fetchTable('Ulconotes')->find();
		$mt3->select([
		'total'=>$mt3->func()->sum('note')		
		]);	
		$mt3->where(['ulcostudent_id'=>$id,'trim'=>3]);
        
        $filters3 = ['ulcostudent_id'=>$id,'trim'=>3];
                
   $mtnotes3=$this->fetchTable('Ulconotes')->find();
   $mtnotes3->select(['totalmarks' => $mtnotes3->func()->sum('note'),'totalseq' => $mtnotes3->func()->count('note'),])
    ->where($filters3)
    ->contain(['Ulcomatieres'])
    ->leftJoinWith('Ulcomatieres')
    ->groupBy(['Ulconotes.ulcomatiere_id'])
    ->enableAutoFields(true);
        
         // GENERAL
        
        $esetnoteg = $this->fetchTable('Ulconotes')->find();
		$esetnoteg->select(['id','ulcostudent_id','trim']);
		$esetnoteg->where(['ulcostudent_id' => $id]);
        $rownoteg = (20*$esetnoteg->count());
        
        
		$mtg=$this->fetchTable('Ulconotes')->find();
		$mtg->select([
		'total'=>$mtg->func()->sum('note')		
		]);	
		$mtg->where(['ulcostudent_id'=>$id]);
        
        
    $this->viewBuilder()->setOption(
        'pdfConfig',
        [
            'orientation' => 'portrait',
            'download' => true, // This can be omitted if "filename" is specified.
            'filename' => strtoupper('Bulletin_'.$ulcostudent->Nom.' '. $ulcostudent->Prenom).'.pdf' //// This can be omitted if you want file name based on URL.
        ]
    );
      
            
      
        $this->stat();    
        $this->set(compact('ulcostudent'));
        $this->set('school',$school);
        $this->set('nomsalle',$nomsalle);
        $this->set('mtnotes',$mtnote);
        $this->set('mtnotess2',$mtnotes2);
        $this->set('mtnotess3',$mtnotes3);
        $this->set('totalnotes',$mt);
        $this->set('totalnotes2',$mt2);
        $this->set('totalnotes3',$mt3);
        $this->set('totalnotesg',$mtg);
        $this->set('notemax',$rownote);
        $this->set('notemax2',$rownote2);
        $this->set('notemax3',$rownote3);
        $this->set('notemaxg',$rownoteg);
        
        
    }
    
    
    
    
    
    public function edit($id = null)
    {
        $ulcostudent = $this->Ulcostudents->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ulcostudent = $this->Ulcostudents->patchEntity($ulcostudent, $this->request->getData());
            if ($this->Ulcostudents->save($ulcostudent)) {
                $this->Flash->success(__('The ulcostudent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ulcostudent could not be saved. Please, try again.'));
        }
        $this->set(compact('ulcostudent'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ulcostudent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ulcostudent = $this->Ulcostudents->get($id);
        if ($this->Ulcostudents->delete($ulcostudent)) {
            $this->Flash->success(__('The ulcostudent has been deleted.'));
        } else {
            $this->Flash->error(__('The ulcostudent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
