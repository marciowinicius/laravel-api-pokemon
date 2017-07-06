# API CRUD usuários e seus pokemons
Esta API foi criada com o intuito de estudar mais o conceito de API com acesso via TOKEN utilizando o framework [Laravel](https://laravel.com/). Nesta API descartamos o uso de views, pois o intuito era somente para fazer o CRUD sem uma interface e sim através do POSTMAN.

# Oque é necessário ?
- PHP >= 5.5.9
- MySQL
- Composer

# Observações para funcionamento do projeto
> 1 - Faça o clone para seu computador.

> 2 - Crie um banco de dados local com qualquer nome. Sugiro colocar `laravel-pokemon`

> 3 - Altere .env.example para .env e altere as configurações do banco de dados

> 4 - Alterado o .env abra o terminal na pasta do projeto e rode as migrations com `php artisan migrate`

> 5 - Aproveite e adquira as dependências do projeto com `composer update`

> 6 - Para rodar o projeto `php artisan serve` que por padrão para acessar a aplicação basta acessar localhost:8000

# Regras de negócio
> 1 - Não é necessário login para fazer cadastro, basta acessar a rota de cadastro e passar os parâmetros.

> 2 - Um usuário só poderá ser alterado ou deletado por ele mesmo.

> 3 - Para cadastrar um pokemon precisa estar logado.

> 4 - Um pokemon só poderá ser alterado ou deletado pelo usuário que lhe pertence.

# Rotas
Essas são as `rotas` do projeto :
![alt text](https://github.com/marciowinicius/laravel-api-pokemon/images_git/rotas.png)

> Observação : todas as rotas que estão com middleware jwt-auth você irá precisar do token de acesso para utilizá-la.
# Exemplos de como utilizar as rotas no POSTMAN
- Lembrando que todas as rotas estão prefixadas com /api

> Cadastro de usuário `/api/users` método `POST`
![alt text](https://github.com/marciowinicius/laravel-api-pokemon/images_git/cadastro_usuario.png)

> Login para acessar token `/api/auth/login` método `POST`, basta passar os parâmetros
![alt text](https://github.com/marciowinicius/laravel-api-pokemon/images_git/token_login.png)

> Utilização do token(cadastrando um pokemon) `/api/pokemons` método `POST` **Utilize os parâmetros
![alt text](https://github.com/marciowinicius/laravel-api-pokemon/images_git/utilizando_token.png)

# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
