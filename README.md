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

Operação | Verbo HTTP |  Entrada  | Saída | Header
---|--------------| --------------|-------|---------|
**/users/** (criar um novo usuário) | POST | email* name* password * |      |        |
**/login** (autenticar com um usuário) | POST | email * password* |  **token** iduser email name drink_counter    |        |
**/users/:iduser** (autenticar com um usuário) | GET | |  iduser email name drink_counter    | token*  |
**/users/** (obter a lista de usuários) | GET | |  (array de usuários)  | token*  |
**/users/:iduser** (editar o seu próprio usuário) | PUT | email name password|   | token*  |
**/users/:iduser** (apagar o seu próprio usuário) | DELETE | |   | token*  |
**/users/:iduser/drink** (incrementar o contador de quantas vezes bebeu água) | POST | drink_ml (int) | iduser email name drink_counter  | token*  |

* Campos obrigatórios

***
 
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

Por meio do uso de alguns componentes externos foi possível auxiliar na **Estruturação** do *Projeto*, como por exemplo o compontente [coffeecode/router](https://packagist.org/packages/coffeecode/router). As Rotas API foram criadas para tal finalidade e consumidas através do [Postman](https://www.postman.com/). Um Modelo Entidade Relacionamento (MER) foi construído para mapear o problema e, por meio dele, criado as Classes necessárias.

<p align="center"><img src="https://github.com/thiagobs-webdev/stautrh/blob/master/_modeling/db/DeepinScreenshot_select-area_20200614204928.png" width="600"></p>

Por meu do **SGBD** [MariaDB](https://mariadb.org/) foi criado o Banco de Dados necessário para armazenar as informções. A criação da *Tabelas* foi por meu do seguinte *SQL*:

```sql
-- Delete Tables
DROP TABLE IF EXISTS `drinks`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table drinks
CREATE TABLE `drinks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `amount_ml` int(11) unsigned NOT NULL,
  `drink` varchar(255) NOT NULL DEFAULT 'Água',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `drink_user` (`user_id`),
  CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

```

Para obter sucesso nas *rotas API*, *Email e Senha* (token) foi inserido no **Headers** das requisições pertinentes.
Por meio do [Postman](https://www.postman.com/) foi-se criando o **collection** necessário para consumir e testar as **rotas** desenvolvidas.

Páginas *Views* foram criadas para acompanhar os resultados das *Resquisições* da *API*. O Acesso às essas páginas se dá por meio da URL basse do instalação (**url/**).

## Instalação

1: Clone este repositório em seu Servidor

2: Configure o arquivo `source/Boot/Config` com os dados de suas configurações: 

>   URL -> Url resultante de sua instalação
>   DB -> Dados de Seu Banco de Dados
> - Rode o *SQL* contido neste repositório para criação da *Tabelas*. [SQL](https://github.com/thiagobs-webdev/stautrh/blob/master/_modeling/db/stautrh.sql)

3: Instale as depedências: `composer install`

4: Salve o arquivo Postman Collection **StautRH.postman_collection.json**: [Aquivo no Repositório](https://github.com/thiagobs-webdev/stautrh/blob/master/_files/StautRH.postman_collection.json)

5: Abra/Importe  o arquivo Postman Collection **StautRH.postman_collection.json** em seu programa *Postman*

6: Salve o arquivo de Ambiente (Environment) **StautRH_Test.postman_environment.json**: [Aquivo no Repositório](https://github.com/thiagobs-webdev/stautrh/blob/master/_files/StautRH_Test.postman_environment.json)

7: Abra/Importe  o arquivo de Ambiente (Environment) **StautRH_Test.postman_environment.json** em seu programa *Postman*

> - Substitua os dados para de adequar ao seu Ambiente

9: Com os Arquivos **Postman Collection** e **Ambiente (Environment)** importados, basta apenas consumir a API

10: Acompanhe o Resultado nas *Views* nas URL base do projeto.

Boa Sorte \o/


## Considerações Finais

A execução deste projeto pode ser obtido online em [https://www.stautrh.thiagobs.me/](https://www.stautrh.thiagobs.me/).
Para consumir a API deste link online, basta apenas Salvar/Importar o **Postman Collection** ([Aquivo no Repositório](https://github.com/thiagobs-webdev/stautrh/blob/master/_files/StautRH.postman_collection.json)) e ****Ambiente (Environment)**** [Aquivo no Repositório](https://github.com/thiagobs-webdev/stautrh/blob/master/_files/StautRH_Test.postman_environment.json). Não há necessidade de alterar os arquivo, basta apenas importá-los no *Postman* e consumir na API.
