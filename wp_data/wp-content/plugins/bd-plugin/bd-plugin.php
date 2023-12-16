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

    $table_name = $wpdb->prefix . 'dam';

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
