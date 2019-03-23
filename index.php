<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage FlicTheme
 * @since 1.0
 * @version 1.0
 */

 ?>

<!DOCTYPE html> 
<html <?php language_attributes(); ?>> 
<head> 
   <?php wp_head(); ?> 
</head> 

<body> 
    <div id="app">
        {{ this.message }}
    </div> 

    <?php wp_footer(); ?> 
    <script>   
    </script>
</body> 
</html>