<?php get_header() ?>
<main class="p-news">
    <div class="c-breadcrumb">
        <div class="l-container">
            <a href="<?php bloginfo('url') ?>">Home</a>
            <a href="<?php bloginfo('url') ?>/news">ニュース・お知らせ</a>

            <span><?php echo get_the_category()[0]->name ?></span>
        </div>
    </div>
    <div class="c-headpage">
        <h2 class="c-title"><?php the_category() ?></h2>
    </div>
    <div class="p-news__content">
        <div class="l-container">
            <ul class="c-listpost" id="cat_<?php echo get_the_category()[0]->term_id ?>">
                <?php
                $args = array(
                    'posts_per_page' => 10,
                    'post_type'      => 'post',
                    'orderby'    => 'date',
                    'order'    => 'DESC',
                    'cat' => get_the_category()[0]->term_id,
                    'paged' => $paged

                );
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <li class="c-listpost__item">
                            <div class="c-listpost__info">
                                <!-- Date start -->
                                <span class="datepost"><?php echo get_the_date('Y年m月d日'); ?></span>
                                <!-- Date end -->

                                <!-- Cat start -->
                                <span class="cat">
                                    <?php $category = get_the_category() ?>
                                    <i class="c-dotcat" style="background-color:<?php echo get_field('category_color', $category[0]); ?>"></i>
                                    <a href="<?php echo get_category_link($category[0]->term_id) ?>">
                                        <?php echo $category[0]->name ?>
                                    </a>
                                </span>
                                <!-- Cat end -->
                            </div>

                            <!-- Title start -->
                            <h3 class="titlepost"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                            </h3>
                            <!-- Title end -->
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </ul>

            <?php
            $args = array(
                'posts_per_page' => 10,
                'post_type'      => 'post',
                'orderby'    => 'date',
                'order'    => 'DESC',
                'cat' => get_the_category()[0]->term_id,
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
    </div>
</main>
<?php get_footer() ?>