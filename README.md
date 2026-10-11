# City Farmac

Proyecto de **Producción Web — Analista de Sistemas**.  
**Instancia 1: Template y vistas**.

Aplicación web de demostración para una cadena ficticia de farmacias y perfumerías. Incluye un sitio público y un panel administrativo con diseños y navegación independientes.

## Requisitos

- PHP 8.0 o superior.
- Servidor local capaz de ejecutar PHP (por ejemplo, Laragon con Apache).
- Navegador web actualizado.

**No es necesario configurar MySQL o MariaDB para esta instancia.** Los datos se cargan desde archivos PHP de ejemplo.

## Cómo ejecutar el proyecto

### Con Laragon

1. Copiar la carpeta `city-farmac` dentro de `C:\laragon\www\`.
2. Iniciar Laragon y los servicios del servidor web.
3. Abrir `http://city-farmac.test/index.php` si están habilitados los dominios locales automáticos de Laragon. Según la configuración, también puede utilizarse `http://localhost/city-farmac/index.php`.
4. Para abrir el panel administrativo, ingresar a `http://city-farmac.test/admin.php` (o a la ruta equivalente con `localhost`).

### Ruta base

La ruta base se calcula automáticamente en `config/config.php`, utilizando `$_SERVER['SCRIPT_NAME']`, y queda disponible en la constante `BASE_URL`. Esta constante se utiliza en los enlaces, imágenes y archivos CSS. No es necesario modificarla normalmente al cambiar la carpeta del proyecto.

## Vistas del sitio público

| Vista | URL relativa |
| --- | --- |
| Inicio y productos destacados | `/index.php` |
| Catálogo de productos | `/index.php?page=productos` |
| Detalle de producto (ejemplo: ID 1) | `/index.php?page=detalle&id=1` |
| Contacto | `/index.php?page=contacto` |
| Página 404 de demostración | `/index.php?page=pagina-inexistente` |

En el catálogo se pueden filtrar productos por categoría, subcategoría y marca, además de ordenarlos por destacados, ranking, A-Z o Z-A.

## Vistas del panel administrativo

| Vista | URL relativa |
| --- | --- |
| Inicio de sesión | `/admin.php` o `/admin.php?page=login` |
| Registro | `/admin.php?page=registro` |
| Inicio del panel | `/admin.php?page=inicio` |
| Administración de productos | `/admin.php?page=productos` |
| Alta de producto (simulada) | `/admin.php?page=productos&accion=crear` |
| Modificación de producto (ejemplo: ID 1) | `/admin.php?page=productos&accion=editar&id=1` |
| Categorías y subcategorías | `/admin.php?page=categorias` |
| Subcategorías de Farmacia (ejemplo) | `/admin.php?page=categorias&padre=1` |
| Marcas | `/admin.php?page=marcas` |
| Comentarios | `/admin.php?page=comentarios` |
| Usuarios | `/admin.php?page=usuarios` |
| Perfiles | `/admin.php?page=perfiles` |

Las secciones administrativas incluyen tablas, formularios, filtros y acciones demostrativas, según corresponda.

## Acceso de demostración

El inicio de sesión **no comprueba credenciales** en esta instancia. Se puede ingresar con cualquier correo electrónico de formato válido y una contraseña no vacía. El formulario dirige al inicio del panel para facilitar la evaluación de las vistas.

**Esto no constituye autenticación ni control de permisos real.** También es posible acceder directamente a la URL de las vistas administrativas. Los perfiles y permisos son datos de ejemplo y todavía no restringen accesos.

## Datos y alcance de esta entrega

Los productos, categorías, marcas, comentarios, usuarios y perfiles de ejemplo se encuentran en `data/`. El modelo de producto está en `models/Producto.php`. La lógica de preparación y filtrado se organiza en `controllers/`, y la presentación en `views/`.

- `views/layouts/public/` y `views/layouts/admin/` contienen los elementos compartidos de cada entorno.
- `views/components/` contiene piezas reutilizables, como las tarjetas de producto y los avisos administrativos.
- `assets/css/` contiene estilos globales y de páginas específicas; `assets/img/` contiene imágenes.

**Fuera del alcance de la Instancia 1:** persistencia en base de datos, ABM real, envío real de formularios, inicio de sesión seguro y autorización por perfiles. Estas funcionalidades están previstas para las instancias siguientes.

## Git

El desarrollo se realiza en la rama `develop`, registrando cambios mediante commits progresivos. La rama `master` se mantiene separada.

Repositorio GitHub: `https://github.com/tomysantomingo/city-farmac/tree/develop`