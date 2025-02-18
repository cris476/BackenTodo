# 🛠 Configuración de Laravel 8

Este proyecto usa **Laravel 8** como backend para gestionar las tareas de una aplicación To-Do. A continuación, se detallan los pasos para configurar el entorno correctamente.

---

## 🚀 Instalación y Configuración del Entorno

### 🔹 1. Requisitos Previos

Antes de comenzar, asegúrate de tener instalados los siguientes requisitos:

-   **PHP 7.4 a 8.1**

    -   📌 [Descargar PHP](https://www.php.net/downloads.php) _(PHP 8.1 es compatible con Laravel 8)_

-   **Composer** (gestor de dependencias de PHP)

    -   📌 [Descargar Composer](https://getcomposer.org/download/)

-   **MySQL o SQLite**
    -   📌 [Descargar XAMPP](https://www.apachefriends.org/es/download.html) _(Incluye MySQL para gestionar la base de datos)_

---

## 🛠 Configuración de `php.ini`

Para que Laravel funcione correctamente, es necesario habilitar ciertas extensiones en **PHP**.

1️⃣ **Ubicar el archivo `php.ini`**

-   Si usas **XAMPP**, lo encuentras en:
    ```
    C:\xampp\php\php.ini
    ```
-   Si usas **PHP independiente**, puedes encontrar su ubicación ejecutando en la terminal:
    ```sh
    php --ini
    ```

2️⃣ **Habilitar extensiones necesarias**

-   Abre `php.ini` con un editor de texto.
-   **Busca y descomenta** (quita `;` al inicio) las siguientes líneas:

    ```ini
    extension=openssl
    extension=pdo_mysql
    extension=fileinfo
    extension=mbstring
    extension=tokenizer
    extension=ctype
    extension=json
    extension=bcmath
    extension=zip
    ```

3️⃣ **Guardar y reiniciar Apache**

-   Si usas XAMPP, reinicia Apache desde el Panel de Control.

---

## 📌 Verificación de Instalación

Ejecuta los siguientes comandos para asegurarte de que todo está correctamente instalado:

```sh
php -v         # Verifica la versión de PHP instalada
composer -V    # Verifica que Composer está correctamente instalado

composer create-project --prefer-dist laravel/laravel:^8.0 nombre-del-proyecto
cd mi-app
cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=to_do_db   # Nombre de la base de datos
DB_USERNAME=root
DB_PASSWORD=           # Si tienes contraseña, introdúcela aquí; por defecto, está vacío

php artisan key:generate    #Laravel necesita una clave única para el cifrado de datos. Para generarla, ejecuta:
php artisan migrate  #para las tablas de la bade de datos
php artisan serve   # para ejecutar el servidor 
```
