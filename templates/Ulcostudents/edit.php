<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ulcostudent $ulcostudent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ulcostudent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ulcostudent->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ulcostudents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ulcostudents form content">
            <?= $this->Form->create($ulcostudent) ?>
            <fieldset>
                <legend><?= __('Edit Ulcostudent') ?></legend>
                <?php
                    echo $this->Form->control('idschool');
                    echo $this->Form->control('ulcosalle_id');
                    echo $this->Form->control('idparent');
                    echo $this->Form->control('Matricul');
                    echo $this->Form->control('Nom');
                    echo $this->Form->control('Prenom');
                    echo $this->Form->control('Dob');
                    echo $this->Form->control('Pob');
                    echo $this->Form->control('Tel');
                    echo $this->Form->control('Type');
                    echo $this->Form->control('Createdby');
                    echo $this->Form->control('Creationdate');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
