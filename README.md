<p align="center" color="red"><img src="https://media.licdn.com/dms/image/C510BAQEzFfkMC-6xXg/company-logo_200_200/0?e=2159024400&v=beta&t=XnjmAM49QduUXywmwqX3_1sgpGBbTt8uy1Vs1h19up8" width="400"></p>

## Sobre O Teste
#### BACKEND PHP - PROJETO API REST

Você foi convidado para desenvolver a API de um projeto. Para isso, foi escrito uma
pequena documentação das funcionalidades necessárias no projeto. Os desenvolvedores
frontend usarão a sua API para criar um aplicativo pessoal para monitorar quantas vezes o
usuário bebeu água.

##### Observações de implementação:

- O projeto deve ser desenvolvido em PHP e com banco de dados relacional;
- Não​ deve ser utilizado nenhum framework (Laravel, Slim framework, Doctrine, etc.);
- Todas as entradas e saídas devem ser no formato JSON;
- Se possível, a API deve seguir o padrão REST;
- É desejável que o código use o método Programação Orientada a Objetos;
- Projetos plagiados serão desconsiderados.

**Endpoints desejáveis:**
 
 **Tratamentos desejáveis:**
 
- Na criação de um usuário, retornar um erro se o usuário já existe
- No login, alertar que o usuário não existe ou que a senha está inválida
- Na edição e na remoção do usuário, limitar-se apenas ao usuário autenticado

**Tratamentos opcionais:**

- Paginação na lista de usuários
- N- Criar um serviço que liste o histórico de registros de um usuário (retornando a data e
a quantidade em mL de cada registro)
- Criar um serviço que liste o ranking do usuário que mais bebeu água ​ hoje
(considerando os ml e não a quantidade de vezes), retornando o nome e a
quantidade em mililitros (mL)

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
