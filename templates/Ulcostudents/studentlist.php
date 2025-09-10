<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ulcostudent> $ulcostudents
 */
?>

<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    
    
                    
                    <div class="btn-demo-notika mg-t-30">
						<div class="notika-btn-hd">
							<h2>Listing Elèves <?= $nomsalle; ?></h2>

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
                                    <?php $count=0; foreach ($ulcostudents as $ulcostudent): ?> 
                                    <tr>
                                        <td><?= $count=$count+1; ?></td>
                                        <td>
                                        <?= $this->Html->link(ucwords($ulcostudent->Nom.' '.$ulcostudent->Prenom), ['action' => 'studentdetail', $ulcostudent->id]) ?>
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
                            <div class="material-design-btn">
                           <?php foreach ($ulcosalles as $ulcosalle): ?>
                            
                            <?= $this->Html->link(__(h($ulcosalle->libele)), ['controller'=>'Ulcostudents','action' => 'studentlist',$ulcosalle->id], ['class'=>'btn notika-btn-teal','escapeTitle' =>false]) ?>
                            <?php endforeach; ?>
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
     sms = $(this).data('sms')+'\n'+'<?= strtoupper($ulcostudent->Matricul).'/'.$nomsalle ?>';
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