<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ulcostudent $ulcostudent
 */

foreach ($totalnotes as $totalnote): 
        $totalmax=$totalnote->total;
        endforeach; 
if($notemax==0){
    $performancestud=0;
     $percolor='#C6C6C6';
}
else{
$performancestud=($totalmax*100)/$notemax;
    
    if($performancestud>=50){
        
        $percolor='#00c292';
        }
    elseif($performancestud<50){
       $percolor='#F0090D'; 
    }
    }
$state='';
$etat='';


?>


<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    
    
                    
                    <div class="btn-demo-notika mg-t-30">
						<div class="notika-btn-hd">
							<h2>Détails de l'élève</h2><br>
                            
                   
                    </div>
              <div class="row">
                  <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h2><?= h($ulcostudent->Matricul) ?> / <?= $this->Html->link(__(h($nomsalle)), ['controller'=>'Ulcostudents','action' => 'pstudentlist',$idsalle], ['escapeTitle' =>false]) ?></h2>
                                    <em>Mtricule/Classe</em>
                                    </div>
                                </div> <br>
                            </div>
                     
                           
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                       <h5>Nom</h5>
                                        <?= ucwords($ulcostudent->Nom) ?>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Prenom</h5>
                                        <?= ucwords($ulcostudent->Prenom) ?>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Date de naissance</h5>
                                        <?= h($ulcostudent->Dob) ?>
                                    </div>
                                </div>
                                <hr>
                            </div>
                  
                  <?php /*?><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Lieu de naissance</h5>
                                        <?= ucwords($ulcostudent->Pob) ?>
                                    </div>
                                </div>
                      <hr>
                            </div><?php */?>
                  
                  <?php /*?><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Tel</h5>
                                        <?= h($ulcostudent->Tel) ?>
                                    </div>
                                </div>
                      <hr>
                            </div><?php */?>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Type</h5>
                                        <?= h($ulcostudent->Type) ?>
                                    </div>
                                </div>
                      <hr>
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Père</h5>
                                        <?= ucwords($nompere) ?>
                                    </div>
                                </div>
                      <hr>
                            </div>
                  
                  <?php /*?><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Tel</h5>
                                        <?= ucwords($telpere) ?>
                                    </div>
                                </div>
                      <hr>
                            </div><?php */?>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Adresse</h5>
                                        <?= ucwords($adpere) ?>
                                    </div>
                                </div>
                      <hr>
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Mère</h5>
                                        <?= ucwords($nommere) ?>
                                    </div>
                                </div>
                      <hr>
                            </div>
                  
                  <?php /*?><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Tel</h5>
                                        <?= ucwords($telmere) ?>
                                    </div>
                                </div>
                      <hr>
                            </div><?php */?>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Adresse</h5>
                                        <?= ucwords($admere) ?>
                                    </div>
                                </div>
                      <hr>
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Tuteur</h5>
                                        <?= ucwords($nomtuteur) ?>
                                    </div>
                                </div>
                      <hr>
                            </div>
                  
                  <?php /*?><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Tel</h5>
                                        <?= ucwords($teltuteur) ?>
                                    </div>
                                </div>
                      <hr>
                            </div><?php */?>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Adresse</h5>
                                        <?= ucwords($adtuteur) ?>
                                    </div>
                                </div>
                      <hr>
                            </div>
                        </div>
                        <br>
                        <div class="notika-btn-hd">
							<h2>Envoies SMS/MAIL</h2><br>
                            <div class="material-design-btn">
                           <?php foreach ($ulcosms as $ulcosmss): ?>
                            
                            <?= $this->Html->link(__(h($ulcosmss->libele)), ['action' => ''], ['class'=>'btn notika-btn-red smslink','escapeTitle' =>false,'title'=>$ulcosmss->libele,'data-toggle'=>'modal','data-target'=>'#myModaltwo2','data-title'=>$ulcosmss->libele,'data-sms'=>$ulcosmss->sms,'data-state'=>$ulcosmss->state]) ?>
                               
                            
                            <?php endforeach; ?>
                        </div>
                            
                    </div>
                        
                </div>
                </div>
