# Sitio Web Personal Administrable

Aplicación web desarrollada con PHP que permite presentar información personal y gestionar dinámicamente el contenido del sitio mediante una base de datos MySQL.

El proyecto fue desarrollado como parte de un proyecto universitario y está orientado a integrar conceptos de desarrollo web, manejo de bases de datos y administración de contenido.

## Descripción

El sistema combina las características de un sitio personal y un pequeño gestor de contenido. La información presentada al visitante se obtiene desde una base de datos, permitiendo mantener actualizado el contenido sin necesidad de modificar directamente las páginas del sitio.

Entre los contenidos que puede manejar el sistema se encuentran:

- Información personal y de presentación.
- Datos académicos.
- Fotografías e imágenes.
- Información de contacto.
- Contenido relacionado con la trayectoria y conocimientos del usuario.

## Tecnologías utilizadas

- **PHP** — Lógica del servidor y procesamiento de la aplicación.
- **HTML5** — Estructura de las páginas.
- **CSS3** — Diseño y presentación visual.
- **MySQL** — Almacenamiento y gestión de datos.
- **Apache** — Servidor web utilizado durante el desarrollo.
- **XAMPP** — Entorno local para ejecutar Apache y MySQL.
- **Visual Studio Code** — Editor utilizado para el desarrollo.
- **GitHub Desktop** — Gestión del repositorio y control de versiones.

## Arquitectura general

La aplicación utiliza una arquitectura web del lado del servidor:

```text
Usuario
   │
   ▼
Navegador web
   │
   ▼
Apache
   │
   ▼
Aplicación PHP
   │
   ▼
MySQL