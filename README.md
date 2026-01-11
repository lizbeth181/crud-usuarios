<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Proyecto Laravel + Inertia + React

## Descripción
Este proyecto es una aplicación web desarrollada con **Laravel**, **Inertia.js** y **React**.  
Su objetivo es demostrar la integración de Laravel con React a través de Inertia, incluyendo:  

- Sistema de autenticación (login y registro).  
- Diseño de interfaz profesional y responsiva con **Tailwind CSS**.  
**Gestión de Roles:** Middleware para restringir acceso a administradores.
* **CRUD de Usuarios:** Gestión completa de perfiles (incluyendo teléfono y rol).
* **Exportación:** Botón para exportar lista de usuarios a formato CSV.  
- Páginas dinámicas con contenido principal personalizado.

---

## Tecnologías utilizadas

- [Laravel](https://laravel.com/) (PHP Framework)  
- [Inertia.js](https://inertiajs.com/) (Conector backend-frontend)  
- [React](https://reactjs.org/) (Frontend)  
- [Tailwind CSS](https://tailwindcss.com/) (Estilos)  
- Composer (para dependencias de Laravel)  
- Node.js & npm (para dependencias de frontend)
* **PHP:** >= 8.2
* **Servidor Local:** Laragon, XAMPP o similares.
* **Base de Datos:** MySQL / MariaDB.
---


## Instalación

1. Clonar el repositorio  

```bash
git clone <URL_DEL_REPOSITORIO> && cd nombre-del-proyecto
````

2. Instalar dependencias de PHP (Laravel)

```bash
composer install
```

3. Instalar dependencias de frontend

```bash
npm install && npm run build
```

4. Configurar entorno (.env)

```bash
cp .env.example .env
```

Configurar credenciales de base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_usuarios
DB_USERNAME=root
DB_PASSWORD=
```

5. Preparar la aplicación

```bash
php artisan key:generate
php artisan migrate --seed
```

6. Iniciar el servidor

```bash
php artisan serve
```
mantener encendido
7. en otra terminal 
```bash
npm run dev
```

La aplicación estará disponible en: `http://localhost:8000`

---

## Uso

* Al abrir la página principal se muestra un header con logo a la izquierda y Login/Register a la derecha
* Usuarios autenticados son redirigidos al dashboard
* Botones con efecto hover para mejorar la experiencia de usuario
* Diseño responsivo, se adapta a cualquier tamaño de pantalla

---

## Estructura del proyecto

* `app/Http/Controllers` → Controladores de Laravel
* `resources/js/Pages` → Páginas de React con Inertia
* `resources/js/Layouts` → Layout principal con header y footer
* `resources/css/app.css` → Configuración de Tailwind CSS

---

## Colores y estilo

* Vino profundo: `text-red-800`, `border-red-800`
* Rosa muy tenue: fondo principal `from-pink-50 to-pink-100`
* Tipografía clara y profesional, fácil de leer

---

## Consideraciones

* Proyecto listo para desarrollo local
* Para producción: configurar correctamente base de datos, cache y compilación de assets (`npm run build`)

---

## Autor

Paola Lizbeth Jacuinde Martinez

