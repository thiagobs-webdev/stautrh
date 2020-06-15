<p align="center"><img src="https://www.magicwebdesign.com.br/assets/images/magic_logo.png" width="400"></p>

## Sobre O Teste

API REST – Utilizando Laravel para cadastro de:

 

- Filmes
- Classificação do Filme
- Atores
- Diretor
- Collection do postman para consumo e teste da API
- Documentação de como startar a API (comandos necessários, criação de base, migration, etc.)
- Como rodar o projeto 

Descrever o projeto e estratégias de desenvolvimento no Readme.md, explicando as tecnologias usadas e as decisões tomadas.

 

Data de entrega do teste: 09/06/2020


## Descrição do Desenvolvimento

Por meio da documentação do [Laravel](https://laravel.com/docs/7.x) foi realizado a instalação. As Rotas API foram criadas para tal finalidade e consumidas através do [Postman](https://www.postman.com/). Um Modelo Entidade Relacionamento (MER) foi construído para mapear o problema e, por meio dele, criado as Classes necessárias.

<p align="center"><img src="https://www.magicwebdesign.com.br/assets/images/magic_logo.png" width="400"></p>

Por meio do [Postman](https://www.postman.com/) foi-se criando o **collection** necessário para consumir e testar as **rotas** desenvolvidas. Criou-se também dados através do [Seeder](https://laravel.com/docs/7.x/seeding
) para usar na API de início.

Páginas *Views* foram criadas para acompanhar os resultados das *Resquisições* da *API*. O Acesso às essas páginas se dá por meio da URL basse do instalção (**url/**).

## Instalação

1: Clone este repositório em seu Servidor
2: Configure/Crie o arquivo `.env` com os dados de suas configurações: [env.exemple](https://github.com/laravel/laravel/blob/master/.env.example)

>   APP_KEY -> Rode o comando: `php artisan key:generate`
>   APP_URL -> Sua_URL
>   Banco de Dados: DB* -> Seu Banco de Dados

3: Instale as depedências: `composer install`

4: Rode as **migrations**: `php artisan migrate`

5: Rode os **seeders**: `php artisan db:seed`

6: Salve o **Postman Collection**: [Aquivo no Repositŕio](https://github.com/thiagobs-webdev/redemagic/tree/master/_files)

7: Abra/Importe  o arquivo **Postman Collection** em seu programa *Postman*

8: Substitua a URL *Base do arquivo* (que é: *http://localhost:8000*) pela sua URL caso seja diferente.

9: Com a URL configurada, basta apenas consumir a API

10: Acompanhe o Resultado na página principal do Projeto.

Boa Sorte \o/


## Considerações Finais

A execução deste projeto pode ser obtido online em [https://redemagic.thiagobs.me/](https://redemagic.thiagobs.me/).
Para consumir a API deste link online, basta apenas Salvar o **Postman Collection**: [Postman Colletion Online](https://github.com/thiagobs-webdev/redemagic/tree/master/_files). Não há necessidade de alterar este arquivo, basta apenas importar no *Postman*.



- [Simple, fast routing engine](https://laravel.com/docs/routing).
