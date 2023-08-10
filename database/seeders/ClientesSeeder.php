<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create(
            [
                'nome' => 'julio mecanico',
                'email' => 'juh@hotmail.com',
                'endereco' => 'rua sete de setembro',
                'logradouro' => 'casa',
                'cep' => '17611000',
                'bairro' => 'santa marta',

            ]
        );

        Cliente::create(
            [
                'nome' => 'testao pedreiro',
                'email' => 'juh@hotmail.com',
                'endereco' => 'rua sete de setembro',
                'logradouro' => 'casa',
                'cep' => '17611000',
                'bairro' => 'santa marta',

            ]
        );
    }
}
