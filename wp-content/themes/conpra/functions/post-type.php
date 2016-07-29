<?php
/**
 * POST TYPES
 * Registro dos post-types
 */

/**
 * Registra o post
 *
 * @return void
 */
function register_post_type_projeto()
{
  $labels = array(
    'name'                => 'Projetos',
    'singular_name'       => 'Projeto',
    'add_new'             => 'Novo Projeto',
    'add_new_item'        => 'Novo Projeto',
    'edit_item'           => 'Editar Projeto',
    'new_item'            => 'Novo Projeto',
    'all_items'           => 'Todos os Projetos',
    'view_item'           => 'Visualizar Projeto',
    'search_items'        => 'Buscar Projetos',
    'not_found'           => 'Não há Projetos cadastrados',
    'not_found_in_trash'  => 'Não há Projetos na Lixeira',
    'parent_item_colon'   => '',
    'menu_name'           => 'Projetos'
  );

  $args = array(
    'labels'              => $labels,
    'hierarchical'        => TRUE,
    'taxonomies'          => array(),
    'public'              => TRUE,
    'show_ui'             => TRUE,
    'show_in_menu'        => TRUE,
    'show_in_admin_bar'   => TRUE,
    'menu_position'       => NULL,
    'menu_icon'           => NULL,
    'show_in_nav_menus'   => TRUE,
    'publicly_queryable'  => TRUE,
    'exclude_from_search' => TRUE,
    'has_archive'         => TRUE,
    'query_var'           => TRUE,
    'can_export'          => TRUE,
    'rewrite'             => array('slug' => 'projetos'),
    'capability_type'     => 'page',
    'supports'            => array('title', 'editor', 'excerpt', 'thumbnail')
  );

  register_post_type('projeto', $args);
  flush_rewrite_rules();
}
// add_action('init', 'register_post_type_projeto');

?>
