# Simulador de Processamento com Laravel Reverb

Este projeto Laravel é uma prova de conceito para demonstrar o uso do **Laravel Reverb** como servidor WebSocket, permitindo comunicação em tempo real. Ele simula o processamento de arquivos, com um fluxo onde os usuários podem escolher entre autenticação ou uso anônimo antes de interagir com a simulação. A aplicação utiliza **Livewire Volt** para componentes interativos, **Tailwind CSS** com **Vite** para a interface, e **Laravel Sail** para um ambiente de desenvolvimento baseado em Docker. Filas são usadas para processamento assíncrono, complementando a experiência em tempo real.

## Funcionalidades

-   Escolha inicial entre autenticação (login/registro) ou modo anônimo.
-   Formulário de registro de usuários com validação segura.
-   Simulação de processamento de arquivos com feedback em tempo real via WebSockets (Reverb).
-   Processamento assíncrono de tarefas com filas.
-   Interface dinâmica construída com Livewire Volt e estilizada com Tailwind CSS.

## Objetivo

O objetivo principal é demonstrar:

-   A configuração e uso do **Laravel Reverb** para comunicação bidirecional em tempo real.
-   Integração de WebSockets com eventos e broadcasting no Laravel.
-   Um fluxo de autenticação combinado com uma simulação interativa de processamento.

## Pré-requisitos

Para rodar o projeto, você precisa das seguintes ferramentas:

-   [Docker Desktop](https://www.docker.com/products/docker-desktop/) (necessário para o Laravel Sail).
-   [Git](https://git-scm.com/) (para clonar o repositório).
-   [Composer](https://getcomposer.org/) (opcional, para gerenciamento local de dependências PHP).
-   [Node.js](https://nodejs.org/) (opcional, necessário apenas se rodar `npm` fora do Sail).

## Instalação

Siga os passos abaixo para configurar e rodar o projeto localmente:

1. **Clone o repositório**:

    ```bash
    https://github.com/lucasrgoncalves/laravel-reverb && cd laravel-reverb
    ```

2. **Configure o arquivo .env**:

    ```bash
    cp .env.example .env
    ```

    Ajuste as configurações necessárias no arquivo `.env`, especialmente as relacionadas ao banco de dados e ao Reverb:

    ```
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laravel_reverb
    DB_USERNAME=sail
    DB_PASSWORD=password

    REVERB_APP_ID=app-id
    REVERB_APP_KEY=app-key
    REVERB_HOST=127.0.0.1
    REVERB_PORT=8080
    ```

3. **Instale as dependências e em seguida execute o Sail**:

    ```bash
    # Instalar os pacotes do composer e do npm
    composer install && npm install

    # Iniciar Sail e subir os containers
    ./vendor/bin/sail build && ./vendor/bin/sail up -d

    ```

4. **Gere a chave da aplicação**:

    ```bash
    ./vendor/bin/sail artisan key:generate
    ```

5. **Execute as migrações**:
    ```bash
    ./vendor/bin/sail artisan migrate
    ```

## Executando o projeto

Para que a aplicação funcione corretamente, você precisa executar vários serviços simultaneamente.:

1. **Compilar assets (frontend)**:

    ```bash
    ./vendor/bin/sail npm run dev
    ```

2. **Iniciar o servidor Reverb**:

    ```bash
    ./vendor/bin/sail artisan reverb:start
    ```

3. **Iniciar o processamento de filas**:
    ```bash
    ./vendor/bin/sail artisan queue:listen
    ```

## Acessando a aplicação

Após executar todos os serviços acima:

1. Acesse a aplicação em seu navegador:

    - **URL:** [http://localhost](http://localhost)

2. Na tela inicial, você poderá escolher entre:

    - Acessar com login (criando uma conta ou usando uma existente)
    - Continuar como visitante (anônimo)

3. Após acessar, você verá a interface do simulador de processamento de arquivo:
    - Clique no botão "Processar Arquivo" para iniciar uma simulação
    - Observe as atualizações em tempo real via WebSockets
    - Veja as diferentes experiências entre usuários autenticados (canais privados) e anônimos (canais públicos).
