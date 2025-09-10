<?php


          
 ?>	
											
		


<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    
    
                    
                    <div class="btn-demo-notika mg-t-30">
						<div class="notika-btn-hd">
							<h2>Affectation du professeur <em><?= $nomprof ?></em></h2><br>
                            <div class="alert-list">
                                <?= $this->Flash->render() ?>
                              </div>   
                   <!--<span class="success-message_view"></span>-->
                    </div>
              <div class="row">
                  
                     
                           <?= $this->Form->create($ulcoenseigne) ?>
            <fieldset>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-menus"></i>
                                    </div>
                              
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select name="ulcomatiere_id" class="selectpicker mati" data-live-search="true" required>
                                        <option selected>--Choisissez--</option>
                                        <?php 
                                
            foreach ($choosemats as $choosemat): ?>	
											<option value="<?= $choosemat->id ?>"><?= $choosemat->libele ?></option>
			<?php endforeach; ?>								
										</select>
                                    </div>
                                </div>
                                
                            </div>
                              
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-menus"></i>
                                    </div>
                                    <select name="ulcosalle_id" class="selectpicker" data-live-search="true" required>
                                        <option selected>--Choisissez--</option>
                                        <?php 
                                
            foreach ($listsalles as $listsalle): ?>	
											<option value="<?= $listsalle->id ?>"><?= $listsalle->libele ?></option>
			<?php endforeach; ?>								
										</select>
                                </div>
                     
                            </div>
                 </fieldset><br>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="material-design-btn col-lg-4 col-md-4 col-sm-4 col-xs-12">
                     <div class="form-group ic-cmp-int">
            <?= $this->Form->button(__('VALIDER'),['class'=>'btn notika-btn-green btn-reco-mg btn-button-mg']) ?>
                </div>     
                </div>     
                </div>
                  <?= $this->Form->end() ?>
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
                                </div>
                            </div>
                            <em style="font-size: 13px">Liste des classes du professeur<br>Cliquez pour avoir les performance détaillées</em>
                            <div class="recent-items-inn">
                                <table class="table table-inner table-vmiddle">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Class</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                $count=0;
            foreach ($profsalles as $profsalle): 
                           
                                ?> 
                                        <tr>
                                            <td class="f-500 c-cyan"><?= $count=$count+1; ?></td>
                                            <td><?= $this->Html->link(($profsalle->ulcosalle->libele), ['controller'=>'Ulcoprofs','action' => 'profmatperdetaildir',$profsalle->ulcoprof_id,$profsalle->ulcosalle_id]) ?></td>
                                        
                                        </tr>
                                      <?php endforeach; ?>  
                                    </tbody>
                                </table>
                            </div>
                            
							<!--<div id="recent-items-chart" class="flot-chart-items flot-chart vt-ct-it tb-rc-it-res"></div>-->
                        </div>
                    </div>
                    </div>
                </div>

<?= $this->Html->script(['jquery3-7']) ?>
