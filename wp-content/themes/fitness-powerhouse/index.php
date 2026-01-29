<?php
/**
 * The main template file
 *
 * @package Fitness_Power_House
 */

get_header();
?>

<div class="container">
    <div class="content-area">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'fitness-powerhouse'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>
                </article>
                <?php
            endwhile;

            the_posts_navigation();
        else :
            ?>
            <p><?php esc_html_e('No content found.', 'fitness-powerhouse'); ?></p>
            <?php
        endif;
        ?>
    </div>
</div>

<?php
get_footer();
