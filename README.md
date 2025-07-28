# 🎟️ Sistema de Compra e Venda de Ingressos - XAP Cultura

Este é um projeto prático para a criação de um sistema de compra e venda de ingressos e gestão de eventos. 
---

## 💡 Sobre o Projeto e o Processo de Criação

Este projeto foi um grnade desafio para mim, pois ainda tenho pouca experiência na área. Foram 2 semanas trabalhando todo dia 4 horas por dia de segunda à segunda nesse projeto. Ver o resultado final do site é muito gratificante, olhar para trás e ver o tanto que eu aprendi e melhorei graças ao curso do DEV_Evolution e a esse projeto é sensacional.

A ideia do projeto foi sugestão do professor porém eu não teria gostado mais. No TCC que apresentei no Ensino Médio, eu havia idealizado um Aplicativo Mobile feito para eventos culturais que aconteciam pela região de Chapecó o nome era "XAP Cultura", eu fiz toda a parte de pesquisa do artigo que preciávamos entregar, e na apresentação do projeto o Chico Pavin (Gerente de Marketing da IXCSoft) estáva como convidado na banca do TCC, e ele gostou muito desse projeto e ofereceu nos mentorar para realizarmos esse Aplicativo/Portal de eventos, porém na época estava passando por alguns problemas pessoais e me encontrava bem perdido, sem saber o que fazer e para onde ir após o ensino médio, então nunca chegamos a botar em prática. 

Por isso eu acho que esse tema foi perfeito para mim, pude finalmente por em prática um projeto do passado que até então estava abandonado. Não irei parar de seguir melhorando esse projeto, quero corrigir alguns bugs na compra e adicionar mais funcionalidades, como poder gerir o seu perfil, alterar senha, nome, etc. Também já tenho outras ideias de projetos que quero fazer e graças a todo esse conhecimento que adquiri sei que irei conseguir.
---

## ✨ Funcionalidades Implementadas (Checklist)

Aqui está a lista de funcionalidades que foram implementadas no projeto:

-   [x] Estrutura de pastas organizada (Public, Src, Views).
-   [x] Conexão com banco de dados SQLite via PDO.
-   [x] Sistema de Autoload com Composer (PSR-4).
-   [x] **Sistema de Contas com Papéis (Roles):**
    -   [x] Cadastro e Login para Vendedores.
    -   [x] Cadastro e Login para Clientes.
    -   [x] Redirecionamento centralizado para o index.php alterando as funções que cada "papel" pode executar.
-   [x] **CRUD de Eventos/Ingressos (para Vendedores):**
    -   [x] **C**reate: Cadastro de novos eventos com imagem, endereço, categoria, Data do começo e do fim do Evento, etc.
    -   [x] **R**ead: Listagem de eventos criados pelo vendedor logado.
    -   [x] **U**pdate: Edição dos dados de um evento, recebendo todas as informações antes criadas, acessado através das tabelas dos eventos criados.
    -   [x] **D**elete: Exclusão de um evento, acessado através das tabelas dos eventos criados.
    -   [x] Controle de Acesso (um vendedor não pode editar/deletar eventos de outro).
-   [x] **Jornada do Cliente:**
    -   [x] Vitrine com todos os eventos disponíveis.
    -   [x] Sistema de reserva de ingressos com timeout de 2 minutos.
    -   [x] Fluxo de finalização de compra com transação de banco de dados.
    -   [x] Página "Meus Ingressos" para o cliente ver o que comprou, com informações essênciais, como endereço do evento, data do evento, data da compra (fuso horário padrão, não consegui arrumar para o fuso horário de cada Usuário).
-   [x] **Front-End:**
    -   [x] Estilização com CSS em arquivo externo.
    -   [x] Design consistente entre as páginas de formulário e dashboards.

---

## 🚀 Instruções para Rodar o Projeto

Siga os passos abaixo para configurar e rodar o projeto em um ambiente de desenvolvimento local.

### Pré-requisitos
* PHP 8.0 ou superior.
* Servidor web local (XAMPP, WAMP, etc.).
* Composer instalado.
* Git.

### Passo a Passo

1.  **Clonar o Repositório:**
    ```bash
    git clone [URL_DO_REPOSITORIO_NO_GITHUB]
    cd [NOME_DA_PASTA_DO_PROJETO]
    ```

2.  **Instalar Dependências:**
    (Este projeto não usa dependências externas)
    ```bash
    composer install
    ```

3.  **Configurar o Banco de Dados:**
    O projeto usa SQLite, então nenhuma configuração de servidor de banco é necessária. Para criar o arquivo de banco de dados e todas as tabelas, rode o seguinte comando no seu terminal, a partir da pasta raiz do projeto:
    ```bash
    php setup_database.php
    ```
    Isso irá criar o arquivo `database.db` com todas as tabelas necessárias.

4.  **Acessar o Sistema:**
    Abra seu navegador e acesse a URL configurada no seu servidor local (ex: `localhost:8080/Public/index.php`).

---

## Bônus Implementado

* **Histórico de Compras:**  - Na pasta src você irá encontrar a minha pasta Models e dentro dela todas as minhas Classes, a classe 'Compra' tem um método chamado 'mostrarEventoComprado()'. Ele faz um JOIN com a tabela 'Ingressos' para poder mostrar todas as características que o Evento possui, dessa forma ele usa `WHERE compras.id_cliente` para mostrar apenas as compras daquele cliente em específico. E para ordenar ele usa o `ORDER BY compras.data_compra DESC` para mostrar em ordem de compra, da compra mais recente para a mais antiga.


