<?php

namespace Database\Seeders;

use App\Models\TrackedTag;
use Illuminate\Database\Seeder;

class TrackedTagSeeder extends Seeder
{
    public function run(): void
    {
        $this->addWritingTags();
        $this->addPoliticalTags();
        $this->addBibleTags();
    }

    private function addWritingTags(): void
    {
        $tags = [
            [
                'tag' => 'Conto',
                'description' => 'Narrativa curta com enredo e personagens bem definidos.'
            ],
            [
                'tag' => 'Crónica',
                'description' => 'Texto curto baseado em fatos do cotidiano, geralmente com tom pessoal.'
            ],
            [
                'tag' => 'Romance',
                'description' => 'Narrativa longa com desenvolvimento aprofundado de personagens e enredo.'
            ],
            [
                'tag' => 'Novela',
                'description' => 'Narrativa intermediária entre o conto e o romance, com estrutura complexa.'
            ],
            [
                'tag' => 'Artigo',
                'description' => 'Texto informativo ou argumentativo sobre um tema específico.'
            ],
            [
                'tag' => 'Estudo Bíblico',
                'description' => 'Análise aprofundada de textos bíblicos para compreensão teológica.'
            ],
            [
                'tag' => 'Pregação Expositiva',
                'description' => 'Sermão baseado na explicação detalhada de um trecho bíblico.'
            ],
            [
                'tag' => 'Pregação Temática',
                'description' => 'Sermão centrado em um tema específico da Bíblia.'
            ],
            [
                'tag' => 'Novo Testamento',
                'description' => 'Segunda parte da Bíblia, que relata a vida e os ensinamentos de Jesus Cristo.'
            ],
            [
                'tag' => 'Velho Testamento',
                'description' => 'Primeira parte da Bíblia, que contém a história e as leis do povo de Israel.'
            ],

        ];
        foreach ($tags as $tagData) {
            TrackedTag::firstOrCreate(
                ['tag' => $tagData['tag']],
                ['description' => $tagData['description']]
            );
        }
    }

    private function addPoliticalTags(): void
    {
        $tags = [
            [
                'tag' => 'Política',
                'description' => 'Estudo e discussão sobre sistemas de governo e políticas públicas.'
            ],
            [
                'tag' => 'Liberdade',
                'description' => 'Reflexão sobre a autonomia e os direitos individuais na sociedade.'
            ],
            ['tag' => 'Opinião', 'description' => 'Textos argumentativos expressando um ponto de vista pessoal.'],
            ['tag' => 'Perdão', 'description' => 'Reflexão sobre a importância de perdoar e ser perdoado.'],
            ['tag' => 'Desafio Literário', 'description' => 'Propostas para estimular a criatividade na escrita.'],
            ['tag' => 'Desespero', 'description' => 'Exploração de sentimentos de angústia e falta de esperança.'],
            ['tag' => 'Escrita Criativa', 'description' => 'Práticas e técnicas para desenvolver textos originais.'],
            ['tag' => 'Esperança', 'description' => 'Mensagens e reflexões sobre a importância da esperança na vida.'],
            [
                'tag' => 'Exercícios de Escrita',
                'description' => 'Atividades para aprimorar a escrita e a criatividade.'
            ],
            ['tag' => 'Feminismo', 'description' => 'Discussão sobre igualdade de gênero e direitos das mulheres.'],
            ['tag' => 'Globalização', 'description' => 'Impacto da interconectividade mundial na cultura e economia.'],
            [
                'tag' => 'Ideologia de Gênero',
                'description' => 'Debate sobre identidade de gênero e construções sociais.'
            ],
            ['tag' => 'Igreja', 'description' => 'Estudos e reflexões sobre a comunidade cristã e sua missão.'],
            ['tag' => 'Jesus', 'description' => 'Textos sobre a vida e os ensinamentos de Jesus Cristo.'],
            ['tag' => 'Lisboa', 'description' => 'Textos e reflexões sobre a capital de Portugal.'],
            ['tag' => 'Rio de Janeiro', 'description' => 'Histórias e discussões sobre a cidade do Rio de Janeiro.'],
            ['tag' => 'Portugal', 'description' => 'Cultura, história e sociedade portuguesa.'],
            ['tag' => 'Brasil', 'description' => 'Análises sobre a cultura e sociedade brasileira.'],
            ['tag' => 'Londres', 'description' => 'Exploração da cultura e história de Londres.'],
            ['tag' => 'Inglaterra', 'description' => 'Reflexões sobre a cultura e política da Inglaterra.'],
            [
                'tag' => 'Marxismo Cultural',
                'description' => 'Discussão sobre a influência do marxismo na cultura contemporânea.'
            ],
            [
                'tag' => 'Meninos de Rua',
                'description' => 'Reflexões sobre crianças em situação de vulnerabilidade social.'
            ],
            ['tag' => 'Negacionismo', 'description' => 'Discussão sobre a negação de fatos científicos ou históricos.'],

        ];
        foreach ($tags as $tagData) {
            TrackedTag::firstOrCreate(
                ['tag' => $tagData['tag']],
                ['description' => $tagData['description']]
            );
        }
    }

