<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('new_email')) {
            Schema::create('new_email', function (Blueprint $table) {
                $table->id();
                $table->string('emails');
                $table->string('assunto');
                $table->unsignedBigInteger('idModelo');
                $table->foreign('idModelo')->references('id')->on('modelos')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_email');
    }
};