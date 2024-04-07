# StoreBox
**Sistema CRUD con autenticación de usuario**

Este es un proyecto de Laravel que permite crear y guardar registros de almacenes y productos relacionados.

## Configuración del Sistema

1. Ejecute `npm install` para instalar las dependencias de Node.js.
2. Después de instalar las dependencias, ejecute `npm run dev` para compilar los activos.
3. Ejecute el comando `php artisan serve` para iniciar el servidor de desarrollo de Laravel.

## Seeders de la Base de Datos

Si desea utilizar seeders para generar registros de almacenes y productos de ejemplo, puede hacerlo utilizando los siguientes comandos:

`php artisan db:seed --class=AlmacenesSeeder`
`php artisan db:seed --class=ProductosSeeder`

Ademas, recuerde configurar los siguientes apartadoe en el archivo `.env` para el correcto funcionamiento del sistema.

DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
