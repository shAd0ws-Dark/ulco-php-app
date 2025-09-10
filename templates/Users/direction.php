<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
 foreach ($mtnotes as $mtnote): 
        
            $maxnote=($mtnote->totalseq*20);
            $percentagemarks=($mtnote->totalmarks*100)/$maxnote;
            
            if($percentagemarks>=50){
                
                $colorbar='#00c292';
            }
            elseif($percentagemarks<50){
                $colorbar='#F0090D';
            }
                          endforeach; 
?>

<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    
    
                    <div class="btn-demo-notika mg-t-30">
						
                        <div class="email-ctn-round">
                            <div class="email-rdn-hd">
								<h2>Performances</h2>
							</div>
                            <div class="email-statis-wrap">
                                <div class="email-round-nock">
                                    <input type="text" class="knob" value="0" data-rel="<?= $percentagemarks ?>" data-linecap="round" data-width="130" data-bgcolor="#E4E4E4" data-fgcolor="<?= $colorbar; ?>" data-thickness=".10" data-readonly="true">
                                </div>
                                <div class="email-ctn-nock">
                                    <p>Globale de l'établissement</p>
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
                                    <h2>Liste classes</h2>
                                    <em style="font-size: 13px">Cliquez sur une salle de classe pour avoir la liste des élèves de cette salle</em>
                                </div>
                            </div>
                            <div class="material-design-btn">
                           <?php foreach ($ulcosalles as $ulcosalle): ?>
                            
                            <?= $this->Html->link(__(h($ulcosalle->libele)), ['controller'=>'Ulcostudents','action' => 'studentlistdir',$ulcosalle->id], ['class'=>'btn notika-btn-teal','escapeTitle' =>false]) ?>
                            <?php endforeach; ?>
                        </div>
							<!--<div id="recent-items-chart" class="flot-chart-items flot-chart vt-ct-it tb-rc-it-res"></div>-->
                        </div>
                    </div>
                    </div>
                </div>
