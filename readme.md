# Tarea Plugin

Este plugin para WordPress tiene como objetivo reemplazar ciertas palabras dentro del contenido de las publicaciones por otras palabras definidas. Este es un primer paso en la construcción de un plugin más complejo que utilizará la base de datos de WordPress y permitirá la configuración desde el panel de administración.

## Uso

1. Descarga el código del plugin o clona este repositorio en el directorio `wp-content/plugins/` de tu instalación de WordPress.
2. Activa el plugin desde el panel de administración de WordPress.

## Funcionamiento

### Archivo Principal (`tarea-plugin.php`)

El archivo principal del plugin contiene las siguientes funciones:

#### `word_replacer_get_words()`

Esta función devuelve un array que mapea las palabras a reemplazar con sus sustitutos.

#### `word_replacer_replace_words($text)`

Esta función utiliza `str_ireplace()` para recorrer el contenido del post y reemplazar las palabras definidas en el array devuelto por `word_replacer_get_words()`.

#### `add_filter('the_content', 'word_replacer_replace_words')`

Engancha la función `word_replacer_replace_words` al hook `the_content`, permitiendo que el plugin realice los reemplazos de palabras en el contenido de las publicaciones.


Para personalizar las palabras a reemplazar, modifica el array devuelto por `word_replacer_get_words()` en el archivo `tarea-plugin.php`.
