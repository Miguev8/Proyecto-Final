# Plataforma de Retos Personales

Sistema web desarrollado con Laravel 12 para administrar retos personales, participantes y actividades con control de acceso por roles.

## Funcionalidades

- Autenticación con Laravel Breeze.
- Gestión de retos con CRUD completo.
- Gestión de participantes y actividades con permisos de administrador.
- API REST para retos.
- Panel con navegación diferenciada por rol.
- Base de datos relacional con migraciones y seeders.

## Tecnologías

- Laravel 12
- PHP 8.2+
- Blade
- Tailwind CSS
- Alpine.js
- MySQL

## Requisitos

- PHP 8.2 o superior
- Composer
- Node.js y npm
- MySQL

## Instalación

1. Clona el repositorio.
2. Instala dependencias de PHP con `composer install`.
3. Instala dependencias de frontend con `npm install`.
4. Copia `.env.example` a `.env` y configura la base de datos MySQL.
5. Genera la clave de la app con `php artisan key:generate`.
6. Ejecuta migraciones y seeders con `php artisan migrate --seed`.
7. Compila los assets con `npm run build` o `npm run dev`.

## Credenciales de prueba

Se generan usuarios de demostración con los seeders.

- Administrador: `admin@example.com`
- Usuario: `usuario@example.com`
- Contraseña: `password`

## Estructura principal

- `app/Models`: modelos Eloquent.
- `app/Http/Controllers`: controladores web y API.
- `database/migrations`: esquema de base de datos.
- `database/seeders`: datos de prueba.
- `resources/views`: vistas Blade.
- `routes/web.php`: rutas web.
- `routes/api.php`: rutas API.

## Documentación

La documentación completa del proyecto está en la carpeta [docs](docs).

## Estado del proyecto

El repositorio está inicializado, versionado en Git y publicado en GitHub.
