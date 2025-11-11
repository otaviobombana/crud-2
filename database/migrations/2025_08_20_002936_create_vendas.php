<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id(); // ID principal da venda
            $table->unsignedBigInteger('clientes_id'); // chave estrangeira

            $table->dateTime('data')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('valortotal', 10, 2);
            $table->string('formapgto', 50);

            // Relação com a tabela clientes
            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
