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
![rotas](https://user-images.githubusercontent.com/14933271/27928216-b0873182-6264-11e7-9683-b160bc0eabcc.png)

> Observação : todas as rotas que estão com middleware jwt-auth você irá precisar do token de acesso para utilizá-la.
# Exemplos de como utilizar as rotas no POSTMAN
- Lembrando que todas as rotas estão prefixadas com /api

> Cadastro de usuário `/api/users` método `POST`
![cadastro_usuario](https://user-images.githubusercontent.com/14933271/27928217-b089935a-6264-11e7-941d-8042b56124a7.png)

> Login para acessar token `/api/auth/login` método `POST`, basta passar os parâmetros
![token_login](https://user-images.githubusercontent.com/14933271/27928218-b08aa59c-6264-11e7-8df5-83f4b4fd3d57.png)

> Utilização do token(cadastrando um pokemon) `/api/pokemons` método `POST` **Utilize os parâmetros
![utilizando_token](https://user-images.githubusercontent.com/14933271/27928219-b08ad2ec-6264-11e7-9b54-52e6f53b7a8b.png)

# Laravel PHP Framework
