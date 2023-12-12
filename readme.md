# Examen Plugin

Este plugin para WordPress tiene como objetivo contar las palabras del contenido de una publicaciónertas palabras dentro del contenido de las publicaciones por otras palabras definidas.

## Uso

1. Descarga el código del plugin o clona este repositorio en el directorio `wp-content/plugins/` de tu instalación de WordPress.
2. Activa el plugin desde el panel de administración de WordPress.

## Funcionamiento

### Archivo Principal (`tareaPlugin.php`)

El archivo principal del plugin contiene las siguientes funciones:

#### `word_count($content)`

Esta función devuelve el contenido de la publicación y además muestra al final el número de palabras que contiene.

#### `add_filter('the_content', 'word_count')`

Engancha la función `word_count` al hook `the_content`, permitiendo que el plugin cuente el total de palabras del contenido de las publicaciones.


