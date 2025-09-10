<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ulcoparent> $ulcoparents
 */
?>
<div class="ulcoparents index content">
    <?= $this->Html->link(__('New Ulcoparent'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ulcoparents') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('idschool') ?></th>
                    <th><?= $this->Paginator->sort('Nompere') ?></th>
                    <th><?= $this->Paginator->sort('Prenompere') ?></th>
                    <th><?= $this->Paginator->sort('Telpere') ?></th>
                    <th><?= $this->Paginator->sort('Nommere') ?></th>
                    <th><?= $this->Paginator->sort('Prenommere') ?></th>
                    <th><?= $this->Paginator->sort('Telmere') ?></th>
                    <th><?= $this->Paginator->sort('Tuteur') ?></th>
                    <th><?= $this->Paginator->sort('Teltuteur') ?></th>
                    <th><?= $this->Paginator->sort('Email') ?></th>
                    <th><?= $this->Paginator->sort('Adpere') ?></th>
                    <th><?= $this->Paginator->sort('Admere') ?></th>
                    <th><?= $this->Paginator->sort('Adtuteur') ?></th>
                    <th><?= $this->Paginator->sort('Createdby') ?></th>
                    <th><?= $this->Paginator->sort('Creationdate') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ulcoparents as $ulcoparent): ?>
                <tr>
                    <td><?= $this->Number->format($ulcoparent->id) ?></td>
                    <td><?= $this->Number->format($ulcoparent->idschool) ?></td>
                    <td><?= h($ulcoparent->Nompere) ?></td>
                    <td><?= h($ulcoparent->Prenompere) ?></td>
                    <td><?= h($ulcoparent->Telpere) ?></td>
                    <td><?= h($ulcoparent->Nommere) ?></td>
                    <td><?= h($ulcoparent->Prenommere) ?></td>
                    <td><?= h($ulcoparent->Telmere) ?></td>
                    <td><?= h($ulcoparent->Tuteur) ?></td>
                    <td><?= h($ulcoparent->Teltuteur) ?></td>
                    <td><?= h($ulcoparent->Email) ?></td>
                    <td><?= h($ulcoparent->Adpere) ?></td>
                    <td><?= h($ulcoparent->Admere) ?></td>
                    <td><?= h($ulcoparent->Adtuteur) ?></td>
                    <td><?= h($ulcoparent->Createdby) ?></td>
                    <td><?= h($ulcoparent->Creationdate) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ulcoparent->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ulcoparent->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $ulcoparent->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $ulcoparent->id),
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