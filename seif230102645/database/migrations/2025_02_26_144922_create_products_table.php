<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('code');
        $table->string('name');
        $table->string('model');
        $table->string('photo')->nullable();
        $table->text('description')->nullable();
        $table->decimal('price', 8, 2);
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
