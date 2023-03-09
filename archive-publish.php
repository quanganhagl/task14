<?php

/**
 * Template Name: Publish Page
 */
?>
<?php get_header() ?>
<main class="p-publish">
    <div class="c-breadcrumb">
        <div class="l-container">
            <a href="<?php bloginfo('url') ?>">Home</a>
            <span>出版物</span>
        </div>
    </div>
    <div class="c-headpage">
        <h2 class="c-title">出版物</h2>
        <p>ひかり税理士法人では、税務・会計・経営・相続などに関する書籍の執筆を行っています。</p>
    </div>
    <div class="l-container">
        <div class="p-publish__content">
            <ul class="c-gridpost">
                <?php
                $args = array(
                    'post_type' => 'publish',
                    'showposts' => 12,
                    'paged' => $paged
                );
                $getposts = new WP_query($args);

                global $wp_query;
                $wp_query->in_the_loop = true; ?>
                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

                <li class="c-gridpost__item">
                    <div class="c-gridpost__thumb">
                        <img src="<?php echo get_field('image') ?>" alt="<?php echo get_field('title') ?>">
                    </div>
                    <div class="c-gridpost__info">
                        <p class="datepost"><?php echo get_field('publication-date') ?></p>
                        <h3><?php echo get_field('title') ?></h3>
                        <p class="price"><?php echo get_field('price') ?></p>
                        <a href="<?php the_permalink() ?>" class="c-btnview">詳しく見る</a>
                    </div>
                </li>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </ul>
        </div>
        <?php
        $args = array(
            'post_type' => 'publish',
            'showposts' => 12,
            'paged' => $paged
        );
        $the_query = new WP_Query($args);
        $big = 999999999;
        $pages = paginate_links(array(
            'base'         => str_replace($big, '%#%', get_pagenum_link($big)),
            'format'     => '/page/%#%',
            'current'     => max(1, get_query_var('paged')),
            'total'     => $the_query->max_num_pages,
            'type'      => 'array',
            'prev_text'    => __(''),
            'next_text'    => __(''),
        ));
        if (is_array($pages)) {
            $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
            echo '<div class="c-pagination">';
            foreach ($pages as $page) {
                echo $page;
            }
            echo '</div>';
        }
        ?>
    </div>
</main>
<?php get_footer() ?>