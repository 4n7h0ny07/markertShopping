<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center" font-size=""> Fassid Soluciones y Servicios</p>

## About MarkertShopping

sistema en desarrollo, pensado para gestionar empresas medianas o pequeñas, el el podras encontras los modulos siguientes

- Registros de personas como clientes, proveedores etc.
- Registros de almacenes, marcas, categorias, productos, etc.
- Manejo de inventario, kardex.
- podras registrar tu compras, ventas al contado y al creadito.
- Llevar un control de los pagos de tus clientes de los creditos.
- podras activar el modo ahorro de un cliente.
- Podras llevar una contabilidad basica.

este sistema esta pesado a mejoras futuras con temas de impuestos Nacionales.

# Proximamente en MarkertShopping

- agreagadremos facturacion computarizada en linea
- Agreagareamos Facturacion electronica en linea 
- cobros mediante codigos Qr

# Contribuyendo

- estamos para contribuir con la sociedad.

## Requisitos
- php ^8.0
- mysql
- Extensiones de php (mbstring, intl, dom, gd, xml, zip, mbstring, mysql)

## Instalación
```
composer install
cp .env.example .env
php artisan prestamos:install
chmod -R 777 storage bootstrap/cache
```