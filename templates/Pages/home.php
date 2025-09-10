<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();
$user = $this->request->getAttribute('identity');
$username=$user->Prenom;
$usertel=$user->tel;
$etabli=$user->Etname;
$type=$user->Utype;
$con='';

if($type==1){
    
    $con='APE';
}
elseif($type==2){
    
    $con='PROFESSEUR';
}
elseif($type==3){
    
    $con='PARENT';
}
elseif($type==4){
    
    $con='DIRECTION';
}
?>
<!DOCTYPE html>
<html>
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
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min','font-awesome.min','owl.carousel','owl.theme','owl.transitions','animate','normalize','scrollbar/jquery.mCustomScrollbar.min','wave/waves.min','notika-custom-icon','main','style','responsive']) ?>
    
    <?= $this->Html->script(['vendor/modernizr-2.8.3.min','','','','','','','']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="error-page-area">
        <div class="error-page-wrap">
            <i class="notika-icon notika-support"></i>
            <h2>CONNEXION... <span class="counter"><?= $con ?></span></h2>
            <h3><i class="notika-icon notika-house"> <strong ><?= $etabli ?></strong></i></h3>
            <p>Bienvenue <strong><?= $username ?></strong></p>
            
            <?php if($type==1){?>
            <?= $this->Html->link(__('Dashboard'), ['controller'=>'Users','action' => 'index'], ['class' => 'btn btn-primary']) ?>
            
            <?php }
            
    elseif($type==2){
            ?>
            
            <?= $this->Html->link(__('Dashboard'), ['controller'=>'Users','action' => 'prof'], ['class' => 'btn btn-primary']) ?>
            
            <?php }
            
    elseif($type==3){
            ?>
            
            <?= $this->Html->link(__('Dashboard'), ['controller'=>'Users','action' => 'paren'], ['class' => 'btn btn-primary']) ?>
            
            <?php }
            
    elseif($type==4){
            ?>
            
            <?= $this->Html->link(__('Dashboard'), ['controller'=>'Users','action' => 'direction'], ['class' => 'btn btn-primary']); }
            
            ?>
            
            
            
        </div>
    </div>
</body>
</html>
