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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contactform->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contactform->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Contactform'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contactform form content">
            <?= $this->Form->create($contactform) ?>
            <fieldset>
                <legend><?= __('Edit Contactform') ?></legend>
                <?php
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('message');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
