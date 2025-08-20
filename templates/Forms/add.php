<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Form $form
 */
?>
<div class="row">
    <div class="column">
        <div class="forms form content">
            <?= $this->Form->create($form) ?>
            <fieldset>
                <legend><?= __('Your Contact Form') ?></legend>
                <?php
                echo $this->Form->control('first_name', ['label' => __('First Name')]);
                echo $this->Form->control('last_name', ['label' => __('Last Name')]);
                echo $this->Form->control('email', ['label' => __('Your Email')]);
                echo $this->Form->control('message', ['label' => __('Your Message')]);

                $question = $this->getRequest()->getSession()->read('captcha.question') ?? '...';
                echo $this->Form->control('captcha_answer', [
                    'label' => __('Captcha: ') . h($question),
                    'required' => true,
                    'autocomplete' => 'off',
                    'placeholder' => __('Enter your answer here')
                ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Send Form')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
