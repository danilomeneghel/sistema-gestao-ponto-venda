# PDV - Gestão de Ponto de Venda

Sistema PDV desenvolvido em PHP com Laravel para gestão de venda.

## Módulos

- Login
- Vendas
- Caixa
- Clientes
- Transações
- Estoque
- Produtos
- Relatório de Vendas

## Requisitos

- PHP >= 7.4.33
- MySql >= 8
- Composer
- Docker (opcional)

## Tecnologias

- PHP
- JS
- Jquery
- Json
- CSS and SCSS
- Bootstrap
- Composer
- Artisan
- Laravel

## Instalação

### Docker
Abra o terminal e execute o seguinte comando:

```
$ docker-compose up
```

OBS: É necessário ter o Docker e docker-compose instalado.
Caso não tenha instalado o Docker ou dê alguma falha na instalação, tente com os comandos abaixo.

### MySql
Crie um banco de dados com o nome "pdv" no seu Mysql.<br>
Abra o arquivo .env e efetue a configuração correta para conexão do seu banco de dados.<br>

```
$ mysql -u<seu usuário> -p<sua senha>

mysql> create database `pdv`;
```

### Bash
Após criado o banco de dados, abra o terminal e execute o seguinte comando:

```
$ ./install.sh
```

### Composer
Caso de algum erro e não consiga instalar, execute os seguintes comandos separadamente:

```
$ composer install

$ php artisan key:generate

$ php artisan migrate

$ php artisan db:seed
```

Depois de realizado isso, rode o projeto:

```
$ php artisan serve --host=0.0.0.0 --port=8000
```

## Acesso ao Sistema 

Para acessar o sistema utilize o seguinte endereço:<br>
http://localhost:8000

- Login: <br>
    - Usuário: admin<br>
    - Senha: admin

## Licença

Projeto licenciado sob <a href="LICENSE">The MIT License (MIT)</a>.

## Screenshots

![Screenshots](screenshots/screenshot01.png) <br><br>
![Screenshots](screenshots/screenshot02.png) <br><br>
![Screenshots](screenshots/screenshot03.png) <br><br>
![Screenshots](screenshots/screenshot04.png) <br><br>
![Screenshots](screenshots/screenshot05.png) <br><br>
![Screenshots](screenshots/screenshot06.png) <br><br>
![Screenshots](screenshots/screenshot07.png) <br><br>
![Screenshots](screenshots/screenshot08.png) <br><br>
![Screenshots](screenshots/screenshot09.png) <br><br>
![Screenshots](screenshots/screenshot10.png) <br><br>

## GOSTOU DESSE SISTEMA? <br>
Adquira a versão completa clicando no link: <br>

https://produto.mercadolivre.com.br/MLB-4964871344-sistema-gesto-de-venda-pdv-estoque-produtos-clientes-_JM

