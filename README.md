# Plugin de WordPress: Cambiador de Palabras Soeces con Base de datos

Este plugin de WordPress está diseñado para reemplazar palabras soeces por sus equivalentes más suaves en el contenido del sitio web.

## Uso

### Definición de palabras

El plugin define dos conjuntos de palabras: `$soeces` y `$eufemismos`.
- `$soeces` contiene las palabras soeces.
- `$eufemismos` contiene los equivalentes suaves de las palabras soeces.

### Creación de tabla en la base de datos

Al activar el plugin, se ejecutan dos funciones:

1. `creartabla()`: Esta función crea una tabla en la base de datos de WordPress para almacenar los pares de palabras soeces y sus equivalentes suaves.

2. `insertarfilas()`: Esta función inserta los valores de las palabras soeces y sus equivalentes suaves en la tabla creada, si la tabla está vacía.

### Funciones de manipulación

- `cosultar_registros()`: Consulta los registros de la tabla creada en la base de datos y devuelve los datos.

- `cambiarpalabras($text)`: Reemplaza las palabras soeces por sus equivalentes suaves en el contenido del sitio web. Obtiene los datos de la tabla y reemplaza las palabras en el texto proporcionado.

### Aplicación en el contenido

El filtro `the_content` está configurado para aplicar la función `cambiarpalabras` al contenido, reemplazando las palabras soeces por sus equivalentes suaves.

## Instrucciones de instalación

1. Descarga el archivo `bd-plugin.php`.
2. Coloca el archivo en la carpeta de plugins de tu instalación de WordPress (`wp-content/plugins/`).
3. Activa el plugin desde el panel de administración de WordPress.

## Notas importantes

- Las palabras soeces y sus equivalentes suaves se definen en los arrays `$soeces` y `$eufemismos`. Puedes editar estos arrays según tus necesidades.
- Este plugin crea una tabla en la base de datos al activarse, asegúrate de tener permisos adecuados para modificar la base de datos.



## Autor Miguel Mariño Martinez

