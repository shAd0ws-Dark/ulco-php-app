<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ulcostudent> $ulcostudents
 */
?>

<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    
    
                    
                    <div class="btn-demo-notika mg-t-30">
						<div class="notika-btn-hd">
							<h2>Listing complète des Professeurs</h2>
                    <em>Cliquez sur un nom pour pouvoir <strong>affecter</strong> à une classe</em>
                    </div>
              <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nom et Prénom</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count=0; foreach ($listprofs as $listprof): ?> 
                                    <tr>
                                        <td><?= $count=$count+1; ?></td>
                                        <td>
                                        <?= $this->Html->link(ucwords($listprof->Nom.' '.$listprof->Prenom), ['controller'=>'Ulcoenseignes','action' => 'profaffectdir', $listprof->id]) ?>
                                        </td>
                                  
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nom et Prénom</th>
                                    
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
                                    <h2>Affectations</h2>
                                </div>
                            </div>
                            <div class="material-design-btn">
                          Pour affecter un professur à une classe, cliquez sur son nom
                        </div>
							<!--<div id="recent-items-chart" class="flot-chart-items flot-chart vt-ct-it tb-rc-it-res"></div>-->
                        </div>
                    </div>
                    </div>
                </div>

