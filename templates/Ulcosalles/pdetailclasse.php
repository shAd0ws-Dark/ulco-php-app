<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ulcosalle $ulcosalle
 */
?>
<?php foreach ($totalnotes as $totalnote): 
        $totalmax=$totalnote->total;
        endforeach; 
if($notemax==0){
    $performanceprof=0;
    $percolor='#C6C6C6';
}
else{
$performanceprof=($totalmax*100)/$notemax;
    
    if($performanceprof>=50){
        
        $percolor='#00c292';
        }
    elseif($performanceprof<50){
       $percolor='#F0090D'; 
    }
   
    }
?>

<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
   
    
                    <div class="btn-demo-notika mg-t-30" style="background-color: beige">
                            <div class="notika-btn-hd">
								<h2>Vos performances en classe de: <?= h($ulcosalle->libele) ?></h2>
							</div>
                           <div class="row">
                            <div class="skill">
                          <?php 
                                
            foreach ($mtnotems as $mtnotem): 
        
            $maxnotem=($mtnotem->totalseq*20);
            $percentagemarksm=($mtnotem->totalmarks*100)/$maxnotem;
            
            if($percentagemarksm>=50){
                
                $colorbarm='nk-green';
            }
            elseif($percentagemarksm<50){
                $colorbarm='nk-red';
            }?>
                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                               <div class="progress">
                                    <div class="lead-content">
                                        <p>
                                      <?= $mtnotem->ulcomatiere->libele ?>
                                    </p>   
                                        
                                    </div>
                                    <div class="<?= $colorbarm ?> progress-bar wow fadeInLeft" data-progress="<?= $percentagemarksm ?>%" style="width: <?= $percentagemarksm ?>%;" data-wow-duration="1s" data-wow-delay="1s"><span><?= number_format($percentagemarksm,2) ?>%</span></div>
                                </div>
                                <hr>
                            </div>
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
                                    <h2>Performance Classes</h2>
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
                                        <?= $this->Html->link(($mtnote->ulcosalle->libele), ['action' => 'pdetailclasse',$mtnote->ulcosalle->id]) ?>
                                    </p>
                                        
                                        
                                        
                                        
                                    </div>
                                    <div class="<?= $colorbar ?> progress-bar wow fadeInLeft" data-progress="<?= $percentagemarks ?>%" style="width: <?= $percentagemarks ?>%;" data-wow-duration="1s" data-wow-delay="1s"><span><?= number_format($percentagemarks,2) ?>%</span></div>
                                </div>
                               <?php endforeach; ?>
                            </div>
							<div class="email-round-pro">
                                   
                                        <h4><?= $this->Html->link(ucwords($nomprof.' '.$prenomprof), ['action' => ''], ['title'=>'Voir Détails','data-toggle'=>'modal','data-target'=>'#myModaltwo']) ?></h4>
                                    <div class="email-ctn-nock">
                                        <p>Prof Principal</p>
                                    </div>
                                   
                                </div>
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
                                                <h2><?= ucwords($nomprof.' '.$prenomprof)?></h2><hr>
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
