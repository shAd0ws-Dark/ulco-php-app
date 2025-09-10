<html>
<head>
<title>PDF</title>
<style>
@page {
    margin: 10px 10px 0px 0px !important;
    padding: 0px 0px 0px 0px !important;
	font-family: "Century Gothic";
	font-size:14px;
	color:#666;
}

#watermark {

  position: relative;
  overflow: hidden;
}
#watermark img {
  max-width: 100%;
}
#watermark p {
  margin: auto;
  position: absolute;
  top: 0;
  left: 0;
  color:#F2F2EB;
  font-size: 32px;
  pointer-events: none;
  -webkit-transform: rotate(2deg);
  -moz-transform: rotate(2deg);
    z-index: -10;
}
    
#watermarkh {

  position: relative;
  overflow: hidden;
}


</style>
</head>
    <?php
    foreach ($totalnotes as $totalnote): 
        $totalmax=$totalnote->total;
        endforeach; 
    if($notemax==0){
     $moyenne1='';
    $ap1='';
}
    else{
$moyenne1=($totalmax*20)/$notemax;
    
    if($moyenne1<=5){
          $ap1='TRES FAIBLE';
      }
      elseif($moyenne1>=5 and $moyenne1<=9){
           $ap1='FAIBLE';
      }
      elseif($moyenne1>=10 and $moyenne1<=11){
           $ap1='PASSABLE';
      }
      
      elseif($moyenne1>=11 and $moyenne1<=13){
          $ap1='ASSEZ-BIEN';
      }
      elseif($moyenne1>=13 and $moyenne1<=15){
           $ap1='BIEN';
      }
      elseif($moyenne1>15){
           $ap1='TRES BIEN';
      }
        
        }
    //T2
    
    foreach ($totalnotes2 as $totalnote2): 
        $totalmax2=$totalnote2->total;
        endforeach; 
    if($notemax2==0){
     $moyenne2='';
    $ap2='';
}
    else{
$moyenne2=($totalmax2*20)/$notemax2;
    
    
    if($moyenne2<=5){
          $ap2='TRES FAIBLE';
      }
      elseif($moyenne2>=5 and $moyenne2<=9){
           $ap2='FAIBLE';
      }
      elseif($moyenne2>=10 and $moyenne2<=11){
           $ap2='PASSABLE';
      }
      
      elseif($moyenne2>=11 and $moyenne2<=13){
          $ap2='ASSEZ-BIEN';
      }
      elseif($moyenne2>=13 and $moyenne2<=15){
           $ap2='BIEN';
      }
      elseif($moyenne2>15){
           $ap2='TRES BIEN';
      }
        }
     
    //T3
    
    foreach ($totalnotes3 as $totalnote3): 
        $totalmax3=$totalnote3->total;
        endforeach; 
    if($notemax3==0){
    $moyenne3='';
    $ap3='';
 
}
    else{
$moyenne3=($totalmax3*20)/$notemax3;
    
    
    if($moyenne3<=5){
          $ap3='TRES FAIBLE';
      }
      elseif($moyenne3>=5 and $moyenne3<=9){
           $ap3='FAIBLE';
      }
      elseif($moyenne2>=10 and $moyenne3<=11){
           $ap3='PASSABLE';
      }
      
      elseif($moyenne3>=11 and $moyenne3<=13){
          $ap3='ASSEZ-BIEN';
      }
      elseif($moyenne3>=13 and $moyenne3<=15){
           $ap3='BIEN';
      }
      elseif($moyenne3>15){
           $ap3='TRES BIEN';
      }
        }
    
    //general
    
    foreach ($totalnotesg as $totalnoteg): 
        $totalmaxg=$totalnoteg->total;
        endforeach; 
    if($notemaxg==0){
     $moyenneg='';
    $apg='';
}
    else{
$moyenneg=($totalmaxg*20)/$notemaxg;
    
    if($moyenneg<=5){
          $apg='TRES FAIBLE';
      }
      elseif($moyenneg>=5 and $moyenneg<=9){
           $apg='FAIBLE';
      }
      elseif($moyenneg>=10 and $moyenneg<=11){
           $apg='PASSABLE';
      }
      
      elseif($moyenneg>=11 and $moyenneg<=13){
          $apg='ASSEZ-BIEN';
      }
      elseif($moyenneg>=13 and $moyenneg<=15){
           $apg='BIEN';
      }
      elseif($moyenneg>15){
           $apg='TRES BIEN';
      }
        
        }
    ?>
