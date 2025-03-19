# Proyecto de Autenticación

Este proyecto es una aplicación de autenticación construida con PHP y MySQL.

## Características

- **Registro de Usuarios**: Permite a los usuarios crear una cuenta nueva.
- **Inicio de Sesión**: Los usuarios pueden iniciar sesión con su nombre de usuario y contraseña.
- **Recuperación de Contraseña**: Funcionalidad para recuperar la contraseña a través del correo electrónico.
- **Protección de Rutas**: Acceso restringido a ciertas páginas solo para usuarios autenticados.
- **Cifrado de Contraseñas**: Las contraseñas se almacenan de forma segura utilizando hashing.
- **Validación de Entradas**: Validación de datos del usuario para prevenir inyecciones SQL y otros ataques.
- **Interfaz Amigable**: Diseño simple y fácil de usar para una mejor experiencia del usuario.
- **Notificaciones por Correo**: Envío de correos electrónicos para confirmación de registro y recuperación de contraseña.

## Requisitos

- PHP >= 7.4
- MySQL
- XAMPP
- Papercut (https://github.com/ChangemakerStudios/Papercut-SMTP/releases)

## Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/franklg1911/autenticacion.git
   ```
2. Navega al directorio del proyecto:
   ```bash
   cd autenticacion
   ```
3. Configura la base de datos:
   - Crea una base de datos en MySQL.
   - Importa el archivo `script.sql` en tu base de datos.
4. Configura el archivo `config.php` con tus credenciales de base de datos.

## Uso

1. Inicia XAMPP y asegúrate de que Apache y MySQL estén corriendo.
2. Abre tu navegador y navega a:
   ```
   http://localhost/autenticacion/login.php
   ```

## Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.
