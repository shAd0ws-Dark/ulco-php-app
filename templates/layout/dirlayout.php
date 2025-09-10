<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'ULCO';

$user = $this->request->getAttribute('identity');
$username=$user->Prenom;
$usertel=$user->tel;
$etabli=$user->Etname;
$type=$user->Utype;

  $classes='';
    $home='';
    $prof='';
    $sms='';
    $parent='';
if($classe=='classe'){
  
    $classes='active';
    $home='';
    $prof='';
    $sms='';
    $parent='';
}
elseif($classe=='home'){
    
 $classes='';
    $home='active';
    $prof='';   
    $sms='';   
    $parent='';   
}

elseif($classe=='prof'){
    
 $classes='';
    $home='';
    $sms='';
    $parent='';
    $prof='active';   
}
elseif($classe=='sms'){
    
 $classes='';
    $home='';
    $prof='';   
    $parent='';   
    $sms='active';   
}
elseif($classe=='parent'){
    
 $classes='';
    $home='';
    $prof='';   
    $parent='active';   
    $sms='';   
}

 foreach ($pgs as $pg): 
        
            $maxnote=($pg->totalseq*20);
            $percentagemarks=($pg->totalmarks*100)/$maxnote;
            
                          endforeach; 
?>
<!DOCTYPE html>
<html>
    <style></style>
