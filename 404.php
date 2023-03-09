<?php

/**
 * Template Name: 404 Page
 */
?>
<?php get_header() ?>

<main>
    <div class="c-error">
        <h1 class="c-error__404">404</h1>
        <p class="c-error__description">ページが見つかりません</p>
        <a href="<?php echo get_site_url(); ?>" class="c-error__backhomebtn u-defaulthover">
            ホームページ</a>
    </div>
</main>

<?php get_footer() ?>