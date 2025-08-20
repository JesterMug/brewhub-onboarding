<?php
$this->setLayout('user_login');
?>
<div class="user-login-form">
    <h1>User Login</h1>
    <?= $this->Form->create() ?>
    <?= $this->Form->control('email') ?>
    <?= $this->Form->control('password', ['type' => 'password']) ?>
    <?= $this->Form->button('Login as User') ?>
    <?= $this->Form->end() ?>
</div>
