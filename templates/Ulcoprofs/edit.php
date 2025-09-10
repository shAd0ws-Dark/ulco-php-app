<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ulcoprof $ulcoprof
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ulcoprof->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ulcoprof->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ulcoprofs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ulcoprofs form content">
            <?= $this->Form->create($ulcoprof) ?>
            <fieldset>
                <legend><?= __('Edit Ulcoprof') ?></legend>
                <?php
                    echo $this->Form->control('Matricul');
                    echo $this->Form->control('Nom');
                    echo $this->Form->control('Prenom');
                    echo $this->Form->control('genre');
                    echo $this->Form->control('Tel');
                    echo $this->Form->control('Email');
                    echo $this->Form->control('Ville');
                    echo $this->Form->control('Status');
                    echo $this->Form->control('Statuspro');
                    echo $this->Form->control('Dateprisefonc');
                    echo $this->Form->control('Dob');
                    echo $this->Form->control('Pob');
                    echo $this->Form->control('Createdby');
                    echo $this->Form->control('Createdate');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
