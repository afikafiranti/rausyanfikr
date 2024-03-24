<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiWebsiteTable extends Migration
{
    public function up()
    {
        Schema::create('informasi_website', function (Blueprint $table) {
            $table->id();
            $table->string('nama_website');
            $table->string('alamat');
            $table->string('email');
            $table->string('telepon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('informasi_website');
    }
}
