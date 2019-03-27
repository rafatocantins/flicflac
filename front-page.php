<?php get_header(); ?>

<section class="frontpage hero" id="hero">
    <div class="video-overlay"></div>
    
        <?php the_custom_header_markup(); ?>

        <div class="row hero-content text-center">
            <div class="col-md-12">  
                <h1><?php echo get_theme_mod( 'flictheme-front-callout-headline' ); ?></h1>
                <p>Esta é a descrição</p>
            </div>
        </div>

</section>

<?php for( $i = 1; $i <= 4; $i++){
    ?>
        <section class="frame_<?php echo $i; ?>"></section>
    <?php
}
?>


<?php wp_footer(); ?>