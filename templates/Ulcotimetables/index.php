<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ulcotimetable> $ulcotimetables
 */
?>
<div class="ulcotimetables index content">
    <?= $this->Html->link(__('New Ulcotimetable'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ulcotimetables') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('idschool') ?></th>
                    <th><?= $this->Paginator->sort('Horaire') ?></th>
                    <th><?= $this->Paginator->sort('Jour') ?></th>
                    <th><?= $this->Paginator->sort('ulcomatiere_id') ?></th>
                    <th><?= $this->Paginator->sort('ulcosalle_id') ?></th>
                    <th><?= $this->Paginator->sort('ulcoprof_id') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th><?= $this->Paginator->sort('ctreationdate') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ulcotimetables as $ulcotimetable): ?>
                <tr>
                    <td><?= $this->Number->format($ulcotimetable->id) ?></td>
                    <td><?= $this->Number->format($ulcotimetable->idschool) ?></td>
                    <td><?= h($ulcotimetable->Horaire) ?></td>
                    <td><?= h($ulcotimetable->Jour) ?></td>
                    <td><?= $ulcotimetable->hasValue('ulcomatiere') ? $this->Html->link($ulcotimetable->ulcomatiere->libele, ['controller' => 'Ulcomatieres', 'action' => 'view', $ulcotimetable->ulcomatiere->id]) : '' ?></td>
                    <td><?= $ulcotimetable->hasValue('ulcosalle') ? $this->Html->link($ulcotimetable->ulcosalle->libele, ['controller' => 'Ulcosalles', 'action' => 'view', $ulcotimetable->ulcosalle->id]) : '' ?></td>
                    <td><?= $ulcotimetable->hasValue('ulcoprof') ? $this->Html->link($ulcotimetable->ulcoprof->Nom, ['controller' => 'Ulcoprofs', 'action' => 'view', $ulcotimetable->ulcoprof->id]) : '' ?></td>
                    <td><?= $this->Number->format($ulcotimetable->createdby) ?></td>
                    <td><?= h($ulcotimetable->ctreationdate) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ulcotimetable->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ulcotimetable->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $ulcotimetable->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $ulcotimetable->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>