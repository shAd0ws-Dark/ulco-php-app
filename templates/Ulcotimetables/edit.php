<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ulcotimetable $ulcotimetable
 * @var string[]|\Cake\Collection\CollectionInterface $ulcomatieres
 * @var string[]|\Cake\Collection\CollectionInterface $ulcosalles
 * @var string[]|\Cake\Collection\CollectionInterface $ulcoprofs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ulcotimetable->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ulcotimetable->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ulcotimetables'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ulcotimetables form content">
            <?= $this->Form->create($ulcotimetable) ?>
            <fieldset>
                <legend><?= __('Edit Ulcotimetable') ?></legend>
                <?php
                    echo $this->Form->control('idschool');
                    echo $this->Form->control('Horaire');
                    echo $this->Form->control('Jour');
                    echo $this->Form->control('ulcomatiere_id', ['options' => $ulcomatieres]);
                    echo $this->Form->control('ulcosalle_id', ['options' => $ulcosalles]);
                    echo $this->Form->control('ulcoprof_id', ['options' => $ulcoprofs]);
                    echo $this->Form->control('createdby');
                    echo $this->Form->control('ctreationdate');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
