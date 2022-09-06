# Laravel Opportunities

# Tecnologias Utilizadas

- Php
- Laravel
- Mysql
- Docker

# Requisitos

- Php 8
- Composer
- Docker

# Instalação

- No Terminal rodar o comando:

```sh
composer install --ignore-platform-reqs
```

- Apos instalar as dependencias utilizaremos o Laravel Sail (uma interface de linha de comando para o Docker)
- Verifique se a env esta configurada pois o Sail builda o container utilizando as variaveis da env (vou estar subindo a env com uma configuração padrao para facilitar o setup)
- No Terminal rodar o comando:

```sh
./vendor/bin/sail up -d
```

- Acessar o bash do container:

```sh
./vendor/bin/sail exec laravel.test bash
```

- Para garantir que as dependencias estejam atualizadas de acordo com o container eu gosto de rodar o comando de instalação das dependencias dentro do container sem a necessidade do --ignore-platform-reqs

```sh
composer install 
```

ou

```sh
composer update 
```

- Apos finalizar a instalação, rodar o comando de criação das tabelas do banco

```sh
php artisan migrate
```

- Para cadastrar os repositorios vindos da api do Github, envie um post para a seguinte url informando como ultimo parametro o nome da Organização

```
Post localhost/api/repositories/{org_name}
```

- Para visualizar os repositorios cadastrados, [clique aqui](http://localhost/)

- Ou acesse a rota

```
Get http://localhost/
```
