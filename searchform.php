<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Melhores Escolas Médicas
 * @since 1.0
 * @version 1.0
 */

?>

<form action="/" method="get" accept-charset="utf-8" id="searchform" role="search" class="busca__form">
  <div class="busca__field">
    <input type="text" class="input" name="s" placeholder="Buscar por:" id="s" value="<?php the_search_query(); ?>" />
    <div class="busca__search busca__search--aside">
        <input type="submit" class="submit" id="searchsubmit" value="Buscar" />
    </div>
  </div>
</form>

