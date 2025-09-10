<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ulcosalle $ulcosalle
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ulcosalle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ulcosalle->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ulcosalles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ulcosalles form content">
            <?= $this->Form->create($ulcosalle) ?>
            <fieldset>
                <legend><?= __('Edit Ulcosalle') ?></legend>
                <?php
                    echo $this->Form->control('idschool');
                    echo $this->Form->control('libele');
                    echo $this->Form->control('createdby');
                    echo $this->Form->control('creationdate');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
