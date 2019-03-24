<?php get_header(); ?>

<section class="frontpage hero" id="hero">
    <div class="video-overlay"></div>
    
        <?php the_custom_header_markup(); ?>

        <div class="row hero-content text-center">
            <div class="col-md-12">
                <img src="media/img/logo-white-2x.png" class="logo animated fadeInDown" />
                <h1 class="animated fadeInDown">The leading, most customer friendly and hassle-free refund service since 2005.</h1>
                <a href="#buy" class="use-btn animated fadeInUp">Claim now</a> <a href="#about" class="learn-btn animated fadeInUp">Learn more</a>
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