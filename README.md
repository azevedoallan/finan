## Gerenciador de finanças

__Requisitos:__

1. PHP 7+

2. Composer

3. Mysql


__Instalação:__


*1. clone o repositorio com*
```
> git clone https://github.com/azevedoallan/finan.git
```

*2. Crie um banco de dados com o nome 'son_financas'*
```
> create database son_financas;
```

*3. Rode o composer*
```
> composer install
```

*4. Rode as migrações*
```
> php migrate.seed.php
```

*5. execute o servidor*
```
> php -S localhost:8000 -t public public/index.php
```
