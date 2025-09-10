<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ulcoprof> $ulcoprofs
 */
?>
<div class="ulcoprofs index content">
    <?= $this->Html->link(__('New Ulcoprof'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ulcoprofs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Matricul') ?></th>
                    <th><?= $this->Paginator->sort('Nom') ?></th>
                    <th><?= $this->Paginator->sort('Prenom') ?></th>
                    <th><?= $this->Paginator->sort('genre') ?></th>
                    <th><?= $this->Paginator->sort('Tel') ?></th>
                    <th><?= $this->Paginator->sort('Email') ?></th>
                    <th><?= $this->Paginator->sort('Ville') ?></th>
                    <th><?= $this->Paginator->sort('Status') ?></th>
                    <th><?= $this->Paginator->sort('Statuspro') ?></th>
                    <th><?= $this->Paginator->sort('Dateprisefonc') ?></th>
                    <th><?= $this->Paginator->sort('Dob') ?></th>
                    <th><?= $this->Paginator->sort('Pob') ?></th>
                    <th><?= $this->Paginator->sort('Createdby') ?></th>
                    <th><?= $this->Paginator->sort('Createdate') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ulcoprofs as $ulcoprof): ?>
                <tr>
                    <td><?= $this->Number->format($ulcoprof->id) ?></td>
                    <td><?= h($ulcoprof->Matricul) ?></td>
                    <td><?= h($ulcoprof->Nom) ?></td>
                    <td><?= h($ulcoprof->Prenom) ?></td>
                    <td><?= h($ulcoprof->genre) ?></td>
                    <td><?= h($ulcoprof->Tel) ?></td>
                    <td><?= h($ulcoprof->Email) ?></td>
                    <td><?= h($ulcoprof->Ville) ?></td>
                    <td><?= h($ulcoprof->Status) ?></td>
                    <td><?= h($ulcoprof->Statuspro) ?></td>
                    <td><?= h($ulcoprof->Dateprisefonc) ?></td>
                    <td><?= h($ulcoprof->Dob) ?></td>
                    <td><?= h($ulcoprof->Pob) ?></td>
                    <td><?= h($ulcoprof->Createdby) ?></td>
                    <td><?= h($ulcoprof->Createdate) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ulcoprof->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ulcoprof->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $ulcoprof->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $ulcoprof->id),
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