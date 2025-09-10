<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ulcostudent> $ulcostudents
 */
?>

<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    <br>
    
                    
                    <div class="btn-demo-notika mg-t-30">
						<div class="notika-btn-hd">
							<h2>Listing 22</h2>

                    </div>
                
                </div>
<?php /*?><div class="ulcostudents index content">
    <?= $this->Html->link(__('New Ulcostudent'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ulcostudents') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('idschool') ?></th>
                    <th><?= $this->Paginator->sort('ulcosalle_id') ?></th>
                    <th><?= $this->Paginator->sort('idparent') ?></th>
                    <th><?= $this->Paginator->sort('Matricul') ?></th>
                    <th><?= $this->Paginator->sort('Nom') ?></th>
                    <th><?= $this->Paginator->sort('Prenom') ?></th>
                    <th><?= $this->Paginator->sort('Dob') ?></th>
                    <th><?= $this->Paginator->sort('Pob') ?></th>
                    <th><?= $this->Paginator->sort('Tel') ?></th>
                    <th><?= $this->Paginator->sort('Type') ?></th>
                    <th><?= $this->Paginator->sort('Createdby') ?></th>
                    <th><?= $this->Paginator->sort('Creationdate') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ulcostudents as $ulcostudent): ?>
                <tr>
                    <td><?= $this->Number->format($ulcostudent->id) ?></td>
                    <td><?= $this->Number->format($ulcostudent->idschool) ?></td>
                    <td><?= $this->Number->format($ulcostudent->ulcosalle_id) ?></td>
                    <td><?= $this->Number->format($ulcostudent->ulcoparent_id) ?></td>
                    <td><?= h($ulcostudent->Matricul) ?></td>
                    <td><?= h($ulcostudent->Nom) ?></td>
                    <td><?= h($ulcostudent->Prenom) ?></td>
                    <td><?= h($ulcostudent->Dob) ?></td>
                    <td><?= h($ulcostudent->Pob) ?></td>
                    <td><?= h($ulcostudent->Tel) ?></td>
                    <td><?= h($ulcostudent->Type) ?></td>
                    <td><?= h($ulcostudent->Createdby) ?></td>
                    <td><?= h($ulcostudent->Creationdate) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ulcostudent->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ulcostudent->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $ulcostudent->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $ulcostudent->id),
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
</div><?php */?>