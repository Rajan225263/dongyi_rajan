<?php
/**
 * Author Rajan Bhatta
 * Date: 26/05/2023

 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_id');
            $table->float('amount');
            $table->string('type');
            $table->date('date');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            //$table->softDeletes(); 
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('restrict');
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
