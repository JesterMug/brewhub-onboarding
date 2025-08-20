<?php
$this->setLayout('admin_login');
?>
<div class="admin-login-form">
    <h1>Admin Login</h1>
    <?= $this->Form->create() ?>
    <?= $this->Form->control('email') ?>
    <?= $this->Form->control('password', ['type' => 'password']) ?>
    <?= $this->Form->button('Login as Admin') ?>
    <?= $this->Form->end() ?>
</div>
