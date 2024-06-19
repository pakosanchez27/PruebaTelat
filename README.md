# Registro de Usuarios en CodeIgniter 4

Para comenzar a registrar usuarios en una aplicación desarrollada con CodeIgniter 4, es necesario preparar la base de datos ejecutando ciertos comandos en la línea de comandos. A continuación, se detallan los pasos necesarios:

## 1. Ejecutar Migraciones

El primer paso es ejecutar las migraciones para crear las tablas necesarias en la base de datos. Esto se logra con el siguiente comando:

```bash
php spark migrate

``` 
Esto con el fin de cargar la base de datos, y posteriormente el comando

```bash
php spark db:seed TiposUsuariosSeeder

``` 

Para llenar la tabla de Tipos de usaurio .