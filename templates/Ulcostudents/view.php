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
            <?= $this->Html->link(__('Edit Ulcostudent'), ['action' => 'edit', $ulcostudent->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ulcostudent'), ['action' => 'delete', $ulcostudent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ulcostudent->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ulcostudents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ulcostudent'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ulcostudents view content">
            <h3><?= h($ulcostudent->Matricul) ?></h3>
            <table>
                <tr>
                    <th><?= __('Matricul') ?></th>
                    <td><?= h($ulcostudent->Matricul) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nom') ?></th>
                    <td><?= h($ulcostudent->Nom) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prenom') ?></th>
                    <td><?= h($ulcostudent->Prenom) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dob') ?></th>
                    <td><?= h($ulcostudent->Dob) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pob') ?></th>
                    <td><?= h($ulcostudent->Pob) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tel') ?></th>
                    <td><?= h($ulcostudent->Tel) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($ulcostudent->Type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($ulcostudent->Createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ulcostudent->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idschool') ?></th>
                    <td><?= $this->Number->format($ulcostudent->idschool) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idsalle') ?></th>
                    <td><?= $this->Number->format($ulcostudent->ulcosalle_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idparent') ?></th>
                    <td><?= $this->Number->format($ulcostudent->ulcoparent_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creationdate') ?></th>
                    <td><?= h($ulcostudent->Creationdate) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>