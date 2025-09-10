<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ulcoenseigne> $ulcoenseignes
 */
?>
<div class="ulcoenseignes index content">
    <?= $this->Html->link(__('New Ulcoenseigne'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ulcoenseignes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('idschool') ?></th>
                    <th><?= $this->Paginator->sort('ulcosalle_id') ?></th>
                    <th><?= $this->Paginator->sort('idmatiere') ?></th>
                    <th><?= $this->Paginator->sort('ulcoprof_id') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th><?= $this->Paginator->sort('Creationdate') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ulcoenseignes as $ulcoenseigne): ?>
                <tr>
                    <td><?= $this->Number->format($ulcoenseigne->id) ?></td>
                    <td><?= $this->Number->format($ulcoenseigne->idschool) ?></td>
                    <td><?= $this->Number->format($ulcoenseigne->ulcosalle_id) ?></td>
                    <td><?= $this->Number->format($ulcoenseigne->idmatiere) ?></td>
                    <td><?= $this->Number->format($ulcoenseigne->idprof) ?></td>
                    <td><?= $this->Number->format($ulcoenseigne->createdby) ?></td>
                    <td><?= h($ulcoenseigne->Creationdate) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ulcoenseigne->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ulcoenseigne->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $ulcoenseigne->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $ulcoenseigne->id),
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