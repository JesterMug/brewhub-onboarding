<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Form $form
 */
?>
<div class="row">
    <div class="column">
        <div class="forms view content">
            <h3>Enquiry from <?= h($form->first_name), ' ', h($form->last_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= $this->Html->link(h($form->email), 'mailto:' . $form->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Created') ?></th>
                    <td><?= h($form->date_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Responded') ?></th>
                    <td>
                        <?php if ($form->replied_to) : ?>
                            <?= $this->Form->create($form, ['url' => ['action' => 'mark', $form->id]]) ?>
                            <?= $this->Form->control('replied_to', [
                                'type' => 'checkbox',
                                'label' => 'Mark as replied',
                                'checked' => true,
                                'onchange' => 'this.form.submit();',
                            ]) ?>
                            <?= $this->Form->end() ?>
                        <?php else : ?>
                            <?= $this->Form->create($form, ['url' => ['action' => 'mark', $form->id]]) ?>
                            <?= $this->Form->control('replied_to', [
                                'type' => 'checkbox',
                                'label' => 'Mark as replied',
                                'checked' => false,
                                'onchange' => 'this.form.submit();',
                            ]) ?>
                            <?= $this->Form->end() ?>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Message') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($form->message)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
