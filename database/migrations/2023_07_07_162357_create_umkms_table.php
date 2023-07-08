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
            $table->foreignId('id_pelaku_umkm');
            $table->foreign('id_pelaku_umkm')->references('id')->on('pelaku_umkms')->onDelete('cascade');
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->longText('address');
            $table->string('link_address');
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
