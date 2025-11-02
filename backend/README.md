# 🧩 Task Manager API – Laravel 10 + Sanctum

Uma API RESTful desenvolvida com **Laravel** para gerenciamento de tarefas (**CRUD de Tasks**) com **autenticação de usuários via Laravel Sanctum**.  
Cada usuário tem acesso apenas às suas próprias tarefas.

---

## 🚀 Funcionalidades

* Cadastro e login de usuários  
* Autenticação com **token Sanctum**  
* CRUD completo de tarefas:
- Criar (`POST /tasks`)
- Listar (`GET /tasks`)
- Visualizar uma (`GET /tasks/{id}`)
- Atualizar (`PUT /tasks/{id}`)
- Excluir (`DELETE /tasks/{id}`)
* Cada usuário só pode acessar suas próprias tarefas  
* Campos da tarefa: `title`, `description`, `completed` (boolean)

---

## 🧱 Tecnologias usadas

- **PHP 8.2+**
- **Laravel 10**
- **Laravel Sanctum**
- **Mysql** 
- **Composer**
- **Postman** (para testes de API)

---

## ⚙️ Instalação e configuração

### 1️⃣ Clonar o projeto
```bash
git clone https://github.com/seuusuario/testando.git
cd testando/backend
```

### 2️⃣ Instalar dependências
```bash
composer install
```

### 3️⃣ Configurar o ambiente
Copie o arquivo `.env.example`:
```bash
cp .env.example .env
```

Gere a chave da aplicação:
```bash
php artisan key:generate
```

Configure o banco de dados no `.env`  
Exemplo com mysql:
```
DB_CONNECTION=mysql
DB_DATABASE=taskmanager
```
### 4️⃣ Rodar as migrations e seeders
```bash
php artisan migrate --seed
```

Isso cria um **usuário de teste**:
```
email: test@example.com
password: password
```

### 5️⃣ Iniciar o servidor
```bash
php artisan serve
```

A API estará disponível em  
👉 `http://127.0.0.1:8000`

---

## 🔐 Autenticação (Laravel Sanctum)

Após registrar ou logar, o backend retorna um **token**.  
Use-o no Postman para acessar as rotas protegidas.

### 📤 Enviar token no Postman:
Na aba **Authorization**, escolha:
```
Type: Bearer Token
Token: <seu_token_aqui>
```
ou adicione no Header:
```
Authorization: Bearer <seu_token_aqui>
```

---

## 🧭 Rotas da API

### 🔓 Públicas
| Método | Rota | Descrição |
|--------|-------|------------|
| `POST` | `/api/register` | Registrar novo usuário |
| `POST` | `/api/login` | Fazer login e receber token |

### 🔒 Protegidas (requer token)
| Método | Rota | Descrição |
|--------|-------|------------|
| `POST` | `/api/logout` | Logout (revoga o token) |
| `GET` | `/api/tasks` | Lista todas as tarefas do usuário logado |
| `POST` | `/api/tasks` | Cria uma nova tarefa |
| `GET` | `/api/tasks/{id}` | Mostra detalhes de uma tarefa |
| `PUT` | `/api/tasks/{id}` | Atualiza título, descrição ou status |
| `DELETE` | `/api/tasks/{id}` | Deleta uma tarefa |


## 🧪 Testar no Tinker

Para ver os usuários ou tarefas diretamente no terminal:
```bash
php artisan tinker
>>> App\Models\User::all();
>>> App\Models\Task::all();
```

---

## 💡 Estrutura do Projeto

```
backend/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── Api/
│   │           ├── AuthController.php
│   │           └── TaskController.php
│   ├── Models/
│   │   ├── User.php
│   │   └── Task.php
│   └── Providers/
├── database/
│   ├── migrations/
│   └── seeders/
├── routes/
│   └── api.php
├── .env
└── composer.json
```

---


