<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ulcostudent $ulcostudent
 */

/*foreach ($totalnotes as $totalnote): 
        $totalmax=$totalnote->total;
        endforeach; 
if($notemax==0){
    $performancestud=0;
}
else{
$performancestud=($totalmax*100)/$notemax;
    }
$state='';
$etat='';*/


?>


<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    
    
                    
                    <div class="btn-demo-notika mg-t-30" style="background-color: beige">
						<div class="notika-btn-hd">
							<h2>Détails du professeur</h2><br>
                            
                   
                    </div>
              <div class="row">
                  <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h2><?= h($ulcoprof->Matricul) ?></h2>
                                    <em>Mtricule</em>
                                    </div>
                                </div> <br>
                            </div>
                     
                           
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                       <h5>Nom</h5>
                                        <?= ucwords($ulcoprof->Nom) ?>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Prenom</h5>
                                        <?= ucwords($ulcoprof->Prenom) ?>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Date de naissance</h5>
                                        <?= h($ulcoprof->Dob) ?>
                                    </div>
                                </div>
                                <hr>
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Lieu de naissance</h5>
                                        <?= ucwords($ulcoprof->Pob) ?>
                                    </div>
                                </div>
                      <hr>
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Tel</h5>
                                        <?= h($ulcoprof->Tel) ?>
                                    </div>
                                </div>
                      <hr>
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>E-mail</h5>
                                        <?= h($ulcoprof->Email) ?>
                                    </div>
                                </div>
                      <hr>
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Addresse</h5>
                                        <?= ucwords($ulcoprof->Ville) ?>
                                    </div>
                                </div>
                      <hr>
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Status</h5>
                                        <?= ucwords($ulcoprof->Status) ?>
                                    </div>
                                </div>
                      <hr>
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Status professionel</h5>
                                        <?= ucwords($ulcoprof->Statuspro) ?>
                                    </div>
                                </div>
                      <hr>
                            </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h5>Date de prise de fonction</h5>
                                        <?= $ulcoprof->Dateprisefonc ?>
                                    </div>
                                </div>
                      <hr>
                            </div>
                  
                        </div>
                        
                        <div class="notika-btn-hd">
							<h2>Envoies SMS/MAIL</h2><br>
                            <div class="material-design-btn">
                           <?php foreach ($ulcosms as $ulcosmss): ?>
                            
                            <?= $this->Html->link(__(h($ulcosmss->libele)), ['action' => ''], ['class'=>'btn notika-btn-red smslink','escapeTitle' =>false,'title'=>$ulcosmss->libele,'data-toggle'=>'modal','data-target'=>'#myModaltwo2','data-title'=>$ulcosmss->libele,'data-sms'=>$ulcosmss->sms,'data-state'=>$ulcosmss->state]) ?>
                               
                            
                            <?php endforeach; ?>
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
                                    <h2>Liste classes</h2>
                                </div>
                            </div>
                            <em style="font-size: 13px">Liste des classes du professeur<br>Cliquez pour avoir les performance</em>
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
                                            <td><?= $this->Html->link(($profsalle->ulcosalle->libele), ['controller'=>'Ulcoprofs','action' => 'profmatperdetail',$profsalle->ulcoprof_id,$profsalle->ulcosalle_id]) ?></td>
                                        
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

<div class="modal animated rubberBand" id="myModaltwo2" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn notika-btn-lightblue close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                               <h2 id="smstitle"></h2>
                                                <p>
                                                <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group form-elet-mg">
                                    <div class="nk-int-st">
                                        <textarea class="form-control" rows="4" id="sms"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn notika-btn-green ff" data-dismiss="modalm" style="color: white">ENVOYER</button>
                                                <button type="button" class="btn notika-btn-red" data-dismiss="modal" style="color: white">FERMER</button>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(function(){
    $(".smslink").click(function(){
     let title = $(this).data('title');
     sms = $(this).data('sms')+'\n'+'<?= strtoupper($ulcoprof->Matricul)?>';
     let state = $(this).data('state');
    
    if (state=='locked'){
       $("#sms").prop('disabled', true); 
    }
        else if (state=='open'){
           $("#sms").prop('disabled', false); 
        }
    document.getElementById("smstitle").innerHTML=title;
    document.getElementById("sms").innerHTML=sms;
  })
    
   $(".ff").click(function(){
       alert(sms);
   })
});

</script>