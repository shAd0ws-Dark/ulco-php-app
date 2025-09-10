<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ulcostudent> $ulcostudents
 */
?>

<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    
    
                    
                    <div class="btn-demo-notika mg-t-30">
						<div class="notika-btn-hd">
							<h2>Listing Professeurs <?= $nomsalle; ?></h2>

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
                                        <?= $this->Html->link(ucwords($listprof->ulcoprof->Nom.' '.$listprof->ulcoprof->Prenom), ['controller'=>'Ulcoprofs','action' => 'profdetaildir', $listprof->ulcoprof->id,$listprof->ulcosalle_id]) ?>
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
                                    <h2>Liste Classes</h2><br>
                                    <em style="font-size: 13px">Cliquez sur une salle de classe pour avoir la liste des professeurs de cette classe</em>
                                </div>
                            </div>
                            <div class="material-design-btn">
                           <?php foreach ($ulcosalles as $ulcosalle): ?>
                            
                            <?= $this->Html->link(__(h($ulcosalle->libele)), ['controller'=>'Ulcoenseignes','action' => 'proflistdir',$ulcosalle->id], ['class'=>'btn notika-btn-lime','escapeTitle' =>false]) ?>
                            <?php endforeach; ?>
                        </div>
							<!--<div id="recent-items-chart" class="flot-chart-items flot-chart vt-ct-it tb-rc-it-res"></div>-->
                        </div>
                    </div>
                    </div>
                </div>

