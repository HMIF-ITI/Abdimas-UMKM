<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_umkm');
            $table->foreign('id_umkm')->references('id')->on('umkms')->onDelete('cascade');
            $table->foreignId('id_product');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('id_transaction');
            $table->foreign('id_transaction')->references('id')->on('transactions')->onDelete('cascade');
            $table->integer('qty');
            $table->string('status');
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
        Schema::dropIfExists('detail_transactions');
    }
};
