<?php 

// En este espacio registramos el Custom Post Type de los libros
function cpt_registrar_libros() {
    $labels = [
        'name'                  => 'Libros',
        'singular_name'         => 'Libro',
        'menu_name'             => 'Libros',
        'name_admin_bar'        => 'Libro',
        'add_new'               => 'Añadir nuevo libro',
        'add_new_item'          => 'Añadir nuevo libro',
        'new_item'              => 'Nuevo libro',
        'edit_item'             => 'Editar libro',
        'all_items'             => 'Todos los libros',
        'view_item'             => 'Ver libro',
        'search_items'          => 'Buscar libros',
        'not_found'             => 'No se han encontra el libro',
        'not_found_in_trash'    => 'No hay libros en la papelera',
    ];
    $args = [
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-book',    
        'supports'           => ['title','editor','thumbnail','excerpt'],
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'libros'],
        'show_in_rest'       => true,                
    ];
    register_post_type('libros', $args);
}
add_action('init', 'cpt_registrar_libros');


// En esta apartado se registra la taxonomía jerárquica de los generos para los libros
function tax_registrar_generos() {
    $labels = [
        'name'              => 'Géneros',
        'singular_name'     => 'Género',
        'menu_name'         => 'Géneros',
        'all_items'         => 'Todos los géneros',
        'edit_item'         => 'Editar género',
        'view_item'         => 'Ver género',
        'update_item'       => 'Actualizar género',
        'add_new_item'      => 'Añadir nuevo género',
        'new_item_name'     => 'Nombre del nuevo género',
        'search_items'      => 'Buscar géneros',
        'not_found'         => 'No se encontraron géneros',
    ];
    $args = [
        'labels'            => $labels,
        'hierarchical'      => true,       // como categorías
        'show_in_menu'      => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'generos'],
    ];
    register_taxonomy('generos', 'libros', $args);
}
add_action('init', 'tax_registrar_generos');


// En este apartado agregamos un metabox para el autor del libro
function libros_agregar_metabox_autor() {
    add_meta_box(
        'libro_autor_meta',         
        'Autor del libro',           
        'libro_autor_callback',      
        'libros',                   
        'side',                     
        'default'                    
    );
}
add_action('add_meta_boxes', 'libros_agregar_metabox_autor');

function libro_autor_callback($post) {
    wp_nonce_field('guardar_autor_libro', 'libro_autor_nonce');
    $valor = get_post_meta($post->ID, '_libro_autor', true);
    echo '<label for="libro_autor">Nombre del autor:</label><br />';
    echo '<input type="text" id="libro_autor" name="libro_autor" ';
    echo 'value="' . esc_attr($valor) . '" style="width:100%;" />';
}

function libro_guardar_autor($post_id) {
    // Verificar nonce
    if ( ! isset($_POST['libro_autor_nonce']) ||
         ! wp_verify_nonce($_POST['libro_autor_nonce'], 'guardar_autor_libro') ) {
        return;
    }
    // Autosave
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    // Permiso
    if ( ! current_user_can('edit_post', $post_id) ) return;

    if ( isset($_POST['libro_autor']) ) {
        update_post_meta(
            $post_id,
            '_libro_autor',
            sanitize_text_field( $_POST['libro_autor'] )
        );
    }
}
add_action('save_post', 'libro_guardar_autor');

// En este apartado agregar el campo de contenido del libro
function libros_agregar_metabox_contenido() {
    add_meta_box(
        'libro_contenido_meta',        
        'Contenido del libro',        
        'libro_contenido_callback',   
        'libros',                    
        'normal',                     
        'default'                    
    );
}
add_action('add_meta_boxes', 'libros_agregar_metabox_contenido');

function libro_contenido_callback($post) {
    wp_nonce_field('guardar_contenido_libro', 'libro_contenido_nonce');
    // Recupera el valor anterior
    $contenido = get_post_meta($post->ID, '_libro_contenido', true);
    // Textarea para editar
    echo '<textarea id="libro_contenido" name="libro_contenido" ';
    echo 'style="width:100%; height:200px;">' . esc_textarea($contenido) . '</textarea>';
}

function libro_guardar_contenido($post_id) {
    // Seguridad: nonce, autosave y permisos
    if (
        ! isset($_POST['libro_contenido_nonce'])
        || ! wp_verify_nonce($_POST['libro_contenido_nonce'], 'guardar_contenido_libro')
        || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        || ! current_user_can('edit_post', $post_id)
    ) {
        return;
    }
    if (isset($_POST['libro_contenido'])) {
        update_post_meta(
            $post_id,
            '_libro_contenido',
            wp_kses_post($_POST['libro_contenido'])
        );
    }
}
add_action('save_post', 'libro_guardar_contenido');

function mostrar_generos_libro() {
    $generos = get_the_terms( get_the_ID(), 'generos' );
    if ( ! empty( $generos ) && ! is_wp_error( $generos ) ) {
        $salida = '<strong>Géneros:</strong> ';
        $links = array();
        foreach ( $generos as $genero ) {
            $links[] = '<a href="' . esc_url( get_term_link( $genero ) ) . '">' . esc_html( $genero->name ) . '</a>';
        }
        $salida .= implode(', ', $links);
        return $salida;
    }
    return '';
}
add_shortcode( 'generos_libro', 'mostrar_generos_libro' );
?>