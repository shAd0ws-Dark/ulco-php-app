<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ulcoenseigne $ulcoenseigne
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ulcoenseignes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ulcoenseignes form content">
            <?= $this->Form->create($ulcoenseigne) ?>
            <fieldset>
                <legend><?= __('Add Ulcoenseigne') ?></legend>
                <?php
                    echo $this->Form->control('idschool');
                    echo $this->Form->control('ulcosalle_id');
                    echo $this->Form->control('idmatiere');
                    echo $this->Form->control('ulcoprof_id');
                    echo $this->Form->control('createdby');
                    echo $this->Form->control('Creationdate');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
