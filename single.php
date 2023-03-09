<?php get_header() ?>
<main class="p-news">
    <div class="c-breadcrumb">
        <div class="l-container">
            <a href="<?php bloginfo('url') ?>">Home</a>
            <a href="<?php bloginfo('url') ?>/news">ニュース・お知らせ</a>
            <span><?php the_title() ?></span>
        </div>
    </div>

    <div class="p-news__content">
        <div class="l-container">
            <div class="feature_img">
                <?php echo get_the_post_thumbnail(get_the_id(), 'full', array('class' => 'thumnail')); ?>
            </div>

            <div class="c-ttlpostpage">
                <h2><?php the_title() ?></h2>
                <span><?php echo get_the_date('Y年m月d日'); ?></span>
                <span class="c-listpost__cat">
                    <i class="c-dotcat" style="background-color: <?php echo get_field('category_color', get_the_category()[0]); ?>"></i>
                    <a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><?php echo get_the_category()[0]->name ?></a>
                </span>
            </div>

            <div class="single__content">
                <?php the_content() ?>
            </div>

            <div class="l-btn">
                <div class="c-btn c-btn--small2">
                    <a href="<?php bloginfo('url') ?>/news">ニュース一覧を見る</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer() ?>