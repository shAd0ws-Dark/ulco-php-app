<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ulcoparent $ulcoparent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ulcoparent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ulcoparent->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ulcoparents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ulcoparents form content">
            <?= $this->Form->create($ulcoparent) ?>
            <fieldset>
                <legend><?= __('Edit Ulcoparent') ?></legend>
                <?php
                    echo $this->Form->control('idschool');
                    echo $this->Form->control('Nompere');
                    echo $this->Form->control('Prenompere');
                    echo $this->Form->control('Telpere');
                    echo $this->Form->control('Nommere');
                    echo $this->Form->control('Prenommere');
                    echo $this->Form->control('Telmere');
                    echo $this->Form->control('Tuteur');
                    echo $this->Form->control('Teltuteur');
                    echo $this->Form->control('Email');
                    echo $this->Form->control('Adpere');
                    echo $this->Form->control('Admere');
                    echo $this->Form->control('Adtuteur');
                    echo $this->Form->control('Createdby');
                    echo $this->Form->control('Creationdate');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
