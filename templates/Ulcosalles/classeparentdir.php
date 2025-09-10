<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ulcosalle> $ulcosalles
 */


?>

<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>

<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
   
    
                    
                    <div class="btn-demo-notika mg-t-30">
						<div class="notika-btn-hd">
							<h2>Liste des Parents par classes</h2>
<p><em>Cliquez sur une salle de classe pour avoir la liste des parents de cette salle</em></p>
						</div>
                        <div class="material-design-btn">
                           <?php foreach ($ulcosalles as $ulcosalle): ?>
                            
                            <?= $this->Html->link(__(h($ulcosalle->libele)), ['controller'=>'Ulcostudents','action' => 'parentlistdir',$ulcosalle->id], ['class'=>'btn notika-btn-teal','escapeTitle' =>false]) ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                
                </div>


<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                       <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                        <div class="rc-it-ltd">
                            <div class="recent-items-ctn">
                                <div class="recent-items-title">
                                    <h2>Performance Classes</h2>
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
                                        <?= $this->Html->link(($mtnote->ulcosalle->libele), ['action' => 'detailclassedir',$mtnote->ulcosalle->id]) ?>
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