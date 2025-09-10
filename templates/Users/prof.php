<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */

                                
            foreach ($mtnotes as $mtnote): 
        
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
         
                                                   
 

?>

<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    
    
                    <div class="btn-demo-notika mg-t-30">
                        <div class="email-ctn-round">
                            <div class="email-rdn-hd">
								<h2>Votre performance globale</h2>
							</div>
                            <div class="email-statis-wrap">
                                <div class="email-round-nock">
                                    <input type="text" class="knob" value="0" data-rel="<?= $percentagemarks ?>" data-linecap="round" data-width="130" data-bgcolor="#E4E4E4" data-fgcolor="<?= $percolor ?>" data-thickness=".10" data-readonly="true">
                                </div>
                                <div class="email-ctn-nock">
                                    <p>Votre performance globale</p>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>

<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                       <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                        <div class="rc-it-ltd">
                            <div class="recent-items-ctn">
                                <div class="recent-items-title">
                                    <h2>Vos classes</h2>
                                    <em style="font-size: 13px">Cliquez sur une salle de classe pour avoir la liste des élèves de cette salle</em>
                                </div>
                            </div>
                            <div class="material-design-btn">
                           <?php foreach ($profsalles as $profsalle): ?>
                            
                            <?= $this->Html->link(__(h($profsalle->ulcosalle->libele)), ['controller'=>'Ulcostudents','action' => 'pstudentlist',$profsalle->ulcosalle_id], ['class'=>'btn notika-btn-teal','escapeTitle' =>false]) ?>
                            <?php endforeach; ?>
                        </div>
							<!--<div id="recent-items-chart" class="flot-chart-items flot-chart vt-ct-it tb-rc-it-res"></div>-->
                        </div>
                    </div>
                    </div>
                </div>
