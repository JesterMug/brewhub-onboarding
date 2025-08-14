<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Form $form
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Forms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="forms form content">
            <?= $this->Form->create($form) ?>
            <fieldset>
                <legend><?= __('Add Form') ?></legend>
                <?php
                    echo $this->Form->control('fname');
                    echo $this->Form->control('lname');
                    echo $this->Form->control('email');
                    echo $this->Form->control('message');
                    echo $this->Form->control('date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
