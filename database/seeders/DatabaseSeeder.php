<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Criar Categorias Reais
        $eletronicos = Category::firstOrCreate(['nome' => 'Eletronicos'], [
            'descricao' => 'Dispositivos tecnologicos, gadgets e acessorios eletronicos em geral.'
        ]);

        $escritorio = Category::firstOrCreate(['nome' => 'Escritorio'], [
            'descricao' => 'Moveis, organizadores e materiais de papelaria de alta qualidade.'
        ]);

        $vestuario = Category::firstOrCreate(['nome' => 'Vestuario'], [
            'descricao' => 'Roupas, calçados e acessorios de moda masculina e feminina.'
        ]);

        $esportes = Category::firstOrCreate(['nome' => 'Esportes'], [
            'descricao' => 'Equipamentos esportivos, vestimentas para treino e acessorios fitness.'
        ]);

        $casa = Category::firstOrCreate(['nome' => 'Casa e Cozinha'], [
            'descricao' => 'Utensilios domesticos, decoracao e eletrodomesticos praticos para o dia a dia.'
        ]);

        // 2. Lista de 20 Produtos Reais
        $produtos = [
            // Eletronicos
            [
                'nome' => 'Smartphone Galaxy S24',
                'descricao' => 'Samsung Galaxy S24 256GB com tela de 6.2 polegadas, camera tripla e inteligencia artificial integrada.',
                'codigo' => 'ELE-S24-256',
                'valor' => 4899.00,
                'quantidade' => 15,
                'categoria_id' => $eletronicos->id,
            ],
            [
                'nome' => 'Notebook Pro Intel i7',
                'descricao' => 'Notebook ultrafino com processador Core i7 de ultima geracao, 16GB RAM, 512GB SSD e tela Full HD.',
                'codigo' => 'ELE-NOTE-I7',
                'valor' => 5499.90,
                'quantidade' => 8,
                'categoria_id' => $eletronicos->id,
            ],
            [
                'nome' => 'Fone de Ouvido Bluetooth ANC',
                'descricao' => 'Headphone sem fio com cancelamento ativo de ruido, bateria de ate 30 horas e som de alta definicao.',
                'codigo' => 'ELE-FONE-ANC',
                'valor' => 349.00,
                'quantidade' => 45,
                'categoria_id' => $eletronicos->id,
            ],
            [
                'nome' => 'Smartwatch Sport Fit',
                'descricao' => 'Relogio inteligente com monitor cardiaco, GPS integrado, medicao de oxigenio e resistente a agua.',
                'codigo' => 'ELE-WAT-SPORT',
                'valor' => 699.00,
                'quantidade' => 20,
                'categoria_id' => $eletronicos->id,
            ],
            [
                'nome' => 'Carregador Portatil Powerbank',
                'descricao' => 'Carregador portatil de 20000mAh com duas saidas USB-C de carregamento rapido para smartphones.',
                'codigo' => 'ELE-PB-20K',
                'valor' => 189.90,
                'quantidade' => 60,
                'categoria_id' => $eletronicos->id,
            ],

            // Escritorio
            [
                'nome' => 'Cadeira Ergonomica Office',
                'descricao' => 'Cadeira de escritorio com apoio lombar ajustavel, apoio de braço regulavel e base giratoria de nylon.',
                'codigo' => 'ESC-CAD-ERGO',
                'valor' => 899.00,
                'quantidade' => 12,
                'categoria_id' => $escritorio->id,
            ],
            [
                'nome' => 'Suporte Articulado Monitor',
                'descricao' => 'Suporte articulado com pistao a gas para monitores de ate 32 polegadas, inclinacao vertical e rotaçao 360.',
                'codigo' => 'ESC-SUP-MON',
                'valor' => 220.00,
                'quantidade' => 25,
                'categoria_id' => $escritorio->id,
            ],
            [
                'nome' => 'Teclado Mecanico Silent',
                'descricao' => 'Teclado mecanico sem fio layout ABNT2 com switches silenciosos e iluminacao branca suave.',
                'codigo' => 'ESC-TEC-MEC',
                'valor' => 299.90,
                'quantidade' => 30,
                'categoria_id' => $escritorio->id,
            ],
            [
                'nome' => 'Mouse Sem Fio Ergonomico',
                'descricao' => 'Mouse vertical com sensor optico ajustavel ate 4000 DPI para prevencao de lesao por esforco repetitivo.',
                'codigo' => 'ESC-MOU-ERGO',
                'valor' => 149.00,
                'quantidade' => 50,
                'categoria_id' => $escritorio->id,
            ],
            [
                'nome' => 'Organizador de Mesa Acrilico',
                'descricao' => 'Organizador com divisorias para canetas, blocos de notas, clipes e gaveta pequena integrada.',
                'codigo' => 'ESC-ORG-ACR',
                'valor' => 59.90,
                'quantidade' => 100,
                'categoria_id' => $escritorio->id,
            ],

            // Vestuario
            [
                'nome' => 'Camisa Polo Algodao Pima',
                'descricao' => 'Camisa polo masculina confeccionada em algodao Pima de alta resistencia e toque macio.',
                'codigo' => 'VES-POL-PIMA',
                'valor' => 129.90,
                'quantidade' => 40,
                'categoria_id' => $vestuario->id,
            ],
            [
                'nome' => 'Calça Jeans Premium Slim',
                'descricao' => 'Calça jeans slim fit com elastano, lavagem escura confortavel para uso casual ou semi-formal.',
                'codigo' => 'VES-JNS-SLIM',
                'valor' => 199.00,
                'quantidade' => 35,
                'categoria_id' => $vestuario->id,
            ],
            [
                'nome' => 'Jaqueta Corta-Vento Street',
                'descricao' => 'Jaqueta leve impermeavel com capuz ajustavel e bolsos laterais fechados com ziper.',
                'codigo' => 'VES-JAQ-CV',
                'valor' => 249.90,
                'quantidade' => 18,
                'categoria_id' => $vestuario->id,
            ],
            [
                'nome' => 'Tenis Casual Classic',
                'descricao' => 'Tenis unissex com solado de borracha vulcanizada e cabedal de lona ideal para o dia a dia.',
                'codigo' => 'VES-TEN-CLAS',
                'valor' => 179.90,
                'quantidade' => 22,
                'categoria_id' => $vestuario->id,
            ],

            // Esportes
            [
                'nome' => 'Tapete de Yoga Antiderrapante',
                'descricao' => 'Tapete para exercicios fisicos em TPE ecologico com 6mm de espessura e textura de alta aderencia.',
                'codigo' => 'ESP-TAP-YOGA',
                'valor' => 119.00,
                'quantidade' => 30,
                'categoria_id' => $esportes->id,
            ],
            [
                'nome' => 'Garrafa Termica Inox 1L',
                'descricao' => 'Garrafa termica com parede dupla isolada a vacuo que conserva bebidas geladas por ate 24 horas.',
                'codigo' => 'ESP-GAR-TERM',
                'valor' => 99.90,
                'quantidade' => 80,
                'categoria_id' => $esportes->id,
            ],
            [
                'nome' => 'Kit de Faixas Elasticas Mini Band',
                'descricao' => 'Kit com 5 faixas elasticas de diferentes intensidades para treino funcional e fortalecimento.',
                'codigo' => 'ESP-KIT-BAND',
                'valor' => 45.00,
                'quantidade' => 120,
                'categoria_id' => $esportes->id,
            ],

            // Casa e Cozinha
            [
                'nome' => 'Fritadeira Eletrica Airfryer 4L',
                'descricao' => 'Fritadeira sem oleo com timer digital, ajuste de temperatura ate 200 graus e cesto antiaderente.',
                'codigo' => 'CAS-FRIT-AIR',
                'valor' => 420.00,
                'quantidade' => 10,
                'categoria_id' => $casa->id,
            ],
            [
                'nome' => 'Jogo de Panelas Antiaderentes',
                'descricao' => 'Kit com 5 panelas de aluminio revestidas com antiaderente ceramico de alta durabilidade e tampas de vidro.',
                'codigo' => 'CAS-JOG-PAN',
                'valor' => 389.00,
                'quantidade' => 14,
                'categoria_id' => $casa->id,
            ],
            [
                'nome' => 'Cafeteira Espresso Automatica',
                'descricao' => 'Cafeteira com pressao de 15 bar para espresso cremoso e bico vaporizador para leite.',
                'codigo' => 'CAS-CAF-ESPR',
                'valor' => 549.90,
                'quantidade' => 7,
                'categoria_id' => $casa->id,
            ],
        ];

        // 3. Inserir Produtos no Banco
        foreach ($produtos as $dadosProduto) {
            Product::firstOrCreate(
                ['codigo' => $dadosProduto['codigo']],
                $dadosProduto
            );
        }
    }
}
