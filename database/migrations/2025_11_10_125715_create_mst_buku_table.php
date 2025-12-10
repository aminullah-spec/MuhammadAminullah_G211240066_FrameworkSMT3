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
    Schema::create('mst_buku', function (Blueprint $table) {
        $table->id('ID_Buku');
        $table->string('Judul');
        $table->string('Pengarang');
        $table->string('Kategori');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_buku');
    }
};
