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
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('Nom');
                    echo $this->Form->control('Prenom');
                    echo $this->Form->control('Utype');
                    echo $this->Form->control('Ucode');
                    echo $this->Form->control('tel');
                    echo $this->Form->control('Etname');
                    echo $this->Form->control('password');
                    echo $this->Form->control('Etcity');
                    echo $this->Form->control('Createdby');
                    echo $this->Form->control('Createdate');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
