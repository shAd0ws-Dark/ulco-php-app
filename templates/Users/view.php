<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->Nom) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nom') ?></th>
                    <td><?= h($user->Nom) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prenom') ?></th>
                    <td><?= h($user->Prenom) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ucode') ?></th>
                    <td><?= h($user->Ucode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tel') ?></th>
                    <td><?= h($user->Tel) ?></td>
                </tr>
                <tr>
                    <th><?= __('Etname') ?></th>
                    <td><?= h($user->Etname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Etcity') ?></th>
                    <td><?= h($user->Etcity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($user->Createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Utype') ?></th>
                    <td><?= $this->Number->format($user->Utype) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdate') ?></th>
                    <td><?= h($user->Createdate) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>