# Projeto Laravel

Este projeto foi desenvolvido utilizando **PHP 8.4** e **Laravel 12.16.0**.

---

## ✅ Requisitos Recomendados

- **PHP 8.4** ou superior  
- **PostgreSQL**

---

## ✅ Requisitos Obrigatórios
- **Composer**
- A extensão `fileinfo` habilitada no `php.ini`
- A extensão do PostgreSQL (`pdo_pgsql` ou `pgsql`) também habilitada no `php.ini`

---

## ⚙️ Configuração

1. **Clone o repositório**:
    ```bash
    git clone https://github.com/jottaVictor/todolist.git
    cd <pasta-do-projeto>
    ```

2. **Intale dependências do composer**:

    ```bash
    composer install
    ```
    
2. **Edit as configurações do banco na .env**:

    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=nome_do_banco
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha

3. **Execute**:
    ```bash
    php artisan key:generate
    php artisan migrate
    php artisan serve
    ```
    

4. **Acesse no navegador**:
    ```
    http:/localhost:8000/tarefas
    ```

---