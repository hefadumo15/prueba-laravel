# Pasos para la instalación del proyecto en desarrollo local

1. Clonar el repositorio de GitHub

```bash
git clone https://github.com/hefadumo15/prueba-laravel.git
```

2. Acceder a la carpeta del repositorio

```bash
cd prueba-laravel
```

3. Instalar dependencias

```bash
composer install
```

4. Copiar .env.example a .env

```bash
cp .env.example .env
```

5. Generar key de la aplicación y limpiar cache

```bash
php artisan key:generate
php artisan config:cache
composer dump-autoload
```

6. Configurar la base de datos en el archivo .env

7. Ejecutar las migraciones junto a los seeders

```bash
php artisan migrate  --seed
```

8. Ejecutar el servidor de desarrollo

```bash
php artisan seve
```

## Y listo!!!