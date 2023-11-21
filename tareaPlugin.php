<?php
/**
 * @package Hello_Words
 * @version 1.0.0
 */
/*
Plugin Name: Tarea PLugin
Plugin URI: http://wordpress.org/plugins/tarea-plugin/
Description: Esto sirve para cambiar unas palabras por otras
Author: Sandra Lopez
Version: 1.0.0
Author URI: http://Sandra.Lopez/
*/

// Define las palabras a reemplazar y sus sustitutos
function word_replacer_get_words() {
    return array(
        'palabra1' => 'sustituto1',
        'palabra2' => 'sustituto2',
        'palabra3' => 'sustituto3',
        'palabra4' => 'sustituto4',
        'palabra5' => 'sustituto5',
    );
}

// Función para reemplazar las palabras en el contenido del post
function word_replacer_replace_words($text) {
    $words_to_replace = word_replacer_get_words();
    foreach ($words_to_replace as $word => $replacement) {
        $text = str_ireplace($word, $replacement, $text);
    }
    return $text;
}

// Engancha la función al hook 'the_content'
add_filter('the_content', 'word_replacer_replace_words');