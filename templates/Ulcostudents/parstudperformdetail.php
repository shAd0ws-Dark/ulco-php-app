<?php

foreach ($percentmats as $percentmat): 
        $performancemat=$percentmat->totald;
        $numberseq=$percentmat->totalseqd;
        endforeach; 

$notemaxd=$numberseq*20;

if($notemaxd==0){
    $performanced=0;
    $percolord='#C6C6C6';
}
else{
$performanced=($performancemat*100)/$notemaxd;
    
    if($performanced>=50){
        
        $percolord='#00c292';
        }
    elseif($performanced<50){
       $percolord='#F0090D'; 
    }
    }
                                                   
 

?>

<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    
    <div class="btn-demo-notika mg-t-30">
        
						<div class="notika-btn-hd">
							<h2>Détails 
                               <?= $nommatiere ?> / T<?= $trim ?>
                            </h2>
                           <?= $ulcostudent->Nom ?> / <?= $nomsalle ?><br>
                            <?= $ulcostudent->Matricul ?><br><br> 
                   
                    </div>
              <div class="row">
                  <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <h2><?= h($ulcostudent->Matricul) ?> / <?= $this->Html->link(__(h($nomsalle)), ['controller'=>'Ulcostudents','action' => 'parstudperform',$ulcostudent->id], ['escapeTitle' =>false]) ?></h2>
                                    <em>Mtricule/Classe</em>
                                    </div>
                                </div> <br>
                            </div>
             
                  <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                               <div class="email-round-nock" align="center">
                                <input type="text" class="knob" value="0" data-rel="<?= ($performanced) ?>" data-linecap="round" data-width="60" data-bgcolor="#E4E4E4" data-fgcolor="<?= $percolord; ?>" data-thickness=".20" data-readonly="true">
                             
                                </div>
                            </div>
                     <div class="skill">
                          <?php 
                                
            foreach ($mtnoteds as $mtnoted): 
        
            $percentageseq=($mtnoted->note*100)/20;
            $noteseq=($mtnoted->note*20)/20;
            
            if($percentageseq>=50){
                
                $colorbarseq='nk-green';
            }
            elseif($percentageseq<50){
                $colorbarseq='nk-red';
            }?>
                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                               <div class="progress">
                                    <div class="lead-content">
                                        <p>
                                        <?= $mtnoted->chapitre ?>
                                    </p>   
                                        
                                    </div>
                                    <div class="<?= $colorbarseq ?> progress-bar wow fadeInLeft" data-progress="<?= $percentageseq ?>%" style="width: <?= $percentageseq ?>%;" data-wow-duration="1s" data-wow-delay="1s"><span><?= number_format($noteseq,2) ?>/20</span></div>
                                </div>
                                <hr>
                            </div>
                           <?php endforeach; ?>
                        </div>
                        </div>
                        <br>
                        
                        
                </div>
                    
                    
                </div>

<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                       <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                        <div class="rc-it-ltd">
                            <div class="recent-items-ctn">
                                <div class="recent-items-title">
                                    <h2>Performance des salles</h2>
                                    <em style="font-size: 13px">Cliquez pour avoir les performances détaillées de chaque salle</em>
                                </div>
                            </div>
                            <div class="skill">
                                <?php 
                                
            foreach ($mtnotes as $mtnote): 
        
            $maxnote=($mtnote->totalseq*20);
            $percentagemarks=($mtnote->totalmarks*100)/$maxnote;
            
            if($percentagemarks>=50){
                
                $colorbar='nk-green';
            }
            elseif($percentagemarks<50){
                $colorbar='nk-red';
            }
         
                                                   
       
                                ?> 
                                <div class="progress">
                                    <div class="lead-content">
                                        <p>
                                        <?= $this->Html->link(($mtnote->ulcosalle->libele), ['controller'=>'Ulcostudents','action' => 'parstudperformsalle',$mtnote->ulcosalle->id]) ?>
                                    </p>
                                        
                                        
                                        
                                        
                                    </div>
                                    <div class="<?= $colorbar ?> progress-bar wow fadeInLeft" data-progress="<?= $percentagemarks ?>%" style="width: <?= $percentagemarks ?>%;" data-wow-duration="1s" data-wow-delay="1s"><span><?= number_format($percentagemarks,2) ?>%</span></div>
                                </div>
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
                                                <h2><?= ucwords($nomprof)?></h2><hr>
                                                <strong style="color: skyblue">TEL</strong>: <em><?=$telprof?></em><br>
                                                <strong style="color: skyblue">Email</strong>: <em><?=$mailprof?></em>
                                                <br>
                                                <strong style="color: skyblue">Addresse</strong>: <em><?=$adprof?></em>
                                            </div>
                                            <div class="modal-footer">
                                                
                                                <button type="button" class="btn notika-btn-lightblue" data-dismiss="modal" style="color: white">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
