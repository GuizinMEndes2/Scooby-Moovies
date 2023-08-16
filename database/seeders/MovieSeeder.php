<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'name' => 'Bob Esponja: O Incrível Resgate',
                'sinopse' => 'Gary desaparece de repente, mas Bob Esponja e Patrick embarcam em uma missão frenética muito além da Fenda do Biquíni para salvar o amigo.',
                'ano' => '2018-05-23',
                'imagem' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRMgO6skAg-mDcdC_vD3AqFe0GbLWnKR1BbfPBeK_vOVZahiiES',
                'link' => 'https://www.youtube.com/watch?v=LcC-jBJRzXg',
            ],
            [
                'name' => 'Bob Esponja - O Filme',
                'sinopse' => 'Bob Esponja e seu amigo Patrick, uma estrela do mar, embarcam em uma missão para limpar o nome do Sr. Sirigueijo, o proprietário do restaurante Siri Cascudo, que foi acusado de roubar a coroa do rei Netuno. Saindo dos limites familiares, Bob Esponja e Patrick aventuram-se para procurar a coroa de Netuno, mas encontrarão vários obstáculos no caminho.',
                'ano' => '2020-08-11',
                'imagem' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTHDBesf3sxCcnqh7PYEJ3asouxXToQX_IkMgPKWAFx-yK-iIzW',
                'link' => 'https://www.youtube.com/watch?v=vOAqLeR2sOk',
            ],
            [
                'name' => "Bob Esponja: Um Herói Fora D'Água",
                'sinopse' => 'O pirata Burger Beard rouba a receita secreta do adorado hambúrguer de siri e Bob Esponja e seus amigos desembarcam em terra firme para resgatar a fórmula perdida. Para conseguirem, eles têm de se associar a seu antigo rival, Plankton.',
                'ano' => '2006-02-11',
                'imagem' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPfLAxUQDK2riUlqI8PDwD2dr0p-32DfgRsjRUnot-v68zsWVR',
                'link' => 'https://www.youtube.com/watch?v=ktuFrrUGStc',
            ],
            [
                'name' => 'Percy Jackson e o Ladrão de Raios',
                'sinopse' => 'O adolescente Percy Jackson descobre que os deuses gregos e as criaturas mitológicas são reais. Ele é filho de uma divindade e logo entra para um acampamento de treinamento para semideuses. Enquanto tenta se adaptar a seus novos poderes e amigos, ele descobre que o Raio-Mestre do poderoso Zeus foi roubado e ele é o principal suspeito. Assim, ele tenta solucionar o mistério junto com seus novos colegas, Grover e Annabeth.',
                'ano' => '2024-06-20',
                'imagem' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTbuNSWg8q9dnyCXFgu9zWETElvyGVGpbSvLkZAXeNJ9veGBffx',
                'link' => 'https://www.youtube.com/watch?v=R86InkfdboA',
            ],
            [
                'name' => 'Todo Mundo em Pânico',
                'sinopse' => 'Depois do assassinato de uma bela colega de classe, um grupo de adolescentes desorientados descobre que há um assassino entre eles. A heroína Cindy Campbell e a sua turma de amigos tentam se proteger do perigo, mas Gail Hailstorm, uma repórter irritante, simplesmente não os deixa em paz.',
                'ano' => '1998-03-30',
                'imagem' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQ9Er_RqnqpytyRg4uO5yqt2dCeTGOWg5l8IYuQOMyR9eImQNSU',
                'link' => 'https://www.youtube.com/watch?v=HTLPULt0eJ4',
            ],
            [
                'name' => 'Guardiões da Galáxia Vol. 3',
                'sinopse' => 'Peter Quill deve reunir sua equipe para defender o universo e proteger um dos seus. Se a missão não for totalmente bem-sucedida, isso pode levar ao fim dos Guardiões.',
                'ano' => '2023-07-22',
                'imagem' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTzgySgTZJvQl4d7SmLrRVhY3PN-8B8r_2LpWBZe4W5VZySjjxq',
                'link' => 'https://www.youtube.com/watch?v=d1yNc9skssk',
            ],
        ]);
    }
}