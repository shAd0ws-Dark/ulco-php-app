<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */

                                
            /*foreach ($mtnotes as $mtnote): 
        
            $maxnote=($mtnote->totalseq*20);
           
            endforeach;

            if($maxnote==0){
             $percentagemarks=0;   
                $percolor='#C6C6C6';
            }
else{
     $percentagemarks=($mtnote->totalmarks*100)/$maxnote;
            if($percentagemarks>=50){
                
                $percolor='#00c292';
            }
            elseif($percentagemarks<50){
                 $percolor='#F0090D'; 
            }
    }
         */
                                                   
 

?>

<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12" >
    
    
                    
                    <div class="btn-demo-notika mg-t-30" style="background-color: beige">
						<div class="notika-btn-hd">
							<h2>PERFORMANCE DE LA <?= $nomsalle ?></h2>
                               
                          
                       <em style="font-size: 13px">Cliquez sur la matière pour avoir plus de détails sur les performance de toute la salle</em>     
                    </div>
              <br>
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
                                
            foreach ($mtnotess1 as $mtnotes1): 
        
            $maxnote=($mtnotes1->totalseq*20);
            $percentagemarks=($mtnotes1->totalmarks*100)/$maxnote;
            
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
                                        <?= $this->Html->link(($mtnotes1->ulcomatiere->libele), ['controller'=>'Ulcostudents','action' => 'parstudperformsalledetail',$idsalle,$mtnotes1->ulcomatiere_id,1]) ?>
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
                                        <?= $this->Html->link(($mtnotes2->ulcomatiere->libele), ['controller'=>'Ulcostudents','action' => 'parstudperformdetail',$idsalle,$mtnotes2->ulcomatiere_id,2]) ?>
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
                                        <?= $this->Html->link(($mtnotes3->ulcomatiere->libele), ['controller'=>'Ulcostudents','action' => 'parstudperformdetail',$idsalle,$mtnotes3->ulcomatiere_id,3]) ?>
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

<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                       <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                        <div class="rc-it-ltd">
                            <div class="recent-items-ctn">
                                <div class="recent-items-title">
                                    <h2>Performance des salles</h2>
                                    <em style="font-size: 13px">Cliquez pour avoir les performances détaillées de chaque salle</em>
                                </div>
                            </div>
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
                                        <?= $this->Html->link(($mtnote->ulcosalle->libele), ['controller'=>'Ulcostudents','action' => 'parstudperformsalle',$mtnote->ulcosalle->id]) ?>
                                    </p>
                                        
                                        
                                        
                                        
                                    </div>
                                    <div class="<?= $colorbar ?> progress-bar wow fadeInLeft" data-progress="<?= $percentagemarks ?>%" style="width: <?= $percentagemarks ?>%;" data-wow-duration="1s" data-wow-delay="1s"><span><?= number_format($percentagemarks,2) ?>%</span></div>
                                </div>
                               <?php endforeach; ?>
                            </div>
							<!--<div id="recent-items-chart" class="flot-chart-items flot-chart vt-ct-it tb-rc-it-res"></div>-->
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
