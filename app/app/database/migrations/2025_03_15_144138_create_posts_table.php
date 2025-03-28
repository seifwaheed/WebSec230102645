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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'title'); //VARCHAR title
            $table->text(column: 'description'); //TEXT description
            $table->timestamps(); //created_at & updated_at
        });
    }

};
