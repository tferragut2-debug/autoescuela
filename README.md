# autoescuela

## Instalación

1. Importar el archivo SQL `autoescuela.sql` en phpMyAdmin.
2. Colocar todos los archivos PHP en la carpeta `htdocs/autoescuela` de XAMPP.
3. Asegurarse de que `conexion.php` tiene los datos correctos:
   - Servidor: localhost
   - Usuario: root
   - Contraseña: (si no tienes contraseña, dejar vacío)
   - Base de datos: autoescuela

## Uso

- Acceder desde el navegador: http://ip_del_pc/autoescuela/index.php
- Páginas disponibles:
  - Clientes: crear, editar, borrar, listar
  - Profesores: crear, editar, borrar, listar
  - Vehículos: crear, editar, borrar, listar
  - Clases: crear, listar con asignación automática de profesor y vehículo
