# 🐘 Meu Pet Sumiu
Projeto desenvolvido na disciplina de Técnicas de Programação 1 da Fatec de Jahu.

## 🚀 Instalação das dependências:
Este projeto utiliza o [Composer](https://getcomposer.org/) como gerenciador de dependências em PHP.

### 1. Instalar o Composer
Antes de tudo, certifique-se de que o Composer está instalado na sua máquina:
```
composer -V
```
Se não estiver instalado, baixe em: [https://getcomposer.org/download/](https://getcomposer.org/download/).

### 2. Instalar as dependências do projeto

Após clonar este repositório, acesse a pasta do projeto e rode:
```
composer install
```
Isso irá baixar todas as bibliotecas definidas no `composer.json` para a pasta `vendor/`.

### 3. Dependências principais

* [PHPMailer](https://github.com/PHPMailer/PHPMailer) — envio de e-mails.
* [phpdotenv](https://github.com/vlucas/phpdotenv) — configuração de variáveis de ambiente.

## ⚙️ Variáveis de ambiente:
Crie um arquivo `.env` na raiz do projeto e configure as variáveis de ambiente do [.env.example](.env.example).