<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('price')->unsigned();
            $table->enum('type', ['Installation', 'Monthly Payment', 'Customer Service', 'Product Selling', 'Other']);
            $table->enum('payment_type', ['Bkash', 'Rocket', 'Nagad', 'Bank']);
            $table->string('invoice');
            $table->dateTime('date');
            $table->string('note');
            $table->enum('trans_type', ['income', 'expenses']);
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
        Schema::dropIfExists('transactions');
    }
}
