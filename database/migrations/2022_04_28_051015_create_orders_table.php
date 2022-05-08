<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('recipient_id');
            $table->string('original_branch');
            $table->string('destination_branch');
            $table->string('order_date')->nullable();
            $table->string('order_month')->nullable();
            $table->string('order_year')->nullable();
            $table->string('status');
            $table->string('confirmed_date')->nullable();
            $table->string('processing_date')->nullable();
            $table->string('arrived_date')->nullable();
            $table->string('picked_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
