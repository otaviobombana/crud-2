<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 150);
            $table->decimal('preco', 10, 2);
            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->unsignedBigInteger('id_fornecedor')->nullable();

            $table->foreign('id_categoria')
                ->references('id')
                ->on('categorias')
                ->onDelete('set null');

            $table->foreign('id_fornecedor')
                ->references('id')
                ->on('fornecedores')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
