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
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelaku_umkm_id');
            $table->foreign('pelaku_umkm_id')->references('id')->on('pelaku_umkms')->onDelete('cascade');
            $table->longText('name');
            $table->string('image');
            $table->string('description');
            $table->longText('address');
            $table->string('link_address');
            $table->string('bank');
            $table->string('norek');
            $table->string('atas_nama');
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
        Schema::dropIfExists('umkms');
    }
};
