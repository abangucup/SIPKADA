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
        Schema::create('penerimas', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->enum('jk', ['pria', 'wanita']);
            $table->string('alamat');
            $table->foreignId('kelurahan_id')->nullable()->constrained()->onDelete('cascade');
            $table->integer('rangking')->nullable();
            $table->enum('status_pernah_menerima', ['sudah', 'belum'])->nullable();
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
        Schema::dropIfExists('penerimas');
    }
};