<head>
   
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
 

    
    <?= $this->Html->charset() ?>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        ULCO
        <?php /*?><?= $this->fetch('title') ?><?php */?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min','font-awesome.min','owl.carousel','owl.theme','owl.transitions','meanmenu/meanmenu.min','animate','normalize','scrollbar/jquery.mCustomScrollbar.min','jvectormap/jquery-jvectormap-2.0.3','wave/waves.min','wave/button','dialog/sweetalert2.min','dialog/dialog','notika-custom-icon','bootstrap-select/bootstrap-select','jquery.dataTables.min','main','style','responsive','chosen/chosen']) ?>
    
    <?= $this->Html->script(['vendor/modernizr-2.8.3.min','','','','','','','']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
   <div class="header-top-areadir">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><?= $this->Html->image('ulcologo.png', ['alt' => 'WGC', 'width'=>'70']); ?></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="">
                                <a style="padding-top: 22px; padding-right: 28px; font-size: 16px" href="#"  class=""><span><?= $etabli ?></span></a>
                               
                            </li>
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-support" style="padding-right: 28px;font-size: 16px"> <?= $username ?>/ Direction</i></span></a>
                                <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">

                                    <div class="hd-message-info">
                                      
                                         <?= $this->Html->link(__('<div class="hd-message-sn">
                                                <div class="hd-mg-ctn">
                                                    <h3>Logout</h3>
                                                    <p>Déconnection</p>
                                                </div>
                                            </div>'), ['controller'=>'Users','action' => 'logout'], ['escapeTitle' =>false]) ?>
                                        
                                        <?= $this->Html->link(__('<div class="hd-message-sn">
                                                <div class="hd-mg-ctn">
                                                    <h3>Password</h3>
                                                    <p>Changer le mot de passe</p>
                                                </div>
                                            </div>'), ['controller'=>'Users','action' => ''], ['escapeTitle' =>false]) ?>
                                        
                                      
                                    </div>
                                   
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><?= $this->Html->link(__('Acceuil'), ['controller'=>'Users','action' => 'direction']) ?>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Classes</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><?= $this->Html->link(__('Liste Classes'), ['controller'=>'Ulcosalles','action' => 'classedir']) ?></li>
                                        <li><?= $this->Html->link(__('Liste Elèves'), ['controller'=>'Ulcosalles','action' => 'classestudentdir']) ?></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="#">Professeurs</a>
                                    <ul id="democrou" class="collapse dropdown-header-top">
                                         <li><?= $this->Html->link(__('Liste Professeurs'), ['controller'=>'Ulcosalles','action' => 'classeprof']) ?>
                                </li>
                                        <li><?= $this->Html->link(__('Ajout Professeurs'), ['controller'=>'Ulcosalles','action' => 'classeprof']) ?>
                                </li>
                                        <li><?= $this->Html->link(__('Affectations Professeurs'), ['controller'=>'Ulcoprofs','action' => 'proflistaffectdir']) ?>
                                </li>
                                        </li>
                                        <li><?= $this->Html->link(__('Gestion des notes'), ['controller'=>'Ulcoprofs','action' => 'proflistaffectdir']) ?>
                                </li>
                                
                                
                            
                                        
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="<?= $home ?>"><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li class="<?= $parent ?>"><a data-toggle="tab" href="#parent"><i class="notika-icon notika-support"></i>Parents</a>
                        </li>
                        <li class="<?= $classes ?>"><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-file"></i>Classes</a>
                        </li>
                        <li class="<?= $prof ?>"><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-edit"></i>Professeurs</a>
                        </li>
                        
                        <li class="<?= $sms ?>"><a data-toggle="tab" href="#Sms"><i class="notika-icon notika-mail"></i>SMS</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane in <?= $home ?> notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><?= $this->Html->link(__('Acceuil'), ['controller'=>'Users','action' => 'direction']) ?>
                                </li>
                                </li>
                            </ul>
                        </div>
                    <div id="parent" class="tab-pane notika-tab-menu-bg animated flipInX <?= $parent ?>">
                            <ul class="notika-main-menu-dropdown">
                             
                                <li><?= $this->Html->link(__('Liste Parents'), ['controller'=>'Ulcosalles','action' => 'classeparentdir']) ?>
                                </li>
                                
                                <li><?= $this->Html->link(__('Ajout Parents'), ['controller'=>'Ulcoparents','action' => 'parentadd']) ?>
                                </li>
                            </ul>
                        </div>
                        <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX <?= $classes ?>">
                            <ul class="notika-main-menu-dropdown">
                                <li>
                                <?= $this->Html->link(__('Liste Classes'), ['controller'=>'Ulcosalles','action' => 'classedir']) ?>
                                </li>
                                <li><?= $this->Html->link(__('Liste Elèves'), ['controller'=>'Ulcosalles','action' => 'classestudentdir']) ?>
                                </li>
                                
                                <li><?= $this->Html->link(__('Ajout Elèves'), ['controller'=>'Ulcostudents','action' => 'studentadd']) ?>
                                </li>
                                
                                <li><?= $this->Html->link(__('Générer les bulletins'), ['controller'=>'Ulcosalles','action' => 'classebul']) ?>
                                </li>
                            </ul>
                        </div>
                        <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX <?= $prof ?>">
                            <ul class="notika-main-menu-dropdown">
                                <li><?= $this->Html->link(__('Liste Professeurs'), ['controller'=>'Ulcosalles','action' => 'classeprofdir']) ?>
                                </li>
                                </li>
                                        <li><?= $this->Html->link(__('Ajout Professeurs'), ['controller'=>'Ulcoprofs','action' => 'profadd']) ?>
                                </li>
                            
                            <li><?= $this->Html->link(__('Affectations Professeurs'), ['controller'=>'Ulcoprofs','action' => 'proflistaffectdir']) ?>
                                </li>
                            <li><?= $this->Html->link(__('Editer les notes'), ['controller'=>'Ulcosalles','action' => 'enoteclassestudentdir']) ?>
                                </li>
                            
                            <li><?= $this->Html->link(__('Gestion ET'), ['controller'=>'Ulcosalles','action' => 'ttclasseprofdir']) ?>
                                </li>
                               
                            </ul>
                        </div>
                <div id="Sms" class="tab-pane notika-tab-menu-bg animated flipInX <?= $sms ?>">
                            <ul class="notika-main-menu-dropdown">
                                <li><?= $this->Html->link(__('Gestion SMS'), ['controller'=>'#','action' => '#']) ?>
                                </li>
                                </li>
                               
                            </ul>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?= $ne ?></span></h2>
                            <p style="color:#318635">Elèves</p>
                        </div>
                        <div style=" width: 100%" align="right">
                        <svg   width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z" fill="#F5D427"/></svg>  
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?= $np ?></span></h2>
                            <p style="color:#318635">Enseigants</p>
                        </div>
                        <div style=" width: 100%" align="right"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M160 64c0-35.3 28.7-64 64-64L576 0c35.3 0 64 28.7 64 64l0 288c0 35.3-28.7 64-64 64l-239.2 0c-11.8-25.5-29.9-47.5-52.4-64l99.6 0 0-32c0-17.7 14.3-32 32-32l64 0c17.7 0 32 14.3 32 32l0 32 64 0 0-288L224 64l0 49.1C205.2 102.2 183.3 96 160 96l0-32zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352l53.3 0C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7L26.7 512C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z" fill="#F5D427"/></svg></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?= $ns ?></span></h2>
                            <p style="color:#318635">Classes</p>
                        </div>
                        <div style=" width: 100%" align="right">
                        <svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M337.8 5.4C327-1.8 313-1.8 302.2 5.4L166.3 96 48 96C21.5 96 0 117.5 0 144L0 464c0 26.5 21.5 48 48 48l208 0 0-96c0-35.3 28.7-64 64-64s64 28.7 64 64l0 96 208 0c26.5 0 48-21.5 48-48l0-320c0-26.5-21.5-48-48-48L473.7 96 337.8 5.4zM96 192l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM96 320l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM232 176a88 88 0 1 1 176 0 88 88 0 1 1 -176 0zm88-48c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-16 0 0-16c0-8.8-7.2-16-16-16z" fill="#F5D427"/></svg>  
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter" ><?= number_format($percentagemarks,2) ?></span>%</h2>
                            <p style="color:#318635">Performance</p>
                        </div>
                       <div style=" width: 100%" align="right">
                        <svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M160 80c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 352c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-352zM0 272c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 160c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48L0 272zM368 96l32 0c26.5 0 48 21.5 48 48l0 288c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-288c0-26.5 21.5-48 48-48z" fill="#F5D427"/></svg>  
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
        
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        
                
            </div>
        </div>
    </div>
    
  
    <footer>
    </footer>
    
    <?= $this->Html->script(['vendor/jquery-1.12.4.min','bootstrap.min','wow.min','jquery-price-slider','owl.carousel.min','jquery.scrollUp.min','meanmenu/jquery.meanmenu','counterup/jquery.counterup.min','counterup/waypoints.min','counterup/counterup-active','scrollbar/jquery.mCustomScrollbar.concat.min','jvectormap/jquery-jvectormap-2.0.2.min','jvectormap/jquery-jvectormap-world-mill-en','jvectormap/jvectormap-active','sparkline/jquery.sparkline.min.js','sparkline/sparkline-active.js','flot/jquery.flot','flot/jquery.flot.resize','flot/jquery.flot.pie','flot/jquery.flot.tooltip.min','','flot/jquery.flot.orderBars','flot/curvedLines','flot/flot-active','knob/jquery.knob','knob/jquery.appear','knob/knob-active','jasny-bootstrap.min','flot/flot-widget-anatic-active','wave/waves.min','wave/wave-active','chosen/chosen.jquery','dialog/sweetalert2.min','dialog/dialog-active','chat/moment.min','chat/jquery.chat','todo/jquery.todo','plugins','data-table/jquery.dataTables.min','data-table/data-table-act','main','bootstrap-select/bootstrap-select','jquery3-7']) ?>
  


    
    </body>

</html>
