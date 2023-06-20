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
        Schema::create('contact_hobby', function (Blueprint $table) {
            $table->Integer('contact_id');
            $table->Integer('hobby_id');
            $table->primary(['contact_id', 'hobby_id']);
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('hobby_id')->references('id')->on('hobbies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_hobby');
    }
};