<body>


<table  border="0" style="width:100%">
    
    <tr>
    
    <td style="width:45%;text-align:center; font-size:11px"><hr style="background-color:#F8E49C; color:#F0F2CF; height: 3px; border: none"></td>
    
    <td align="center" style="width: auto"><?php echo $this->Html->image('ulcologo.png',['fullBase' => true,'class'=>'imgprint', 'alt' => 'DGSN', 'width'=>'80','isRemoteEnabled'=>true]); ?></td>
    
    <td  style="width:45%; text-align:center; font-size:11px"><hr style="background-color:#F8E49C; color:#F0F2CF; height: 3px; border: none"></td>
    </tr>

    </table>
    <table  border="0" style="width:100%; height:">

    
    <tr>
        <td align="center">
    <span style="font-size:20px;"><b><?= strtoupper($school) ?></b></span>
        <br>
        <span style="font-size:16px;"><b>BULLETIN DES NOTES</b></span>
        <br>
        <span style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?= strtoupper($ulcostudent->Nom) ?> / <?= strtoupper($ulcostudent->Matricul) ?></b></span>
               
        </td>
        
    </tr>
    </table>
    <br>
    <div id="watermark">
        <p> ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO  ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO ULCO</p>
    <table cellspacing="0" style="width:88%; margin-left:50px; margin-top:-5px;border: solid 0.5px #CCCCCC; text-align:left; font-size:10px; font-family: Arial, Helvetica, sans-serif">
  <tr>
  <td colspan="4" bgcolor="#E9E9E9" style="font-size:10px">--</td>
  </tr>
   <tr>
  <td style="color:#666; font-weight:bold; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">Date de naissance</td>
  <td   style="border-bottom: solid 0.5px #CCCCCC; border-right: solid 0.5px #CCCCCC;"><?= strtoupper($ulcostudent->Dob) ?> </td>
  <td   style="color:#666; font-weight:bold; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">Lieu</td>
  <td   style="border-bottom: solid 0.5px #CCCCCC"><?= strtoupper($ulcostudent->Pob) ?></td>
  </tr>
  
  <tr>
  <td style="color:#666; font-weight:bold; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">Classe</td>
  <td style="border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"><?= $nomsalle ?></td>
  <td style="color:#666; font-weight:bold; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">Année académique</td>
  <td style="border-bottom: solid 0px #CCCCCC">2025 </td>
  </tr>
  </table>
    
    <br>
    
    <table cellspacing="0" style="width:88%; margin-left:50px; margin-top:-5px;border: solid 0.5px #CCCCCC; text-align:left; font-size:10px; font-family: Arial, Helvetica, sans-serif">
  <tr>
  <td colspan="5" bgcolor="#E9E9E9" style="font-size:10px" align="center"> <b>NOTES TRIMESTRE #1</b></td>
  </tr>
   <tr>
  <td bgcolor="#F8E49C" style="color:#666; font-weight:bold; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">Matières</td>
  <td bgcolor="#F8E49C"   style="font-weight:bold; border-bottom: solid 0.5px #CCCCCC; border-right: solid 0.5px #CCCCCC;">Notes/20</td>
  <td bgcolor="#F8E49C"   style="color:#666; font-weight:bold; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">Appréciations</td>
  <td bgcolor="#F8E49C"  style="font-weight:bold; border-bottom: solid 0.5px #CCCCCC; border-right: solid 0.5px #CCCCCC;">Nom du professeur</td>
  <td bgcolor="#F8E49C"  style="font-weight:bold; border-bottom: solid 0.5px #CCCCCC">Signature du professeur</td>
  </tr>
  <?php 
                                
            foreach ($mtnotes as $mtnote):
        $maxnote=($mtnote->totalseq*20);
            $notes1=($mtnote->totalmarks*20)/$maxnote;
        ?>
  <tr>
  <td style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"><?= $mtnote->ulcomatiere->libele ?></td>
  <td style="border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"><?= $notes1  ?></td>
  <td style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">
      <?php   
      if($notes1<=5){
          echo 'TRES FAIBLE';
      }
      elseif($notes1>=5 and $notes1<=9){
          echo 'FAIBLE';
      }
      elseif($notes1>=10 and $notes1<=11){
          echo 'PASSABLE';
      }
      
      elseif($notes1>=11 and $notes1<=13){
          echo 'ASSEZ-BIEN';
      }
      elseif($notes1>=13 and $notes1<=15){
          echo 'BIEN';
      }
      elseif($notes1>15){
          echo 'TRES BIEN';
      }
      ?></td>
  <td style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"><?= $mtnote->ulcoprof->full_name ?></td>
  <td style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"></td>
  </tr>
     <?php endforeach; ?>
        <tr>
  <td bgcolor="#E9E9E9" style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"> <b>Moyenne T1</b></td>
  <td bgcolor="#E9E9E9" style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"> <b><?= $moyenne1 ?></b></td>
  <td bgcolor="#E9E9E9" style="font-size:10px"> <b><?= $ap1 ?></b></td>
  <td colspan="2" bgcolor="#E9E9E9" style="font-size:10px"> </td>
  </tr>

  </table>
        
        <br>
    
    <table cellspacing="0" style="width:88%; margin-left:50px; margin-top:-5px;border: solid 0.5px #CCCCCC; text-align:left; font-size:10px; font-family: Arial, Helvetica, sans-serif">
  <tr>
  <td colspan="5" bgcolor="#E9E9E9" style="font-size:10px" align="center"> <b>NOTES TRIMESTRE #2</b></td>
  </tr>
   <tr>
  <td bgcolor="#F8E49C" style="color:#666; font-weight:bold; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">Matières</td>
  <td bgcolor="#F8E49C"   style="font-weight:bold; border-bottom: solid 0.5px #CCCCCC; border-right: solid 0.5px #CCCCCC;">Notes/20</td>
  <td bgcolor="#F8E49C"   style="color:#666; font-weight:bold; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">Appréciations</td>
  <td bgcolor="#F8E49C"  style="font-weight:bold; border-bottom: solid 0.5px #CCCCCC; border-right: solid 0.5px #CCCCCC;">Nom du professeur</td>
  <td bgcolor="#F8E49C"  style="font-weight:bold; border-bottom: solid 0.5px #CCCCCC">Signature du professeur</td>
  </tr>
  <?php 
                                
            foreach ($mtnotess2 as $mtnotes2):
        $maxnote2=($mtnotes2->totalseq*20);
            $notes2=($mtnotes2->totalmarks*20)/$maxnote2;
        ?>
  <tr>
  <td style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"><?= $mtnotes2->ulcomatiere->libele ?></td>
  <td style="border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"><?= $notes2  ?></td>
  <td style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">
      <?php   
      if($notes2<=5){
          echo 'TRES FAIBLE';
      }
      elseif($notes2>=5 and $notes2<=9){
          echo 'FAIBLE';
      }
      elseif($notes2>=10 and $notes2<=11){
          echo 'PASSABLE';
      }
      
      elseif($notes2>=11 and $notes2<=13){
          echo 'ASSEZ-BIEN';
      }
      elseif($notes2>=13 and $notes2<=15){
          echo 'BIEN';
      }
      elseif($notes2>15){
          echo 'TRES BIEN';
      }
      ?></td>
  <td style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"><?= $mtnotes2->ulcoprof->full_name ?></td>
  <td style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"></td>
  </tr>
     <?php endforeach; ?>
        <tr>
  <td bgcolor="#E9E9E9" style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"> <b>Moyenne T2</b></td>
  <td bgcolor="#E9E9E9" style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"> <b><?= $moyenne2 ?></b></td>
  <td bgcolor="#E9E9E9" style="font-size:10px"> <b><?= $ap2 ?></b></td>
  <td colspan="2" bgcolor="#E9E9E9" style="font-size:10px"> </td>
  </tr>
  </table>
        
        <br>
    
    <table cellspacing="0" style="width:88%; margin-left:50px; margin-top:-5px;border: solid 0.5px #CCCCCC; text-align:left; font-size:10px; font-family: Arial, Helvetica, sans-serif">
  <tr>
  <td colspan="5" bgcolor="#E9E9E9" style="font-size:10px" align="center"> <b>NOTES TRIMESTRE #3</b></td>
  </tr>
   <tr>
  <td bgcolor="#F8E49C" style="color:#666; font-weight:bold; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">Matières</td>
  <td bgcolor="#F8E49C"   style="font-weight:bold; border-bottom: solid 0.5px #CCCCCC; border-right: solid 0.5px #CCCCCC;">Notes/20</td>
  <td bgcolor="#F8E49C"   style="color:#666; font-weight:bold; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">Appréciations</td>
  <td bgcolor="#F8E49C"  style="font-weight:bold; border-bottom: solid 0.5px #CCCCCC; border-right: solid 0.5px #CCCCCC;">Nom du professeur</td>
  <td bgcolor="#F8E49C"  style="font-weight:bold; border-bottom: solid 0.5px #CCCCCC">Signature du professeur</td>
  </tr>
  <?php 
                                
            foreach ($mtnotess3 as $mtnotes3):
        $maxnote3=($mtnotes3->totalseq*20);
            $notes3=($mtnotes3->totalmarks*20)/$maxnote3;
        ?>
  <tr>
  <td style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"><?= $mtnotes3->ulcomatiere->libele ?></td>
  <td style="border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"><?= $notes3  ?></td>
  <td style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">
      <?php   
      if($notes3<=5){
          echo 'TRES FAIBLE';
      }
      elseif($notes3>=5 and $notes3<=9){
          echo 'FAIBLE';
      }
      elseif($notes3>=10 and $notes3<=11){
          echo 'PASSABLE';
      }
      
      elseif($notes3>=11 and $notes3<=13){
          echo 'ASSEZ-BIEN';
      }
      elseif($notes3>=13 and $notes3<=15){
          echo 'BIEN';
      }
      elseif($notes3>15){
          echo 'TRES BIEN';
      }
      ?></td>
  <td style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"><?= $mtnotes3->ulcoprof->full_name ?></td>
  <td style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"></td>
  </tr>
     <?php endforeach; ?>
        <tr>
  <td bgcolor="#E9E9E9" style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"> <b>Moyenne T3</b></td>
  <td bgcolor="#E9E9E9" style="color:#666; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC"> <b><?= $moyenne3 ?></b></td>
  <td bgcolor="#E9E9E9" style="font-size:10px"> <b><?= $ap3 ?></b></td>
  <td colspan="2" bgcolor="#E9E9E9" style="font-size:10px"> </td>
  </tr>
  </table>
   <br>

        <table cellspacing="0" style="width:88%; margin-left:50px; margin-top:-5px;border: solid 0.5px #CCCCCC; text-align:left; font-size:10px; font-family: Arial, Helvetica, sans-serif">
  <tr>
  <td colspan="4" bgcolor="#E9E9E9" style="font-size:11px"> Résultat général</td>
  </tr>
   <tr>
  <td style="color:#666; font-weight:bold; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">Moyenne</td>
  <td   style="border-bottom: solid 0.5px #CCCCCC; border-right: solid 0.5px #CCCCCC;"><?= $moyenneg ?> </td>
  <td   style="color:#666; font-weight:bold; border-right: solid 0.5px #CCCCCC; border-bottom: solid 0.5px #CCCCCC">Apréciation</td>
  <td   style="border-bottom: solid 0.5px #CCCCCC"><?= $apg ?></td>
  </tr>
  
  
  </table>
     
        

         <p>
                <ul type="disc" style="font-size: 11px; font-style: italic">
                    <li>Ce bulletin a été généré par l'application ULCO</li>
                    <li>Ce bulletin est à titre informatif est est uniquement validé par la signature de l'administration</li>
                   
               
                </ul>
                </p>
    
    <br>
    <br>
    <div style="width: 70%" align="right"><em><strong>La Direction</strong></em></div>

         
 
 
</body>
</html>