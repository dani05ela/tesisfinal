# Proyecto Tesis

Este proyecto es una aplicación desarrollada en PHP con CodeIgniter 4 y utiliza PostgreSQL como base de datos.

## Requisitos

- PHP 8.0 o superior
- Composer
- PostgreSQL instalado y configurado
- Extensiones de PHP para PostgreSQL habilitadas
- XAMPP (para ejecutar Apache y PostgreSQL en local)

## Instalación

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/usuario/tesisfinal.git
   ```

2. Renombrar la carpeta `tesisfinal` a `tesis`:
   ```bash
   mv tesisfinal tesis
   ```

3. Ingresar al directorio del proyecto:
   ```bash
   cd tesis
   ```

4. Instalar las dependencias de Composer:
   ```bash
   composer install
   ```

5. Probar la conexión a la base de datos con el siguiente comando:
   ```bash
   php spark db:table
   ```

6. Para depurar errores, agregar un archivo `.env` en la raíz del proyecto con el siguiente contenido:
   ```bash
   CI_ENVIRONMENT=development
   ```

7. Crear en la raíz del proyecto la carpeta `assets` y dentro de ella las carpetas `almacenamiento` y `almacenamientoUpdate`:
   ```bash
   mkdir -p assets/almacenamiento assets/almacenamientoUpdate
   ```
   Mediante consola o directo creando la carpeta en VisualStudioCode
## Uso

Para ejecutar el proyecto en XAMPP:
1. Iniciar Apache desde el panel de control de XAMPP.
2. Acceder al sistema en la siguiente URL:
   ```
   http://localhost/tesis/inicio
   ```

## Notas
- Asegúrese de que el puerto de PostgreSQL configurado en `.env` es el correcto.
- Verifique que el servidor de base de datos esté en ejecución antes de probar la conexión.

