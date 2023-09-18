<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    public function run(): void
    {
        // $contato = new SiteContato();
        // $contato->name = 'Sistema SG';
        // $contato->telefone = '(11) 99999-9999';
        // $contato->email = 'contato@sg.com.br';
        // $contato->motivo_contato = 1;
        // $contato->mensagem = 'Seja bem-vindo ao sistema Super Gestão!';
        // $contato->save();

        SiteContato::factory()->count(100)->create();
    }
}
