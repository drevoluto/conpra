<?php
/**
 * LOOP
 * WP_Query, get_posts, get_children, etc
 */

/**
 * Loop
 *
 * @param string
 * @param int
 * @return mixed
 **/
function custom_loop(
  $post_type,
  $paged = NULL,
  $meta_query = FALSE,
  $posts_per_page = NULL)
{
  if(!isset($paged)) {
    if(get_query_var('paged'))
    {
      $paged = get_query_var('paged');
    }
    elseif(get_query_var('page'))
    {
      $paged = get_query_var('page');
    }
    else
    {
      $paged = 0;
    }
  }

  if($meta_query)
  {
    $meta_query = array(
      'relation' => 'OR',
      array(
        'key'     => $meta_queryarray['key'],
        'value'   => $meta_queryarray['value'],
        'compare' => '='
      ),
    );
  }
  $posts = new WP_Query(array(
    'post_status' => 'publish',
    'post_type' => $post_type,
    'posts_per_page' => (isset($posts_per_page) ? $posts_per_page : get_option('posts_per_page')),
    'paged' => $paged,
    'meta_query' => $meta_query
  ));
  wp_reset_postdata();
  return (!empty($posts->posts)) ? $posts->posts : FALSE;
}





/**
 * Lista subpaginas de uma pagina
 *
 * @param int - ID
 * @param string - post_type
 * @return mixed - array or false
 **/
function subpaginas($ID, $post_type = 'page')
{
  $my_wp_query = new WP_Query();
  $pages = $my_wp_query->query(array(
    'posts_per_page' => -1,
    'post_type' => $post_type,
    'orderby'   => 'menu_order',
    'order'     => 'ASC'
  ));
  $page =  get_post($ID);
  $children = get_page_children( $page->ID, $pages );

  // wp_reset_postdata();
  return (!empty($children)) ? $children : FALSE;
}

?>
