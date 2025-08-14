<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contactform $contactform
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contactform'), ['action' => 'edit', $contactform->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contactform'), ['action' => 'delete', $contactform->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactform->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contactform'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contactform'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contactform view content">
            <h3><?= h($contactform->first_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($contactform->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($contactform->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($contactform->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($contactform->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($contactform->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Message') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($contactform->message)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>