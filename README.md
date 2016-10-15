# API de Contato

## Configurações
1. importar schema e tabela para um banco de dados MySQL "database.sql"
2. configurar dados de conexão em "\enviroments\prod\.env"
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=uhmane
DB_USERNAME=root
DB_PASSWORD=
```
3. criar um vhost
```
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/contato.local"
    ServerName contato.local
    ErrorLog "logs/contato_local-error.log"
    CustomLog "logs/contato_local-access.log" common
</VirtualHost>
```
4. redirecionar o hosts
    * C:\Windows\System32\drivers\etc\hosts
    * 127.0.0.1	contato.local
5. testar URL
    * Validar se retorna o seguinte texto
```
Contatos
Autor: Caio Santos
Email: santoscaio@gmail.com
```

## Endpoints (*CRUD de contato*)
- Todos os retornos são respondidos em HTTP mais a informação em JSON
- Inserir contato
    - Insere um novo contato no banco de dados
    - method: **POST**
    - http://contato.local/contato
    - Campos: **[nome, email, telefone, descricao]**
    - Campos **obrigatórios: [nome, email, descricao]**
    - Retorno: **id**
- Atualizar contato
    - Atualiza um contato no banco de dados
    - method: **PUT**
    - http://contato.local/contato/1
    - Campo obrigatório: **[id]**
    - Campos opcionais: **[nome, email, telefone, descricao]**
    - Retorno: **id**
- Buscar contato
    - Busca um contato no banco de dados
    - method: **GET**
    - http://contato.local/contato/1
    - Campo obrigatório: **[id]**
    - Retorno: **dados do contato**
- Deletar contato
    - Deleta um contato no banco de dados
    - method: **DELETE**
    - http://contato.local/contato/1
    - Campo obrigatório: **[id]**
    - Retorno: **dados do contato**

# Extra Documentation
## Semantics and Content of HTTP
https://tools.ietf.org/html/rfc7231

## List of HTTP status codes
https://en.wikipedia.org/wiki/List_of_HTTP_status_codes


# Lumen PHP Framework
## Official Documentation
Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## License
The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
