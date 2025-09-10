<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ulcostudent> $ulcostudents
 */
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                      
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn">
                                    <h2>Choisir la matière</h2>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker mati">
                                        <option selected>--Choisissez--</option>
                                        <?php 
                                
            foreach ($choosemats as $choosemat): ?>	
											<option value="<?= $choosemat->ulcomatiere->id ?>" data-lmat="<?= $choosemat->ulcomatiere->libele ?>"><?= $choosemat->ulcomatiere->libele ?></option>
			<?php endforeach; ?>								
										</select>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <h2>Détail du test</h2>
                                </div>
                             
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control suj" placeholder="Détail cours">
                                        
                                    </div>
                                
                                
                            </div>
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <h2>Choisir la séquence</h2>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker seq" >
                                            <option selected>--Choisissez--</option>
											<option value="1">SEQUENCE #1</option>
											<option value="2">SEQUENCE #2</option>
											<option value="3">SEQUENCE #3</option>
											<option value="4">SEQUENCE #4</option>
											<option value="5">SEQUENCE #5</option>
											
										</select>
                                </div>
                            </div>
                            
                              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <h2>Choisir le Trimestre</h2>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker tri">
                                            <option selected>--Choisissez--</option>
											<option value="1">TRIMESTRE #1</option>
											<option value="2">TRIMESTRE #2</option>
											<option value="3">TRIMESTRE #3</option>
											
											
										</select>
                                </div>
                            </div>
                            
                            
                            
                           
                        </div>
                       
                    </div>
                </div>
<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    
    
                    
                    <div class="btn-demo-notika mg-t-30">
						<div class="notika-btn-hd">
							<h2>Listing Elèves/GESTION NOTES <?= $nomsalle; ?></h2> 
                    </div>
                        <br>
                        
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
                                        <?php /*?><?= $this->Html->link(ucwords($ulcostudent->Nom.' '.$ulcostudent->Prenom), ['action' => 'pstudentdetail', $ulcostudent->id]) ?><?php */?>
                                        
                                         <?= $this->Html->link(ucwords($ulcostudent->Nom.' '.$ulcostudent->Prenom), ['action' => ''], ['class'=>'putnote','data-toggle'=>'modal','data-target'=>'#','title'=>'Notez','data-student'=>$ulcostudent->Nom.' '.$ulcostudent->Prenom,'data-studentid'=>$ulcostudent->id,'data-salleid'=>$ulcostudent->ulcosalle_id]) ?>
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
                                    <h2>Vos classes</h2>
                                </div>
                            </div>
                            <div class="material-design-btn">
                          <?php foreach ($profsalles as $profsalle): ?>
                            
                            <?= $this->Html->link(__(h($profsalle->ulcosalle->libele)), ['controller'=>'Ulcostudents','action' => 'pstudentlist',$profsalle->ulcosalle_id], ['class'=>'btn notika-btn-teal','escapeTitle' =>false]) ?>
                            <?php endforeach; ?>
                        </div>
							<!--<div id="recent-items-chart" class="flot-chart-items flot-chart vt-ct-it tb-rc-it-res"></div>-->
                        </div>
                    </div>
                    </div>
                </div>
<div class="modal animated rubberBand" id="myModaltwo" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn notika-btn-lightblue close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                               <h2 id="smstitle"></h2>
                                                <p>
                                                <strong>Matière:</strong> <span><em id="mat"></em></span><br>
                                                <strong>Sujet:</strong> <span><em id="suj"></em></span><br>
                                                <strong>Séquence:</strong> <span><em id="seqc"></em></span><br>
                                                <strong>Trimestre:</strong> <span><em id="tri"></em></span><br>
                                                </p>
                                                <p>
                                                <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb form-elet-mg">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" id="notes">
                                        <label class="nk-label">Entrez la note/ 20</label>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn notika-btn-green ff" data-dismiss="modalm" style="color: white">VALIDER</button>
                                                <button type="button" class="btn notika-btn-red" data-dismiss="modal" style="color: white">ANNULER</button>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>

<?= $this->Html->script(['jquery3-7']) ?>

<script>
$(function(){
    idprof='<?= $profid ?>';
    matiereid='';
    sq='';
    suj='';
    trim='';
    $(".mati").change(function(){
     matiereid = $(this).val();
    libelemat=$(".mati option:selected").data('lmat')
    })
    
    $(".seq").change(function(){
     sq = $(this).val();
    
    })
    
    $(".tri").change(function(){
     trim = $(this).val();

    })
    
    $(".putnote").click(function(){
     let name = $(this).data('student');
    studentid=$(this).data('studentid');
    salleid=$(this).data('salleid');
     suj=$(".suj").val();
        

    if(matiereid==null || matiereid==0){
        
        alert('Bien vouloir choisir la matière')
    }
        else if(suj==null || suj==0){
        
        alert('Bien vouloir entrer le sujet tu test')
    }
        else if(sq==null || sq==0){
        
        alert('Bien vouloir entrer la séquence')
    }
        else if(trim==null || trim==0){
        
        alert('Bien vouloir choisir la trimestre')
    }
        
        else{
        
    $("#myModaltwo").modal('show');   
    document.getElementById("smstitle").innerHTML=name;
    document.getElementById("mat").innerHTML=libelemat;
    document.getElementById("seqc").innerHTML=sq;
    document.getElementById("tri").innerHTML=trim;
    document.getElementById("suj").innerHTML=suj;
            
            }
  })
    
   $(".ff").click(function(){
       
       note=$("#notes").val();
     
       $.ajax({
			type: "POST",
			url:"<?= $this->url->build(['controller'=>'Ulcostudents','action'=>'savenote']) ?>",
			data:{matiereid:matiereid,sq:sq,suj:suj,trim:trim,idprof:idprof,salleid:salleid,studentid:studentid,note:note},
			headers:{
				'X-CSRF-Token':$('[name="_csrfToken"]').val()
				},
			success:function(data){
                //alert(data)
                /*datas=jQuery.parseJSON(data);
				paytoken=datas.mmpaytok;
				statu=datas.statusmm;*/
                
          if(data==='saved'){
                    
                  alert('SAUVEGARDE AVEC SUCCESS')
              $("#myModaltwo").modal('hide');
                }
                
                 else if(data==='deja'){
                    
                  alert('DOUBLON/La note existe déja!\nVérifier le Trimestre ou la séquence')
                     $("#myModaltwo").modal('hide');
                }
                
                else if(data==='savefail'){
                    
                  alert('REESSAYEZ PLUS TARD') 
                    $("#myModaltwo").modal('hide');
                }
                
               
                
            
            }
            
        })
       
       
       
   })
    
    
    
});

</script>
