
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 <meta name="description" content="">
 <meta name="author" content="">
 <link rel="icon" href="../../favicon.ico">
 <?php

wp_head();

?>
 
 <title>Flic Flac</title>
 
</head>

<body <?php body_class(); ?>>
    <nav class="flic-navbar">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <?php 
                            if ( function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();
                            } 
                    ?>
                </div>
                <div class="col-md-8">
                    <?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
                </div> 
            </div>
        </div>
    </nav>
    
