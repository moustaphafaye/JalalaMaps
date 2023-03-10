<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('signalisations', function (Blueprint $table) {
            $table->id();
            $table->integer('numeroSignalisation');
            $table->dateTime('date');
            $table->Text('commentaire');
            $table->string('typeSignalisation');
            $table->binary('image');
            $table->string('niveauSignalisation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signalisations');
    }
};
