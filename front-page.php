<?php

/**
 * Template Name: Front Page
 */
?>

<?php get_header() ?>
<div class="c-mainvisual">
    <div class="js-slider">
        <?php
        $images = get_field('slider');
        // showr($images);
        if ($images) : ?>
            <?php foreach ($images as $image) : ?>
                <div>
                    <img src="<?php echo $image["image"]["url"]; ?>" alt="<?php echo $image["image"]["alt"]; ?>">
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<main class="p-home">
    <section class="service">
        <div class="l-container">
            <h2 class="c-title"><span>幅広い案件に対応できるひかりのワンストップサービス</span>目的に応じて、最適な方法をご提案できます</h2>
            <div class="service__inner">
                <div class="service__item">
                    <img src="<?php bloginfo('template_directory') ?>/assets/img/img_service01.png" alt="">
                </div>
                <div class="service__item">
                    <img src="<?php bloginfo('template_directory') ?>/assets/img/img_service02.png" alt="">
                </div>
                <div class="service__item">
                    <img src="<?php bloginfo('template_directory') ?>/assets/img/img_service03.png" alt="">
                </div>
                <div class="service__item">
                    <img src="<?php bloginfo('template_directory') ?>/assets/img/img_service04.png" alt="">
                </div>
            </div>
            <div class="l-btn l-btn--2btn">
                <div class="c-btn">
                    <a href="<?php bloginfo('url') ?>/services">ひかり税理士法人のサービス一覧を見る</a>
                </div>
                <div class="c-btn">
                    <a href="<?php bloginfo('url') ?>/cases">ひかり税理士法人の成功事例を見る</a>
                </div>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="l-container">
            <h2 class="c-title1">
                <span class="ja">ニュース</span>
                <span class="en">News</span>
            </h2>
            <div class="news__inner">
                <ul class="c-tabs">
                    <li data-content="all" data-color="#0078d2" class="active">すべて</li>
                    <?php
                    $args = array(
                        'child_of'  => 0,
                        'orderby'    => 'id',
                    );
                    $categories = get_categories($args);

                    if ($categories) :
                        foreach ($categories as $category) :
                    ?>
                            <li data-content="cat_<?php echo array_search($category, $categories) + 1 ?>" data-color=" <?php echo get_field('category_color', $category); ?>">
                                <?php echo $category->name ?>
                            </li>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
                <div class="c-tabs__content">
                    <!-- All cat post list starts -->
                    <ul class="c-listpost active" id="all">
                        <?php
                        $args = array(
                            'posts_per_page' => 5,
                            'post_type'      => 'post',

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
                    <!-- All cat post list ends -->

                    <!-- 1 cat post list starts -->

                    <?php
                    $args = array(
                        'child_of'  => 0,
                        'orderby'    => 'id',
                    );
                    $categories = get_categories($args);
                    if ($categories) : foreach ($categories as $category) :
                    ?>
                            <ul class="c-listpost" id="cat_<?php echo array_search($category, $categories) + 1 ?>">
                                <?php
                                $args = array(
                                    'posts_per_page' => 5,
                                    'post_type'      => 'post',
                                    'cat' => $category->term_id
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
                        endforeach;
                    endif;
                    ?>
                    <!-- 1 cat post list starts -->

                </div>
                <div class="l-btn">
                    <div class="c-btn c-btn--small">
                        <a href="<?php bloginfo('url') ?>/news">ニュース一覧を見る</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="publish">
        <div class="l-container">
            <h2 class="c-title1">
                <span class="ja">出版物</span>
                <span class="en">Publish</span>
            </h2>
            <div class="publish__inner">
                <ul class="c-gridpost">

                    <?php
                    $args = array(
                        'post_type' => 'publish',
                        'showposts' => 4
                    );
                    $getposts = new WP_query($args);


                    global $wp_query;
                    $wp_query->in_the_loop = true; ?>
                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                        <li class="c-gridpost__item">
                            <a href="<?php the_permalink() ?>">
                                <div class="c-gridpost__thumb">
                                    <img src="<?php echo get_field('image') ?>" alt="<?php echo get_field('title') ?>">
                                </div>
                                <p class="datepost"><?php echo get_field('publication-date') ?></p>
                                <h3><?php echo get_field('title') ?></h3>
                            </a>
                        </li>

                    <?php endwhile;
                    wp_reset_postdata(); ?>

                </ul>
            </div>
            <div class="l-btn">
                <div class="c-btn c-btn--small">
                    <a href="<?php bloginfo('url') ?>/publish">出版物一覧を見る</a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer() ?>