<?php
/**
 * SEARCH
 * Filtros e funcionalidades adicionais da busca
 */

function filtro_busca($query) {
  if(!$query->is_admin && $query->is_search) {
    if($query->query['post_type'] !== NULL AND post_type_exists($query->query['post_type']))
    {
      $post_type = $query->query['post_type'];
    }
    else
    {
      $post_type = array('noticias','publicacoes');
    }
    $query->set('post_type', $post_type);
    $query->set('posts_per_page',-1);
  }
  return $query;
}
// add_filter('pre_get_posts', 'filtro_busca');

?>
