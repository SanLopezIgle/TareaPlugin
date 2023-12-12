<?php

/*
Plugin Name: Examen Plugin
Plugin URI: http://wordpress.org/plugins/tarea-plugin/
Description: Esto sirve para contar las palabras de una publicacion
Author: Sandra Lopez
Version: 1.0.0
Author URI: http://Sandra.Lopez/
*/


// Funcion para contar las palabras de una publicación
function word_count($content) {
    // $post_id = get_the_ID(); // obtener id del post actual
    if (is_single() || is_page()) {
        $contador_palabras = str_word_count(strip_tags($content)); // Cuenta las palabras
        // strip_tags() elimina las etiquetas html para asi devolver el texto sin etiquetas

        //guardar_conteo_palabras($contador_palabras, $post_id);

        $texto_palabra = ($contador_palabras == 1) ? 'palabra' : 'palabras'; // Dependiendo de si es 1 o más palabras, escribo en singular o plural

        $contador_html = '<p>Esta publicación tiene ' . $contador_palabras . ' ' . $texto_palabra . ' sin contar el titulo.</p>';
        $content .= $contador_html;
        // Escribo al final de la publicación la frase de arriba con las palabras que esta contiene
    }

    return $content;
}



// Engancha la función al hook 'the_content'
add_filter('the_content', 'word_count');


function iniciarPlugin (){
    createTable();
    /*
    global $post;
    $post_id = $post->ID;
    //$post_id = get_the_ID(); // obtener ID del post actual
    insertData($post_id);
    */
}

// Creamos nuestra tabla con los datos que nos interesan
function createTable(){
    global $wpdb;

    $table_name = $wpdb->prefix . 'tabla_examen';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        numero_palabras int NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";


    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

function selectData()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'mi_tabla';

    $resultados = $wpdb->get_results("SELECT * FROM $table_name");

    return $resultados;
}

// Función para insertar datos en la base de datos
function insertData($contador_palabras) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'mi_tabla';

    $wpdb->insert(
        $table_name,
        array(
            //'post_id' => $post_id
            'numero_palabras' => $contador_palabras
        ),
        array(
            //'%d',
            '%d'
        )
    );
}

add_action('plugin_loaded', 'iniciarPlugin');

/*
// Funcion para almacenar el conteo de palabras
function guardar_conteo_palabras($post_id){
    global $wpdb;
    $table_name = $wpdb->prefix . 'mi_tabla';

    $wpdb->insert(
        $table_name,
        array(
            //'numero_palabras' => $contador_palabras,
            'post_id' => $post_id
        ),
        array(
            //'%d',
            '%d'
        )
    );
}
*/