    private function addBibleTags(): void
    {
        $tags = [
            ['tag' => 'Gênesis', 'description' => 'Pentateuco'],
            ['tag' => 'Êxodo', 'description' => 'Pentateuco'],
            ['tag' => 'Levítico', 'description' => 'Pentateuco'],
            ['tag' => 'Números', 'description' => 'Pentateuco'],
            ['tag' => 'Deuteronômio', 'description' => 'Pentateuco'],
            ['tag' => 'Josué', 'description' => 'Livros Históricos'],
            ['tag' => 'Juízes', 'description' => 'Livros Históricos'],
            ['tag' => 'Rute', 'description' => 'Livros Históricos'],
            ['tag' => 'I Samuel', 'description' => 'Livros Históricos'],
            ['tag' => 'II Samuel', 'description' => 'Livros Históricos'],
            ['tag' => 'I Reis', 'description' => 'Livros Históricos'],
            ['tag' => 'II Reis', 'description' => 'Livros Históricos'],
            ['tag' => 'I Crônicas', 'description' => 'Livros Históricos'],
            ['tag' => 'II Crônicas', 'description' => 'Livros Históricos'],
            ['tag' => 'Esdras', 'description' => 'Livros Históricos'],
            ['tag' => 'Neemias', 'description' => 'Livros Históricos'],
            ['tag' => 'Ester', 'description' => 'Livros Históricos'],
            ['tag' => 'Jó', 'description' => 'Livros Poéticos e Sapienciais'],
            ['tag' => 'Salmos', 'description' => 'Livros Poéticos e Sapienciais'],
            ['tag' => 'Provérbios', 'description' => 'Livros Poéticos e Sapienciais'],
            ['tag' => 'Eclesiastes', 'description' => 'Livros Poéticos e Sapienciais'],
            ['tag' => 'Cântico dos Cânticos', 'description' => 'Livros Poéticos e Sapienciais'],
            ['tag' => 'Sabedoria', 'description' => 'Livros Poéticos e Sapienciais'],
            ['tag' => 'Eclesiástico', 'description' => 'Livros Poéticos e Sapienciais'],
            ['tag' => 'Isaías', 'description' => 'Profetas Maiores'],
            ['tag' => 'Jeremias', 'description' => 'Profetas Maiores'],
            ['tag' => 'Lamentações', 'description' => 'Profetas Maiores'],
            ['tag' => 'Ezequiel', 'description' => 'Profetas Maiores'],
            ['tag' => 'Daniel', 'description' => 'Profetas Maiores'],
            ['tag' => 'Oséias', 'description' => 'Profetas Menores'],
            ['tag' => 'Joel', 'description' => 'Profetas Menores'],
            ['tag' => 'Amós', 'description' => 'Profetas Menores'],
            ['tag' => 'Abdias', 'description' => 'Profetas Menores'],
            ['tag' => 'Jonas', 'description' => 'Profetas Menores'],
            ['tag' => 'Miquéias', 'description' => 'Profetas Menores'],
            ['tag' => 'Naum', 'description' => 'Profetas Menores'],
            ['tag' => 'Habacuc', 'description' => 'Profetas Menores'],
            ['tag' => 'Sofonias', 'description' => 'Profetas Menores'],
            ['tag' => 'Ageu', 'description' => 'Profetas Menores'],
            ['tag' => 'Zacarias', 'description' => 'Profetas Menores'],
            ['tag' => 'Malaquias', 'description' => 'Profetas Menores'],
            ['tag' => 'Mateus', 'description' => 'Evangelho'],
            ['tag' => 'Marcos', 'description' => 'Evangelho'],
            ['tag' => 'Lucas', 'description' => 'Evangelho'],
            ['tag' => 'João', 'description' => 'Evangelho'],
            ['tag' => 'Atos dos Apóstolos', 'description' => 'Evangelhos e Atos'],
            ['tag' => 'Romanos', 'description' => 'Cartas Paulinas'],
            ['tag' => 'I Coríntios', 'description' => 'Cartas Paulinas'],
            ['tag' => 'II Coríntios', 'description' => 'Cartas Paulinas'],
            ['tag' => 'Gálatas', 'description' => 'Cartas Paulinas'],
            ['tag' => 'Efésios', 'description' => 'Cartas Paulinas'],
            ['tag' => 'Filipenses', 'description' => 'Cartas Paulinas'],
            ['tag' => 'Colossenses', 'description' => 'Cartas Paulinas'],
            ['tag' => 'I Tessalonicenses', 'description' => 'Cartas Paulinas'],
            ['tag' => 'II Tessalonicenses', 'description' => 'Cartas Paulinas'],
            ['tag' => 'I Timóteo', 'description' => 'Cartas Paulinas'],
            ['tag' => 'II Timóteo', 'description' => 'Cartas Paulinas'],
            ['tag' => 'A Tito', 'description' => 'Cartas Paulinas'],
            ['tag' => 'A Filemon', 'description' => 'Cartas Paulinas'],
            ['tag' => 'Hebreus', 'description' => 'Cartas Paulinas'],
            ['tag' => 'Epístola de São Tiago', 'description' => 'Cartas Gerais'],
            ['tag' => 'Epístola I de São Pedro', 'description' => 'Cartas Gerais'],
            ['tag' => 'Epístola II de São Pedro', 'description' => 'Cartas Gerais'],
            ['tag' => 'Epístola I de São João', 'description' => 'Cartas Gerais'],
            ['tag' => 'Epístola II de São João', 'description' => 'Cartas Gerais'],
            ['tag' => 'Epístola III de São João', 'description' => 'Cartas Gerais'],
            ['tag' => 'Epístola de São Judas', 'description' => 'Cartas Gerais'],
            ['tag' => 'Apocalipse', 'description' => 'Apocalipse']
        ];
        foreach ($tags as $tagData) {
            TrackedTag::firstOrCreate(
                ['tag' => $tagData['tag']],
                ['description' => $tagData['description']]
            );
        }
    }
}