<div class="modal animated rubberBand" id="myModaltwo" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn notika-btn-lightblue close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <h2><?= ucwords($nomprof)?></h2><hr>
                                                <strong style="color: skyblue">TEL</strong>: <em><?=$telprof?></em><br>
                                                <strong style="color: skyblue">Email</strong>: <em><?=$mailprof?></em>
                                                <br>
                                                <strong style="color: skyblue">Addresse</strong>: <em><?=$adprof?></em>
                                            </div>
                                            <div class="modal-footer">
                                                
                                                <button type="button" class="btn notika-btn-lightblue" data-dismiss="modal" style="color: white">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
               
                    <div class="ongoing-task-inner notika-shadow mg-t-30">
                        <div class="realtime-ctn">
                            <div class="realtime-title ongoing-hd-wd">
                                <h2>Performances</h2>
                                <p>Moyenne Géneral</p>
                            </div>
                        </div>
                         
                                    
                                         <div class="email-round-nock" align="center">
                                    <input type="text" class="knob" value="0" data-rel="<?= $performancestud; ?>" data-linecap="round" data-width="70" data-bgcolor="#E4E4E4" data-fgcolor="<?= $percolor; ?>" data-thickness=".20" data-readonly="true">
                             
                                </div>
                                
                                    
                                
                        <div class="skill-content-3 ongoing-tsk">
                                <div class="accordion-stn">
                                    <div class="panel-group" data-collapse-color="nk-green" id="accordionGreen" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-one" aria-expanded="true">
															TRIMESTRE 1#
														</a>
                                                </h4>
                                            </div>
                                            <div id="accordionGreen-one" class="collapse in" role="tabpanel" align="left">
                                                <div class="panel-body">
                                                    <div class="skill">
                                <?php 
                                
            foreach ($mtnotes as $mtnote): 
        
            $maxnote=($mtnote->totalseq*20);
            $percentagemarks=($mtnote->totalmarks*100)/$maxnote;
            
            if($percentagemarks>=50){
                
                $colorbar='nk-green';
            }
            elseif($percentagemarks<50){
                $colorbar='nk-red';
            }
         
                                                   
       
                                ?> 
                                <div class="progress">
                                    <div class="lead-content">
                                        <p>
                                        <?= $this->Html->link(($mtnote->ulcomatiere->libele), ['controller'=>'Ulcostudents','action' => 'pmatieredetail',$ulcostudent->id,$mtnote->ulcomatiere_id,1]) ?>
                                    </p>
                                         
                                        
                                    </div>
                                    <div class="<?= $colorbar ?> progress-bar wow fadeInLeft" data-progress="<?= $percentagemarks ?>%" style="width: <?= $percentagemarks ?>%;" data-wow-duration="1s" data-wow-delay="1s"><span><?= number_format($percentagemarks,2) ?>%</span></div>
                                </div>
                               <?php endforeach; ?>
                            </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-two" aria-expanded="false">
															TRIMESTRE 2#
														</a>
                                                </h4>
                                            </div>
                                            <div id="accordionGreen-two" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    <div class="skill">
                                <?php 
                                
            foreach ($mtnotess2 as $mtnotes2): 
        
            $maxnotes2=($mtnotes2->totalseq*20);
            $percentagemarkss2=($mtnotes2->totalmarks*100)/$maxnotes2;
            
            if($percentagemarkss2>=50){
                
                $colorbars2='nk-green';
            }
            elseif($percentagemarkss2<50){
                $colorbars2='nk-red';
            }
         
                                                   
       
                                ?> 
                                <div class="progress">
                                    <div class="lead-content">
                                        <p>
                                        <?= $this->Html->link(($mtnotes2->ulcomatiere->libele), ['controller'=>'Ulcostudents','action' => 'pmatieredetail',$ulcostudent->id,$mtnotes2->ulcomatiere_id,2]) ?>
                                    </p>
                                        
                                        
                                        
                                        
                                    </div>
                                    <div class="<?= $colorbars2 ?> progress-bar wow fadeInLeft" data-progress="<?= $percentagemarkss2 ?>%" style="width: <?= $percentagemarkss2 ?>%;" data-wow-duration="1s" data-wow-delay="1s"><span><?= number_format($percentagemarkss2,2) ?>%</span></div>
                                </div>
                               <?php endforeach; ?>
                            </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-three" aria-expanded="false">
															TRIMESTRE 3#
														</a>
                                                </h4>
                                            </div>
                                            <div id="accordionGreen-three" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                   <div class="skill">
                                <?php 
             
            foreach ($mtnotess3 as $mtnotes3): 
            
            
            $maxnotes3=($mtnotes3->totalseq*20);
            if($maxnotes3==0){
             $percentagemarkss3=0;
            return false;
            }
            else{                                           
            $percentagemarkss3=($mtnotes3->totalmarks*100)/$maxnotes3;
            }
                                                       
            if($percentagemarkss3>=50){
                
                $colorbars3='nk-green';
            }
            elseif($percentagemarkss3<50){
                $colorbars3='nk-red';
            }
         
                                                   
       
                                ?> 
                                <div class="progress">
                                    <div class="lead-content">
                                        <p>
                                        <?= $this->Html->link(($mtnotes3->ulcomatiere->libele), ['controller'=>'Ulcostudents','action' => 'pmatieredetail',$ulcostudent->id,$mtnotes3->ulcomatiere_id,3]) ?>
                                    </p>
                                        
                                        
                                        
                                        
                                    </div>
                                    <div class="<?= $colorbars3 ?> progress-bar wow fadeInLeft" data-progress="<?= $percentagemarkss3 ?>%" style="width: <?= $percentagemarkss3 ?>%;" data-wow-duration="1s" data-wow-delay="1s"><span><?= number_format($percentagemarkss3,2) ?>%</span></div>
                                </div>
                               <?php endforeach; ?>
                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                            <br>
                            <br>
                            
                               <h3>
                                            <?= $this->Html->link(ucwords($nomprof), ['action' => ''], ['title'=>'Voir Détails','data-toggle'=>'modal','data-target'=>'#myModaltwo']) ?>
                                        
                                        </h3>
                          
                            Prof Principal
                        </div>
                    </div>
                
                </div>

<div class="modal animated rubberBand" id="myModaltwo2" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn notika-btn-lightblue close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                               <h2 id="smstitle"></h2>
                                                <p>
                                                <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group form-elet-mg">
                                    <div class="nk-int-st">
                                        <textarea class="form-control" rows="5" id="sms"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn notika-btn-green ff" data-dismiss="modalm" style="color: white">ENVOYER</button>
                                                <button type="button" class="btn notika-btn-red" data-dismiss="modal" style="color: white">FERMER</button>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>

<?= $this->Html->script(['jquery3-7']) ?>
<script>
$(function(){
    $(".smslink").click(function(){
     let title = $(this).data('title');
     sms = $(this).data('sms')+'\n'+'<?= strtoupper($ulcostudent->Matricul).'/'.$nomsalle ?>'+'\n'+'Contact Prof: <?=$telprof?>';
     let state = $(this).data('state');
    
    if (state=='locked'){
       $("#sms").prop('disabled', true); 
    }
        else if (state=='open'){
           $("#sms").prop('disabled', false); 
        }
    document.getElementById("smstitle").innerHTML=title;
    document.getElementById("sms").innerHTML=sms;
  })
    
   $(".ff").click(function(){
       alert(sms);
   })
});

</script>