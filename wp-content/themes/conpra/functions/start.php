<?php
/**
 * START
 * Inicializa o tema
 */

// Registra extensoes adicionais
function register_additional_extensions($mime_types) {
  $mime_types['epub'] = 'application/xhtml+xml';
  $mime_types['mobi'] = 'application/x-mobipocket-ebook';
  $mime_types['json'] = 'application/json';
  return $mime_types;
}
add_filter('upload_mimes', 'register_additional_extensions', 1, 1);


function de_script() {
  wp_dequeue_script('jquery');
  wp_deregister_script('jquery');
  wp_dequeue_script('bp-legacy-js');
  wp_deregister_script('bp-legacy-js');
}

/**
 * Inicializa!
 **/
function theme_setup()
{
  add_theme_support('post-thumbnails');
  add_filter('gform_confirmation_anchor', create_function('', 'return false;'));

  if (!is_admin()) {
    add_filter('show_admin_bar', '__return_false');
  }

  // add_action( 'wp_print_scripts', 'de_script', 100 );
}
add_action('init', 'theme_setup');
?>
