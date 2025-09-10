<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ulcoparents Controller
 *
 * @property \App\Model\Table\UlcoparentsTable $Ulcoparents
 */
class UlcoparentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Ulcoparents->find();
        $ulcoparents = $this->paginate($query);

        $this->stat(); 
        $this->set(compact('ulcoparents'));
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
     * @param string|null $id Ulcoparent id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ulcoparent = $this->Ulcoparents->get($id, contain: []);
        $this->set(compact('ulcoparent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function parentadd()
    {
        $this->viewBuilder()->setLayout('dirlayout');
        $ulcoparent = $this->Ulcoparents->newEmptyEntity();
        
        $user = $this->request->getAttribute('identity');
        $codeetabli=$user->Ucode;
        $usertype=$user->Utype;
        
        if ($this->request->is('post')) {
            $ulcoparent = $this->Ulcoparents->patchEntity($ulcoparent, $this->request->getData());
            $ulcoparent->idschool=$codeetabli;
            $ulcoparent->Createdby=$user->id;
            if ($this->Ulcoparents->save($ulcoparent)) {
                $this->Flash->success(' <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>Bravo! Enregistrement réussi.
                            </div>',['escape'=>false]);

                return $this->redirect(['action' => '']);
            }
            //var_dump($ulcoparent);
            $this->Flash->error('<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>Oups désolé! Une érreur est survenue, bien vouloir réessayer plus tard.
                            </div>');
        }
        $this->stat(); 
        $this->set(compact('ulcoparent'));
        $this->set('classe','parent',['escape'=>false]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ulcoparent id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ulcoparent = $this->Ulcoparents->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ulcoparent = $this->Ulcoparents->patchEntity($ulcoparent, $this->request->getData());
            if ($this->Ulcoparents->save($ulcoparent)) {
                $this->Flash->success(__('The ulcoparent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ulcoparent could not be saved. Please, try again.'));
        }
        $this->set(compact('ulcoparent'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ulcoparent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ulcoparent = $this->Ulcoparents->get($id);
        if ($this->Ulcoparents->delete($ulcoparent)) {
            $this->Flash->success(__('The ulcoparent has been deleted.'));
        } else {
            $this->Flash->error(__('The ulcoparent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
