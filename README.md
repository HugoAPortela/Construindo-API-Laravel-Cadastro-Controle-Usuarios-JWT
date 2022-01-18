# Construindo uma API com Laravel e JWT

Projeto produzido em uma live code em parceria com a [Digital Innovation One](https://digitalinnovation.one) no dia 10/07/2020

## Descrição do projeto

Neste projeto, desenvolvemos juntos uma API utilizando Laravel e JWT para podermos fazer controle de nossas rotas. 

## Para rodar o projeto

Criar arquivo .env

``cp .env.example .env``

Subir o projeto

``make up``

Instalar dependências

``make composer``

``composer install --ignore-platform-reqs``

Criar chave da aplicação

``make php``

``php artisan key:generate``

Criar chave secreta para o JWT

``make php``

``php artisan jwt:secret``

## Links

[PPT utilizado na Live](https://docs.google.com/presentation/d/1FMctl_M15DiI1QgKOGy_Q1PkLuTyC8KnDCme0MSligY/edit?usp=sharing)

[Zip com arquivos docker](https://bit.ly/vitor-laravel-jwt-utils)

[Plataforma com cursos de Laravel](https://laracasts.com/)

[Documentação do JWT](https://jwt.io/)

[Lib do JWT utilizada](https://github.com/tymondesigns/jwt-auth)
