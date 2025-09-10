<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ulcoparent $ulcoparent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ulcoparent'), ['action' => 'edit', $ulcoparent->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ulcoparent'), ['action' => 'delete', $ulcoparent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ulcoparent->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ulcoparents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ulcoparent'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ulcoparents view content">
            <h3><?= h($ulcoparent->Nompere) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nompere') ?></th>
                    <td><?= h($ulcoparent->Nompere) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prenompere') ?></th>
                    <td><?= h($ulcoparent->Prenompere) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telpere') ?></th>
                    <td><?= h($ulcoparent->Telpere) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nommere') ?></th>
                    <td><?= h($ulcoparent->Nommere) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prenommere') ?></th>
                    <td><?= h($ulcoparent->Prenommere) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telmere') ?></th>
                    <td><?= h($ulcoparent->Telmere) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tuteur') ?></th>
                    <td><?= h($ulcoparent->Tuteur) ?></td>
                </tr>
                <tr>
                    <th><?= __('Teltuteur') ?></th>
                    <td><?= h($ulcoparent->Teltuteur) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($ulcoparent->Email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adpere') ?></th>
                    <td><?= h($ulcoparent->Adpere) ?></td>
                </tr>
                <tr>
                    <th><?= __('Admere') ?></th>
                    <td><?= h($ulcoparent->Admere) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adtuteur') ?></th>
                    <td><?= h($ulcoparent->Adtuteur) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($ulcoparent->Createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ulcoparent->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idschool') ?></th>
                    <td><?= $this->Number->format($ulcoparent->idschool) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creationdate') ?></th>
                    <td><?= h($ulcoparent->Creationdate) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>