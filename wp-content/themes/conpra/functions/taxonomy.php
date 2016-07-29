<?php
/**
 * TAXONOMY
 */

/**
 * Registra a taxonomia Segmento
 *
 * @return void
 */
function register_taxonomy_segmentos()
{
  $labels = array(
    'name'               => 'Segmentos',
    'singular_name'      => 'Segmento',
    'search_items'       => 'Buscar Segmentos',
    'all_items'          => 'Todos os Segmentos',
    'parent_item'        => 'Segmento acima',
    'parent_item_colon'  => 'Segmento acima: ',
    'edit_item'          => 'Editar Segmento',
    'update_item'        => 'Atualizar Segmento',
    'add_new_item'       => 'Novo Segmento',
    'new_item_name'      => 'Nome do novo Segmento',
    'menu_name'          => 'Segmentos',
  );

  $args = array(
    'hierarchical'        => FALSE,
    'label'               => 'Segmentos',
    'labels'              => $labels,
    'show_ui'             => TRUE,
    'show_admin_column'   => TRUE,
    'show_in_tag_cloud'   => TRUE,
    'query_var'           => TRUE,
    'rewrite'             => array(
      'slug' => 'segmentos',
      'with_front' => FALSE
    )
  );

  register_taxonomy('segmentos', array('menus'), $args);
  flush_rewrite_rules();
}
// add_action('init', 'register_taxonomy_segmentos');

?>
