
<?php


$gender = ['M' => 'Masculin','F' => 'Feminin'];
$status = ['CONTRACTUEL' => 'CONTRACTUEL','VACATAIRE' => 'VACATAIRE'];
$statuspro = ['PLEG' => 'PLEG','FONCTIONAIRE' => 'FONCTIONAIRE'];
?>


<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    
    
                    
                    <div class="btn-demo-notika mg-t-30">
						<div class="notika-btn-hd">
							<h2>Enregistrement professeurs</h2><br>
                            <div class="alert-list">
                                <?= $this->Flash->render() ?>
                              </div>   
                   <!--<span class="success-message_view"></span>-->
                    </div>
              <div class="row">
                  
                     
                           <?= $this->Form->create($ulcoprof) ?>
            <fieldset>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Matricul',['label'=>false,'class'=>'form-control','placeholder'=>'Matricul']); ?>
                                    </div>
                                </div>
                                
                            </div>
                
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Nom',['label'=>false,'class'=>'form-control','placeholder'=>'Nom']); ?>
                                    </div>
                                </div>
                                
                            </div>      
                
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                               <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Prenom',['label'=>false,'class'=>'form-control','placeholder'=>'Prénom(s)']); ?>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-menus"></i>
                                    </div>
                              
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <?= $this->Form->select('genre',$gender,['empty' => '-Genre-','label'=>false, 'class'=>'selectpicker','required'=>true]); ?>
                                    </div>
                                </div>
                                
                            </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-menus"></i>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <?= $this->Form->select('Status',$status,['empty' => '-Status-','label'=>false, 'class'=>'selectpicker','required'=>true]); ?>
                                    </div>
                                </div>
                     
                            </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                   <div class="form-ic-cmp">
                                        <i class="notika-icon notika-menus"></i>
                                    </div>
                                     <div class="bootstrap-select fm-cmp-mg">
                                        <?= $this->Form->select('Statuspro',$statuspro,['empty' => '-Statuspro-','label'=>false, 'class'=>'selectpicker','required'=>true]); ?>
                                    </div>
                                </div>
                     
                            </div>
                
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-phone"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Tel',['label'=>false,'class'=>'form-control','placeholder'=>'Téléphone']); ?>
                                    </div>
                                </div>
                               
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-mail"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Email',['label'=>false,'class'=>'form-control','placeholder'=>'Email']); ?>
                                    </div>
                                </div>
                      
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Ville',['label'=>false,'class'=>'form-control','placeholder'=>'Addresse']); ?>
                                    </div>
                                </div>
                      
                            </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Pob',['label'=>false,'class'=>'form-control','placeholder'=>'Lieu de naissance']); ?>
                                    </div>
                                </div>
                     
                            </div>
                
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-calendar"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Dob',['label'=>'Date de naissance','class'=>'form-control','placeholder'=>'dd-mm-yyyy','data-mask'=>'99-99-9999']); ?>
                                    </div>
                                </div>
                               
                            </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-calendar"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Dateprisefonc',['label'=>'Date de prise de fonction','class'=>'form-control','placeholder'=>'dd-mm-yyyy','data-mask'=>'99-99-9999']); ?>
                                    </div>
                                </div>
                               
                            </div>
                
                
                  
                  
                 </fieldset>
                <div class="material-design-btn col-lg-4 col-md-4 col-sm-4 col-xs-12">
                     <div class="form-group ic-cmp-int">
            <?= $this->Form->button(__('VALIDER'),['class'=>'btn notika-btn-green btn-reco-mg btn-button-mg']) ?>
                </div>     
                </div>     
            <?= $this->Form->end() ?>
                        </div>
                     
                        
                        
                </div>
                </div>


<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
               
                    <div class="ongoing-task-inner notika-shadow mg-t-30">
                        <div class="realtime-ctn">
                            <div class="realtime-title ongoing-hd-wd">
                                <h2>Instructions</h2>
                                <p>Les informations obligatoires</p><br>
                                <ul style="color: red; font-style: italic;list-style-type: disc">
                                <li>Matricul</li>
                                <li>Nom</li>
                                <li>Genre</li>
                                <li>Status</li>
                                <li>Statuspro</li>
                                <li>Téléphone</li>
                                <li>Téléphone</li>
                                <li>Addresse</li>
                                <li>Lieu de naissance</li>
                                <li>Date de naissance</li>
                                <li>Date de prise de fonction</li>
                                </ul>
                            </div>
                        </div>
                         
                                    
                                         <?php /*?><div class="email-round-nock" align="center">
                                    <input type="text" class="knob" value="0" data-rel="<?= $performancestud; ?>" data-linecap="round" data-width="70" data-bgcolor="#E4E4E4" data-fgcolor="<?= $percolor; ?>" data-thickness=".20" data-readonly="true">
                             
                                </div><?php */?>
                                
                                    
                                
                        
                    </div>
                
                </div>



<?= $this->Html->script(['jquery3-7']) ?>
<script>
$(function(){
    
});

</script>

