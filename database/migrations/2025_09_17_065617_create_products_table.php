<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id(); // id تلقائي
        $table->string('name');
        $table->decimal('price', 10, 2);
        $table->integer('stock');
        $table->timestamps(); 
    });
    DB::statement('ALTER TABLE products ENGINE=NDBCLUSTER');

}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
