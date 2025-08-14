<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contactform> $contactform
 */
?>
<div class="contactform index content">
    <?= $this->Html->link(__('New Contactform'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Contactform') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactform as $contactform): ?>
                <tr>
                    <td><?= h($contactform->id) ?></td>
                    <td><?= h($contactform->first_name) ?></td>
                    <td><?= h($contactform->last_name) ?></td>
                    <td><?= h($contactform->email) ?></td>
                    <td><?= h($contactform->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contactform->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contactform->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $contactform->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $contactform->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>