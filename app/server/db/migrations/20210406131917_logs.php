<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Logs extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('logs');
        $table->addColumn('level', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
            'comment' => 'INFO/WARN/ERROR',
        ]);
        $table->addColumn('value', 'string', [
            'default' => '',
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('createdAt', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
        ]);
        $table->create();
    }
}
