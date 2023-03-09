<?php

/**
 * Template Name: Contact Confirm Page
 */
?>
<?php get_header() ?>
<main class="p-contact p-contact--confirm">
    <div class="c-breadcrumb">
        <div class="l-container">
            <a href="<?php bloginfo('url') ?>">Home</a>
            <span>お問い合わせ</span>
        </div>
    </div>
    <div class="c-headpage">
        <div class="l-container2">
            <h2 class="c-title">お問い合わせ</h2>
        </div>
    </div>

    <div class="p-contact__content">
        <div class="l-container">
            <p class="notice">以下の内容を送信してもよろしいですか？</p>
            <?php the_content(); ?>
        </div>
    </div>
</main>
<?php get_footer() ?>