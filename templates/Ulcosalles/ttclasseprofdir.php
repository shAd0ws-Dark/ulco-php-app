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
    <br>
    
                    
                    <div class="btn-demo-notika mg-t-30">
						<div class="notika-btn-hd">
							<h2>Gestion emplois du temps par classe</h2>
<p><em>Cliquez sur une salle de classe pour gérer l'emplois du temps</em></p>
						</div>
                        <div class="material-design-btn">
                           <?php foreach ($ulcosalles as $ulcosalle): ?>
                            
                            <?= $this->Html->link(__(h($ulcosalle->libele)), ['controller'=>'Ulcotimetables','action' => 'ttadd',$ulcosalle->id], ['class'=>'btn notika-btn-lime','escapeTitle' =>false]) ?>
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
                                    <h2>Instructions</h2><br>
                                    <p><em>Les emplois du temps se gère par classe</em></p>
                                </div>
                            </div>
                            
							<!--<div id="recent-items-chart" class="flot-chart-items flot-chart vt-ct-it tb-rc-it-res"></div>-->
                        </div>
                    </div>
                    </div>
                </div>