<?php get_header(); ?> 


<section id="company-bg" class="flic-bg">
    <h1><?php echo get_theme_mod( 'flictheme-company-callout-headline' ); ?></h1>
    <img src="<?=get_template_directory_uri() . '/assets/images/background.jpg';?>">
    <?php for( $i = 1; $i <= 4; $i++){
    ?>
        <section class="frame_<?php echo $i; ?>"></section>
    <?php
}
?>
</section>

<section class="company">
    <h1>hello</h1>
</section>

<?php get_footer(); ?>  