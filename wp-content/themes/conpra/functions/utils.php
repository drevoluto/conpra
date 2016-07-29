<?php
/**
 * UTILS
 * Funcionalidades utilitarias ou auxiliares
 */
add_filter('show_admin_bar','__return_FALSE');

/**
 * Debug var
 *
 * @param mixed $anything
 */
function debug($anything){
  echo '<pre>';
  var_dump($anything);
  die();
}

if (!function_exists('is_ajax')){
/**
 * Verifica se requisicao atual eh AJAX
 *
 * @return bool
 */
function is_ajax(){
  $doing_ajax = defined('DOING_AJAX') && DOING_AJAX;

  if (!$doing_ajax) {
    $doing_ajax =
    isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
  }

  return $doing_ajax;
}
}


if (!function_exists('is_mobile')){

/**
 * Wrapper para verificar se mobile, usando o proprio WP ou $_GET['force_mobile']
 *
 * @param bool $force_simulate
 * @return bool
 */
function is_mobile($force_simulate = FALSE){
  return $force_simulate ? TRUE : (wp_is_mobile() || isset($_GET['force_mobile']));
}
}

/**
 * Limitador de palavras de uma string
 *
 * @param string $string
 * @param int $word_limit
 * @return string
 **/
function word_limiter($string, $word_limit, $end_char = ' [&#8230;]'){
  $words = explode(" ",$string);
  $imploded = implode(" ",array_splice($words,0,$word_limit));
  return (count($words) < $word_limit) ? $imploded : $imploded.$end_char;
}

/**
 * Limitador de caracteres de uma string
 *
 * @param string $str
 * @param int $n
 * @param string $end_char
 * @return string
 **/
function character_limiter($str, $n = 500, $end_char = '&#8230;'){
  if (strlen($str) < $n){
    return $str;
  }

  $str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

  if (strlen($str) <= $n){
    return $str;
  }

  $out = "";
  foreach (explode(' ', trim($str)) as $val){
    $out .= $val.' ';

    if (strlen($out) >= $n){
      $out = trim($out);
      return (strlen($out) == strlen($str)) ? $out : $out.$end_char;
    }
  }
}


/**
 * Carrega biblioteca BFI_Thumb
 * http://bfintal.github.io/bfi_thumb/
 **/
require_once('BFI_Thumb.php');
@define(BFITHUMB_UPLOAD_DIR, 'thumbs');

/**
 * Redimensiona uma imagem usando BFI_Thumb
 * http://bfintal.github.io/bfi_thumb/
 *
 * @return string - url da imagem tratada
 * @param string - $src imagem original
 * @param int - $largura final
 * @param int - $altura final
 **/
function imagem($src, $largura, $altura) {
  $params = array('width' => $largura, 'height' => $altura);
  $imagem = bfi_thumb($src, $params);
  return $imagem;
}

/**
 * Retorna a URL atual, com ou sem query_string
 *
 * @param boolean - with or without query_string, default false
 * @return string
 **/
function current_url($query_string = FALSE){
  $uri = ($query_string) ? $_SERVER['REQUEST_URI'] : parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  return 'http://' . $_SERVER["HTTP_HOST"] . $uri;
}


?>
