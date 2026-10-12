# Site IBBB — Igreja Batista Bíblica Betel

Laravel 11 + MySQL + Tailwind CSS 4 (via Vite).

## Rodando no Windows com XAMPP

Requisitos: XAMPP (PHP 8.2+ e MySQL), Composer e Node.js 20.19+ (ou 22.12+).
O Apache do XAMPP **não** é usado por este projeto; o site roda pelo `php artisan serve`.

| Serviço                | Porta |
|------------------------|-------|
| Site (`artisan serve`) | 8000  |
| Vite (`npm run dev`)   | 5173  |
| MySQL do XAMPP         | 3306  |

### Primeira vez

1. No painel do XAMPP, inicie só o **MySQL**.
2. No phpMyAdmin, crie o banco `ibbb` (collation `utf8mb4_unicode_ci`).
3. Na pasta do projeto:

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
```

### No dia a dia

Dois terminais na pasta do projeto:

```bash
php artisan serve
```

```bash
npm run dev
```

Acesse http://127.0.0.1:8000. Ou rode tudo junto com `composer run dev`.

### Se alguma porta estiver ocupada

- Site: `php artisan serve --port=8001` e ajuste `APP_URL` no `.env`.
- MySQL: ajuste `DB_PORT` no `.env` para a porta do `C:\xampp\mysql\bin\my.ini`.
- Vite: troque `port` em `vite.config.js`.
