<?php

use Phinx\Migration\AbstractMigration;

class CreateBillPaysTable extends AbstractMigration
{
    public function up()
    {
        $this->table('bill_pays')
            ->addColumn('date_launch', 'date')
            ->addColumn('name', 'string')
            ->addColumn('value', 'float')
            ->addColumn('user_id', 'integer')
            ->addColumn('category_cost_id', 'integer')
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->addForeignKey('user_id', 'users', 'id')
            ->addForeignKey('category_cost_id', 'category_costs', 'id')
            ->create();
    }

    public function down()
    {
        $this->table('bill_pays')->drop()->save();
    }
}
