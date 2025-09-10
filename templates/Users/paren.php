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

<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    <br>
    
                    <div class="btn-demo-notika mg-t-30">
						<div class="notika-btn-hd">
							<h2>Listing de vos enfants</h2>
<em style="font-size: 13px">Cliquez sur le nom complet pour voir les performances</em>
                    </div>
              <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Classe, Nom et Prénom</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count=0; foreach ($students as $student): ?> 
                                    <tr>
                                        <td><?= $count=$count+1; ?></td>
                                        <td>
                                        <em><?= $student->ulcosalle->libele ?></em><br>
                                        <?= $this->Html->link(ucwords($student->Nom.' '.$student->Prenom), ['controller'=>'Ulcostudents','action' => 'parstudperform', $student->id]) ?>
                                        </td>
                                  
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Classe, Nom et Prénom</th>
                                    
                                    </tr>
                                </tfoot>
                            </table>
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
