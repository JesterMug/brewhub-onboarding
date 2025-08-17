<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateForms extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('forms', [
                              'id' => false,
                              'primary_key' => ['id'],
                              ]);
        
        $table->addColumn('id', 'char', [
                          'limit' => 36,
                          'null' => false,
                          ])
        ->addColumn('first_name', 'string', [
                          'limit' => 64,
                          'null' => false,
                          ])
        ->addColumn('last_name', 'string', [
                          'limit' => 64,
                          'null' => false,
                          ])
        ->addColumn('email', 'string', [
                          'limit' => 256,
                          'null' => false,
                          ])
        ->addColumn('message', 'text', [
                          'null' => false,
                          ])
        ->addColumn('date_created', 'timestamp', [
                          'default' => 'CURRENT_TIMESTAMP',
                          'null' => false,
                          ])
        ->create();
    }
}
