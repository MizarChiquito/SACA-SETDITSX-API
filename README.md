<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://setditsx.com.mx/wp-content/uploads/2023/09/1.png" width="400" alt="Laravel Logo"></a></p>




## INSTALAR PRIMERO DOCKER DESKTOP, WSL(UBUNTU) Y PHP STORM DE AHI SEGUIR LOS SIGUIENTES PASOS:


 1. Clonar el Repositorio
El desarrollador debe clonar tu proyecto API en su entorno WSL.

- Navegar a la ubicación deseada en WSL (ej., /home/su_usuario/Code/).
- git clone https://github.com/MizarChiquito/SACA-SETDITSX-API.git
- cd SACA-SETDITSX-API

 2. Configurar el Entorno Docker (Laravel Sail) 
Dado que no subiste archivos grandes o sensibles, ahora deben instalar y levantar el entorno.

Copiar el archivo .env: El archivo .env contiene claves de seguridad y credenciales de base de datos que no se subieron a Git. El desarrollador debe copiar la plantilla:

COMANDOS WSL:
cp .env.example .env

Instalar Dependencias y Levantar Contenedores: Este comando es mágico. Sail automáticamente instalará las dependencias de PHP y levantará los servicios (PHP, Nginx, MySQL, etc.) definidos en docker-compose.yml.

COMANDOS WSL:
./vendor/bin/sail up -d

Deberia quedar un contenedor en Docker:
<img width="1914" height="1015" alt="image" src="https://github.com/user-attachments/assets/590eeb1c-8c96-4275-9b59-156669f160c7" />




Instalar Clave de Aplicación y Migraciones: Una vez que los contenedores estén corriendo, deben generar la clave de la aplicación y crear la base de datos (si no lo hace el paso anterior):

COMANDOS WSL:
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate





OJO al hacer commits y pushes jamas seleccionen los archivos sensibles como el .env

<img width="605" height="68" alt="image" src="https://github.com/user-attachments/assets/98b91908-6aff-4a57-83d9-283af78328b7" />

Ahi es donde esta la API key y otros datos sensibles

## NOTA: SOLO SELECCIONEN PARA EL COMMIT LOS ARCHIVOS QUE MODIFICARON QUE NO SEAN LOS QUE INICIAN CON "."







<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
