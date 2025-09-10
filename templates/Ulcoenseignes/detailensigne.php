<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ulcoenseigne $ulcoenseigne
 */
?>


<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
    <br>
    
                    <div class="email-statis-inner notika-shadow">
                        <div class="email-ctn-round">
                            <div class="email-rdn-hd">
								<h2>Détails performances</h2>
							</div>
                            <div class="email-statis-wrap">
                                <div class="email-round-nock">
                                    <input type="text" class="knob" value="0" data-rel="55" data-linecap="round" data-width="130" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true">
                                </div>
                                <div class="email-ctn-nock">
                                    <p>Enseignants</p>
                                </div>
                            </div>
                            <div class="email-round-gp">
                                <div class="email-round-pro">
                                    <div class="email-signle-gp">
                                        <input type="text" class="knob" value="0" data-rel="75" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                    <div class="email-ctn-nock">
                                        <p>Elèves</p>
                                    </div>
                                </div>
                                <div class="email-round-pro">
                                    <div class="email-signle-gp">
                                        <input type="text" class="knob" value="0" data-rel="35" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                    <div class="email-ctn-nock">
                                        <p>Classes d'examen</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
<?php /*?><div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ulcoenseigne'), ['action' => 'edit', $ulcoenseigne->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ulcoenseigne'), ['action' => 'delete', $ulcoenseigne->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ulcoenseigne->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ulcoenseignes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ulcoenseigne'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ulcoenseignes view content">
            <h3><?= h($ulcoenseigne->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ulcoenseigne->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idschool') ?></th>
                    <td><?= $this->Number->format($ulcoenseigne->idschool) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idsalle') ?></th>
                    <td><?= $this->Number->format($ulcoenseigne->ulcosalle_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idmatiere') ?></th>
                    <td><?= $this->Number->format($ulcoenseigne->idmatiere) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idprof') ?></th>
                    <td><?= $this->Number->format($ulcoenseigne->idprof) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= $this->Number->format($ulcoenseigne->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creationdate') ?></th>
                    <td><?= h($ulcoenseigne->Creationdate) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div><?php */?>