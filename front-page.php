<?php get_template_part( 'components/header' ); ?>

<div class="menu-wrapper hidden">
    <nav>
        <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
    </nav>
</div>

<div class="page-header-wrapper">
    <header class="page-header">
        <div class="container row">
            <a class="page-logo" href="/">
                <img class="logo" src="<?php echo get_theme_mod( 'logo', get_bloginfo('template_url').'/images/logo-white.svg' ) ?>" alt="NameTBD" />
            </a>

            <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
            <div class="hamburger hamburger--elastic">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
    </header>
</div>

<section class="top-section">
    <div class="container row">
        <div class="main-info">
            <h1><?php echo get_theme_mod( 'top_intro_title', 'Leuke, pakkende, en coole titel voor <strong>NameTBD</strong>' ) ?></h1>
            <p><?php echo get_theme_mod( 'top_intro_text', 'Text here' ) ?></p>
            <a href="<?php echo get_theme_mod( 'primary_cta_url', '/' ) ?>" class="button primary"><?php echo get_theme_mod( 'primary_cta', 'Primary CTA' ) ?></a> <a href="<?php echo get_theme_mod( 'secondary_cta_url', '/' ) ?>" class="button secondary"><?php echo get_theme_mod( 'secondary_cta', 'Secondary CTA' ) ?></a>
        </div>

        <img src="<?php echo get_theme_mod( 'splash_image', get_bloginfo('template_url').'/images/placeholder.png' ) ?>" class="hero-image" />
    </div>
</section>

<section id="features" class="page-section">
    <div class="container row">
        <div class="intro">
            <h1><?php echo get_theme_mod( 'features_intro_title', 'Deze service helpt je met <strong>super coole dingen</strong>' ) ?></h1>
            <p><?php echo get_theme_mod( 'features_intro_text', 'Text here' ) ?></p>
        </div>

        <div id="features" class="row">
            <?php
            $loop = new WP_Query( array(
                    'post_type' => 'features',
                    'posts_per_page' => -1
                )
            );
            ?>

            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                <div class="feature">
                    <div class="feature-title row">
                        <img class="icon" src="<?php echo get_the_post_thumbnail_url();  ?>" />
                        <h3><?php the_title(); ?></h3>
                    </div>
                    <p><?php the_content(); ?></p>
                </div>

            <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
</section>

<section id="pricing" class="page-section dark">
    <div class="container row">
        <div class="intro">
            <h1><?php echo get_theme_mod( 'plans_intro_title', 'Kijk een hoe <strong>super betaalbaar</strong> deze service is!' ) ?></h1>
            <p><?php echo get_theme_mod( 'plans_intro_text', 'Text here' ) ?></p>
        </div>

        <div id="plans" class="row">
            <?php
            $loop = new WP_Query( array(
                    'post_type' => 'plans',
                    'posts_per_page' => -1
                )
            );
            ?>

            <?php while ( $loop->have_posts() ) : $loop->the_post();
                $price = get_post_meta( $post->ID, '_plan_price', true );
                $cta = get_post_meta( $post->ID, '_plan_cta', true );
                $cta_url = get_post_meta( $post->ID, '_plan_cta_url', true );
                ?>

                <div class="plan">
                    <div class="plan-header">
                        <?php the_title(); ?>
                        <div class="price row">
                            <span class="top">€</span>
                            <span class="middle"><?php echo $price ?></span>
                            <span class="bottom">/mo</span>
                        </div>
                    </div>

                    <div class="plan-body">
                        <div class="plan-title">plan</div>
                        <?php the_content(); ?>
                        <a href="<?php echo $cta_url ?>" class="button secondary"><?php echo $cta ?></a>
                    </div>
                </div>

            <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
</section>

<section id="contact" class="page-section">
    <div class="container row">
        <div class="intro">
            <h1><?php echo get_theme_mod( 'contact_intro_title', 'Voor als mensen contact willen <strong>opnemen</strong>' ) ?></h1>
            <p><?php echo get_theme_mod( 'contact_intro_text', 'Text here' ) ?></p>
            <a href="mailto:<?php echo get_theme_mod( 'contact_email', 'zander@nametbd.frl' ) ?>" class="button secondary">Email us</a> <a href="tel:<?php echo get_theme_mod( 'contact_phone', '+31 6 12345678' ) ?>" class="button secondary">Call us</a>
        </div>

        <div class="info">
            <h3>Phone:</h3>
            <h2><?php echo get_theme_mod( 'contact_phone', '+31 6 12345678' ) ?></h2>

            <h3>Email:</h3>
            <h2><?php echo get_theme_mod( 'contact_email', 'zander@nametbd.frl' ) ?></h2>

            <h3>Adress:</h3>
            <h2><?php echo get_theme_mod( 'contact_address', 'straat 69 plaats 1234AB' ) ?></h2>
        </div>
    </div>
</section>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery(".hamburger").click(function () {
            if(jQuery(".hamburger").toggleClass("is-active").hasClass('is-active')) {
                jQuery(".menu-wrapper").removeClass('hidden');
                jQuery('body').css('overflowY', 'hidden');
            } else {
                jQuery(".menu-wrapper").addClass('hidden');
                jQuery('body').css('overflowY', 'auto');
            }
        });

        jQuery(".menu-wrapper li a").click(function () {
            jQuery(".hamburger").toggleClass("is-active")
            jQuery(".menu-wrapper").addClass('hidden');
            jQuery('body').css('overflowY', 'auto');
        });
    })
</script>

<?php get_template_part( 'components/footer' ); ?>
