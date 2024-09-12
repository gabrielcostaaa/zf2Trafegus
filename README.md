# Desafio Técnico Trafegus - CRUD de Veículos e Motoristas ☑️

Este projeto foi desenvolvido utilizando Zend Framework 2 e Doctrine para implementar um sistema de CRUD de veículos e motoristas.

## 1 Configuração do Projeto

### 1.1 Clone o Repositório
Clone o repositório do projeto em sua máquina local utilizando o Git.

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
```
### 1.2 Instalação das Dependências
Utilize o Composer para instalar todas as dependências necessárias:

```bash
composer install
```

### 1.3 Configuração do Banco de Dados

-> Crie um banco de dados localmente com o nome trafegus.

Execute o seguinte comando para criar o esquema das tabelas:
```bash
bin/doctrine-module orm:schema-tool:create
```

Caso queira ver a lista completa de comandos do Doctrine disponíveis, utilize:

```bash
bin/doctrine-module list
```

### 1.4 Execução do Servidor

Inicie o servidor PHP para rodar o projeto localmente:

```bash
php -S localhost:8080 -t public
```

ou utilize um Xampp hehe

