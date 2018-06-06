<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW stock_view AS
            SELECT 
                t0.id, 
                t0.name, 
                t0.unit_value, 
                t1.id as stock_id, 
                t1.product_id, 
                t1.lot, t1.due_date, 
                t1.quantity, 
                t1.quantity * t0.unit_value as value_item 
                FROM products as t0 join stock t1 on t1.product_id = t0.id"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW stock_view");
    }
}

