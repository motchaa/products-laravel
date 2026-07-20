# Controle de Produtos e Categorias

Sistema completo para gestao e inventario de produtos e categorias desenvolvido em Laravel. O sistema oferece uma interface amigavel e organizada para gerenciar o estoque, contendo filtros de busca robustos e validacoes completas.

## Funcionalidades

### Produtos
- Cadastro de produtos contendo nome, descricao, codigo unico, valor, quantidade e categoria associada.
- Edicao de produtos existentes.
- Listagem dinamica de produtos com filtros por descricao, categoria e status (Ativo/Inativo).
- Sistema de Soft Delete (exclusao logica para a lixeira, permitindo restauracao ou arquivamento seguro).
- Busca instantanea baseada nas descricoes registradas via Datalist.

### Categorias
- Cadastro de categorias com nome e descricao.
- Edicao de categorias existentes.
- Listagem completa de categorias.
- Protecao de integridade referencial ao excluir: impede a remocao de categorias que possuem produtos vinculados.

### Interface do Usuario
- Layout unificado e responsivo utilizando Tailwind CSS.
- Header compartilhado para facil navegacao entre modulos.
- Footer institucional com informacoes corporativas e creditos do desenvolvedor.
- Cards estaticos com layouts padronizados para evitar quebras por variacao de conteudo.
- Notificacoes visuais de sucesso ou falha utilizando caixas de alerta do navegador.

## Tecnologias Utilizadas

- PHP 8.2 ou superior
- Laravel 11 (Framework back-end)
- Tailwind CSS 4 (Estilizacao e design responsivo)
- SQLite (Banco de dados padrao)
- JavaScript Vanilla (Interacoes de alertas e utilitarios de confirmacao)

## Requisitos do Sistema

- PHP instalado localmente (PHP >= 8.2)
- Composer (Gerenciador de dependencias do PHP)
- Node.js e NPM (Opcional, caso queira buildar assets adicionais)

## Como Instalar e Rodar o Projeto

1. Clone o repositorio para a sua maquina local:
   ```bash
   git clone https://github.com/motchaa/products-laravel.git
   ```

2. Acesse a pasta do projeto:
   ```bash
   cd products-laravel
   ```

3. Instale as dependencias do projeto via Composer:
   ```bash
   composer install
   ```

4. Crie uma copia do arquivo de configuracao de ambiente:
   ```bash
   cp .env.example .env
   ```

5. Gere a chave criptografica da aplicacao:
   ```bash
   php artisan key:generate
   ```

6. Crie o arquivo do banco de dados SQLite (caso nao exista):
   ```bash
   touch database/database.sqlite
   ```

7. Execute as migrations para estruturar o banco de dados:
   ```bash
   php artisan migrate --seed
   ```

8. Inicie o servidor de desenvolvimento embutido do Laravel:
   ```bash
   php artisan serve
   ```

9. Acesse o sistema no seu navegador atraves do endereço:
   http://127.0.0.1:8000

## Estrutura de Diretorios Principais

- app/Http/Controllers: Controladores contendo a logica de negocios do produto e da categoria.
- app/Http/Requests: Arquivos de validacao StoreProductRequest e StoreCategoryRequest que asseguram regras consistentes para os inputs.
- database/migrations: Arquivos de migracao que definem as tabelas de banco de dados e relacionamentos.
- resources/views: Views Blade da aplicacao (master, produtos, categorias, produto_create, produto_edit, categoria_create, categoria_edit).
- routes/web.php: Rotas que controlam os acessos do sistema.

## Desenvolvedor

- Nome: Thiago Mota (motcha)
