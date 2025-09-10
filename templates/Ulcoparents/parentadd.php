<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ulcoparent $ulcoparent
 */
?>
<?php



?>


<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    
    
                    
                    <div class="btn-demo-notika mg-t-30">
						<div class="notika-btn-hd">
							<h2>Enregistrement parents</h2><br>
                            <div class="alert-list">
                                <?= $this->Flash->render() ?>
                              </div>   
                   <!--<span class="success-message_view"></span>-->
                    </div>
              <div class="row">
                  
                     
                           <?= $this->Form->create($ulcoparent) ?>
            <fieldset>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Nompere',['label'=>false,'class'=>'form-control','placeholder'=>'Nom du père']); ?>
                                    </div>
                                </div>
                                
                            </div>      
                
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                               <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Prenompere',['label'=>false,'class'=>'form-control','placeholder'=>'Prénom(s) du père']); ?>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-phone"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Telpere',['label'=>false,'class'=>'form-control','placeholder'=>'Téléphone du père']); ?>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Nommere',['label'=>false,'class'=>'form-control','placeholder'=>'Nom de la mère']); ?>
                                    </div>
                                </div>
                               
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Prenommere',['label'=>false,'class'=>'form-control','placeholder'=>'Prénom(s) de la mère']); ?>
                                    </div>
                                </div>
                      
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-phone"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Telmere',['label'=>false,'class'=>'form-control','placeholder'=>'Téléphone de la mère']); ?>
                                    </div>
                                </div>
                      
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Tuteur',['label'=>false,'class'=>'form-control','placeholder'=>'Nom du tuteur']); ?>
                                    </div>
                                </div>
                     
                            </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-phone"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Teltuteur',['label'=>false,'class'=>'form-control','placeholder'=>'Téléphone du tuteur']); ?>
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
                                        <?= $this->Form->control('Adpere',['label'=>false,'class'=>'form-control','placeholder'=>'Addresse du père']); ?>
                                    </div>
                                </div>
                     
                            </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Admere',['label'=>false,'class'=>'form-control','placeholder'=>'Addresse de la mère']); ?>
                                    </div>
                                </div>
                     
                            </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?= $this->Form->control('Adtuteur',['label'=>false,'class'=>'form-control','placeholder'=>'Addresse du tuteur']); ?>
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
                                <h2>Performances</h2>
                                <p>Moyenne Géneral</p>
                            </div>
                        </div>
                         
                                    
                                         <?php /*?><div class="email-round-nock" align="center">
                                    <input type="text" class="knob" value="0" data-rel="<?= $performancestud; ?>" data-linecap="round" data-width="70" data-bgcolor="#E4E4E4" data-fgcolor="<?= $percolor; ?>" data-thickness=".20" data-readonly="true">
                             
                                </div><?php */?>
                                
                                    
                                
                        
                    </div>
                
                </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(function(){
    
});

</script>

