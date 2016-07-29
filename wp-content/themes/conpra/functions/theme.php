<?php
/**
 * Funcoes especificas do tema
 */

/**
 * Formata um campo ACF usando php.date
 **/
function data($acf_field, $ID)
{
  return date('d \d\e F \d\e Y',strtotime(get_field($acf_field, $ID)));
}

/**
 * Formata um campo ACF usando filter the_content
 **/
function texto($acf_field, $ID = NULL)
{
  if(!isset($ID)){
    global $post;
    $ID = $post->ID;
  }
  echo apply_filters('the_content',get_field($acf_field, $ID));
}

?>
