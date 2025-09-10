<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */

                                
       
                                                   
 

?>

<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    
    
     <div class="btn-demo-notika mg-t-30">
          <div class="notika-btn-hd">
								<h4>Emplois du temps / <em style="font-weight: 400"><?= $nomprof ?></em></h4>
								
							</div>
        <br>
                    <div class="row" align="center">
                  <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                                <h5 style="background-color: #F5D427; color: black">Lundi</h5>
                       <?php foreach ($lundis as $lundi): ?>
                      
                     <strong style="font-size: 13px"><?= $lundi->Horaire ?></strong>: <em style="font-size: 12px"><?= $lundi->ulcosalle->libele ?></em><br>
                      <em style="font-size: 12px"><?= $lundi->ulcomatiere->libele ?></em><br><hr>
                      
                    <?php endforeach;?>
                      
                    
                            </div>
                     
                           
                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                                <h5 style="background-color: #F5D427; color: black">Mardi</h5>
                                <?php foreach ($mardis as $mardi): ?>
                      
                     <strong style="font-size: 13px"><?= $mardi->Horaire ?></strong>: <em style="font-size: 12px"><?= $mardi->ulcosalle->libele ?></em><br>
                      <em style="font-size: 12px"><?= $mardi->ulcomatiere->libele ?></em><hr>
                      
                    <?php endforeach;?>
                                
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                                 <h5 style="background-color: #F5D427; color: black">Mercredi</h5>
                               <?php foreach ($mercredis as $mercredi): ?>
                      
                     <strong style="font-size: 13px"><?= $mercredi->Horaire ?></strong>: <em style="font-size: 12px"><?= $mercredi->ulcosalle->libele ?></em><br>
                      <em style="font-size: 12px"><?= $mercredi->ulcomatiere->libele ?></em><hr>
                      
                    <?php endforeach;?>
                                
                            </div> 
                        
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                                 <h5 style="background-color: #F5D427; color: black">Jeudi</h5>
                                <?php foreach ($jeudis as $jeudi): ?>
                      
                     <strong style="font-size: 13px"><?= $jeudi->Horaire ?></strong>: <em style="font-size: 12px"><?= $jeudi->ulcosalle->libele ?></em><br>
                      <em style="font-size: 12px"><?= $jeudi->ulcomatiere->libele ?></em><hr>
                      
                    <?php endforeach;?>
                            
                            </div>
                        
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                                 <h5 style="background-color: #F5D427; color: black">Vendredi</h5>
                                <?php foreach ($vendredis as $vendredi): ?>
                      
                     <strong style="font-size: 13px"><?= $vendredi->Horaire ?></strong>: <em style="font-size: 12px"><?= $vendredi->ulcosalle->libele ?></em><br>
                      <em style="font-size: 12px"><?= $vendredi->ulcomatiere->libele ?></em><hr>
                      
                    <?php endforeach;?>
                            
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
                                    <h2>Liste classes</h2><br>
                                    <em style="font-size: 13px">Cliquez sur une salle de classe pour avoir la liste des professeurs de cette classe</em>
                                </div>
                            </div>
                            <div class="material-design-btn">
                           <?php foreach ($profsalles as $profsalle): ?>
                            
                            <?= $this->Html->link(__(h($profsalle->ulcosalle->libele)), ['controller'=>'Ulcoenseignes','action' => 'proflistdir',$profsalle->ulcosalle->id], ['class'=>'btn notika-btn-teal','escapeTitle' =>false]) ?>
                            <?php endforeach; ?>
                        </div>
							<!--<div id="recent-items-chart" class="flot-chart-items flot-chart vt-ct-it tb-rc-it-res"></div>-->
                        </div>
                    </div>
                    </div>
                </div>
