<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateUsers extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('users');
        $table->addColumn('email', 'string', [
            'limit' => 255,
            'null' => false,
        ])
            ->addColumn('first_name', 'string', [
                'limit' => 127,
                'null' => false,
            ])
            ->addColumn('last_name', 'string', [
                'limit' => 127,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('nonce', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('nonce_expiry', 'datetime', [
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'null' => true,
            ])
            ->addPrimaryKey('id')
            ->addIndex(['email'], ['unique' => true])
            ->create();
    }
}
