<?php

$jours=['1'=>'Lundi','2'=>'Mardi','3'=>'Mercredi','4'=>'Jeudi','5'=>'Vendredi']
          
 ?>	
											
		


<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    
    
                    
                    <div class="btn-demo-notika mg-t-30">
						<div class="notika-btn-hd">
							<h2>Gestion emplois du temps  <em><?= $nomsalle ?></em></h2><br>
                            <div class="alert-list">
                                <?= $this->Flash->render() ?>
                              </div>   
                   <!--<span class="success-message_view"></span>-->
                    </div>
              <div class="row" >
                  
                     
                           <?= $this->Form->create($ulcotimetable) ?>
            <fieldset>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-menus"></i>
                                    </div>
                              
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <?= $this->Form->select('Jour',$jours, ['empty' => '-Jours-','required' => true,'label'=>false,'class'=>'selectpicker jour','data-live-search'=>true]) ?> 
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-menus"></i>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">                                    
                                        <?= $this->Form->select('Horaire',[''=>''], ['empty' => '-Choisir Horaires-','required' => true,'label'=>false,'class'=>'selectpicker','data-live-search'=>true,'id'=>'hd']) ?> 
                                    </div>
                                </div>
                     
                            </div>
                
   
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-menus"></i>
                                    </div>
                                    <select name="ulcoprof_id" class="selectpicker prf" data-live-search="true" required>
                                        <option selected>--Prof <?= $nomsalle ?>--</option>
                                        <?php 
                                
            foreach ($ulcoprofs as $ulcoprof): ?>	
											<option value="<?= $ulcoprof->ulcoprof->id ?>"><?= $ulcoprof->ulcoprof->full_name ?></option>
			<?php endforeach; ?>								
										</select>
                                </div>
                     
                            </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-menus"></i>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg" >                                    
                                        <?= $this->Form->select('ulcomatiere_id',[''=>''], ['empty' => '-Matière dispo-','required' => true,'label'=>false,'class'=>'selectpicker','id'=>'mt']) ?> 
                                    </div>
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
                        
                        <div class="notika-btn-hd" align="center">
							<h4>Emplois du temp à temps réel de la  <em><?= $nomsalle ?></em></h4><br>
                 
                    </div>
                        <div class="row" align="center">
                        
                  <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                                <h5 style="background-color: #F5D427; color: black">Lundi</h5>
                       <?php foreach ($lundis as $lundi): ?>
                      
                     <strong style="font-size: 13px"><?= $lundi->Horaire ?></strong>: <br>
                      <em style="font-size: 12px"><?= $lundi->ulcomatiere->libele ?></em><br>(<?= $lundi->ulcoprof->full_name ?>)<hr>
                      
                    <?php endforeach;?>
                      
                    
                            </div>
                     
                           
                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                                <h5 style="background-color: #F5D427; color: black">Mardi</h5>
                                <?php foreach ($mardis as $mardi): ?>
                      
                     <strong style="font-size: 13px"><?= $mardi->Horaire ?></strong>: <br>
                      <em style="font-size: 12px"><?= $mardi->ulcomatiere->libele ?></em><br>(<?= $mardi->ulcoprof->full_name ?>)<hr>
                      
                    <?php endforeach;?>
                                
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                                 <h5 style="background-color: #F5D427; color: black">Mercredi</h5>
                               <?php foreach ($mercredis as $mercredi): ?>
                      
                     <strong style="font-size: 13px"><?= $mercredi->Horaire ?></strong>: <br>
                      <em style="font-size: 12px"><?= $mercredi->ulcomatiere->libele ?></em><br>(<?= $mercredi->ulcoprof->full_name ?>)<hr>
                      
                    <?php endforeach;?>
                                
                            </div> 
                        
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                                 <h5 style="background-color: #F5D427; color: black">Jeudi</h5>
                                <?php foreach ($jeudis as $jeudi): ?>
                      
                     <strong style="font-size: 13px"><?= $jeudi->Horaire ?></strong>: <br>
                      <em style="font-size: 12px"><?= $jeudi->ulcomatiere->libele ?></em><br>(<?= $jeudi->ulcoprof->full_name ?>)<hr>
                      
                    <?php endforeach;?>
                            
                            </div>
                        
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                                 <h5 style="background-color: #F5D427; color: black">Vendredi</h5>
                                <?php foreach ($vendredis as $vendredi): ?>
                      
                     <strong style="font-size: 13px"><?= $vendredi->Horaire ?></strong>: <br>
                      <em style="font-size: 12px"><?= $vendredi->ulcomatiere->libele ?></em><br>(<?= $vendredi->ulcoprof->full_name ?>)<hr>
                      
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
                                    <h2>Disponibilité</h2>
                                </div>
                            </div>
                            <em style="font-size: 13px">Les heures affichées sont les heures qui n'ont pas encore été attribuées</em>
                            
                            
							<!--<div id="recent-items-chart" class="flot-chart-items flot-chart vt-ct-it tb-rc-it-res"></div>-->
                        </div>
                    </div>
                    </div>
                </div>

<?= $this->Html->script(['jquery3-7']) ?>

<script>
$(function(){
  
   $(".jour").change(function(){
     jj = $(this).val();
    idsalle=<?= $idsalle ?>;

       $.ajax({
			type: "POST",
			url:"<?= $this->url->build(['controller'=>'Ulcotimetables','action'=>'checkhoraire']) ?>",
			data:{jj:jj,idsalle:idsalle},
			headers:{
				'X-CSRF-Token':$('[name="_csrfToken"]').val()
				},
			success:function(data){
                //alert(data)
                /*datas=jQuery.parseJSON(data);
				paytoken=datas.mmpaytok;
				statu=datas.statusmm;*/
        document.getElementById("hd").innerHTML=data;
        $('.selectpicker').selectpicker('refresh');
            }
        })
       
    
    }) // end on change 
    
    $(".prf").change(function(){
     prof = $(this).val();
    //alert(prof)
    idsalle=<?= $idsalle ?>;

       $.ajax({
			type: "POST",
			url:"<?= $this->url->build(['controller'=>'Ulcotimetables','action'=>'checkmatiere']) ?>",
			data:{prof:prof,idsalle:idsalle},
			headers:{
				'X-CSRF-Token':$('[name="_csrfToken"]').val()
				},
			success:function(data){
                //alert(data)
                /*datas=jQuery.parseJSON(data);
				paytoken=datas.mmpaytok;
				statu=datas.statusmm;*/
        document.getElementById("mt").innerHTML=data;
        $('.selectpicker').selectpicker('refresh');
            }
        })
       
    
    }) // end on change 
    
});
    
    
    
            

    

</script>
