<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id(); // ID primário
            $table->string('nome');                 // Nome do fornecedor
            $table->string('telefone');             // Telefone do fornecedor
            $table->timestamps();                   // created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('fornecedores');
    }
};

