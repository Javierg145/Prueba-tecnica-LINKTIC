<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.10.0' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'ASTRA_THEME_ORG_VERSION', file_exists( ASTRA_THEME_DIR . 'inc/w-org-version.php' ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.10.0' );

/**
 * Load in-house compatibility.
 */
if ( ASTRA_THEME_ORG_VERSION ) {
	require_once ASTRA_THEME_DIR . 'inc/w-org-version.php';
}

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_WEBSITE_BASE_URL', 'https://wpastra.com' );

/**
 * ToDo: Deprecate constants in future versions as they are no longer used in the codebase.
 */
define( 'ASTRA_PRO_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'dashboard', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'customizer', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/dark-mode.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

// Enable NPS Survey only if the starter templates version is < 4.3.7 or > 4.4.4 to prevent fatal error.
if ( ! defined( 'ASTRA_SITES_VER' ) || version_compare( ASTRA_SITES_VER, '4.3.7', '<' ) || version_compare( ASTRA_SITES_VER, '4.4.4', '>' ) ) {
	// NPS Survey Integration
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-notice.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-survey.php';
}

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';



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
