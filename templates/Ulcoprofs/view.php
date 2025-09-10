<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ulcoprof $ulcoprof
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ulcoprof'), ['action' => 'edit', $ulcoprof->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ulcoprof'), ['action' => 'delete', $ulcoprof->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ulcoprof->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ulcoprofs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ulcoprof'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ulcoprofs view content">
            <h3><?= h($ulcoprof->Nom) ?></h3>
            <table>
                <tr>
                    <th><?= __('Matricul') ?></th>
                    <td><?= h($ulcoprof->Matricul) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nom') ?></th>
                    <td><?= h($ulcoprof->Nom) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prenom') ?></th>
                    <td><?= h($ulcoprof->Prenom) ?></td>
                </tr>
                <tr>
                    <th><?= __('Genre') ?></th>
                    <td><?= h($ulcoprof->genre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tel') ?></th>
                    <td><?= h($ulcoprof->Tel) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($ulcoprof->Email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ville') ?></th>
                    <td><?= h($ulcoprof->Ville) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($ulcoprof->Status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Statuspro') ?></th>
                    <td><?= h($ulcoprof->Statuspro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dateprisefonc') ?></th>
                    <td><?= h($ulcoprof->Dateprisefonc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dob') ?></th>
                    <td><?= h($ulcoprof->Dob) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pob') ?></th>
                    <td><?= h($ulcoprof->Pob) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($ulcoprof->Createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ulcoprof->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdate') ?></th>
                    <td><?= h($ulcoprof->Createdate) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>