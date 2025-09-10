<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ulcotimetable $ulcotimetable
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ulcotimetable'), ['action' => 'edit', $ulcotimetable->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ulcotimetable'), ['action' => 'delete', $ulcotimetable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ulcotimetable->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ulcotimetables'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ulcotimetable'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ulcotimetables view content">
            <h3><?= h($ulcotimetable->Horaire) ?></h3>
            <table>
                <tr>
                    <th><?= __('Horaire') ?></th>
                    <td><?= h($ulcotimetable->Horaire) ?></td>
                </tr>
                <tr>
                    <th><?= __('Jour') ?></th>
                    <td><?= h($ulcotimetable->Jour) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ulcomatiere') ?></th>
                    <td><?= $ulcotimetable->hasValue('ulcomatiere') ? $this->Html->link($ulcotimetable->ulcomatiere->libele, ['controller' => 'Ulcomatieres', 'action' => 'view', $ulcotimetable->ulcomatiere->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Ulcosalle') ?></th>
                    <td><?= $ulcotimetable->hasValue('ulcosalle') ? $this->Html->link($ulcotimetable->ulcosalle->libele, ['controller' => 'Ulcosalles', 'action' => 'view', $ulcotimetable->ulcosalle->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Ulcoprof') ?></th>
                    <td><?= $ulcotimetable->hasValue('ulcoprof') ? $this->Html->link($ulcotimetable->ulcoprof->Nom, ['controller' => 'Ulcoprofs', 'action' => 'view', $ulcotimetable->ulcoprof->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ulcotimetable->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idschool') ?></th>
                    <td><?= $this->Number->format($ulcotimetable->idschool) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= $this->Number->format($ulcotimetable->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ctreationdate') ?></th>
                    <td><?= h($ulcotimetable->ctreationdate) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>