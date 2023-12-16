<?php
/*
 * Plugin Name: bd-plugin
 */

$soeces = array(
    "prostituta",
    "maricon",
    "gilipollas",
    "malnacido"
);

$eufemismos = array(
    "persona de alterne",
    "homosexual",
    "imbecil",
    "malcriado"
);

// Función para crear una tabla en la base de datos al activar el plugin
function creartabla()
{
    global $wpdb; // Acceso a la instancia de la base de datos de WordPress


    $charset_collate = $wpdb->get_charset_collate();

    $table_name = $wpdb->prefix . 'dam';// Nombre de la tabla con prefijo de WordPress

    $sql = "CREATE TABLE $table_name (
     id mediumint(9) NOT NULL AUTO_INCREMENT,
     time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
     tonterias varchar(55) NOT NULL,
     eufenismos varchar(55) NOT NULL,
     PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    // Se ejecuta la consulta SQL
    dbDelta( $sql );

}
// Hook para ejecutar la función creartabla al cargar el plugin
add_action('plugin_loaded', 'creartabla');


// Función para insertar filas en la tabla creada
function insertarfilas()
{
    global $eufemismos, $soeces, $wpdb;

    $table_name = $wpdb->prefix . 'dam';

    // Consulta para seleccionar registros de la tabla
    $select_consulta = $wpdb->get_results("SELECT * FROM $table_name");

    // Si no hay registros en la tabla, se insertan los valores de las palabras definidas
    if (count($select_consulta) == 0) {
        for ($i = 0; $i < count($eufemismos); $i++) {
            $wpdb->insert(
                $table_name,
                array(
                    'tonterias' => $soeces[$i],
                    'eufenismos' => $eufemismos[$i]
                )
            );
        }
    }
}
// Hook para ejecutar la función insertarfilas al cargar el plugin
add_action('plugin_loaded', 'insertarfilas');

