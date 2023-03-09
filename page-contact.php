<?php

/**
 * Template Name: Contact Page
 */

?>
<?php get_header() ?>
<main class="p-contact">
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
            <h3>メールでのお問い合わせ</h3>
            <p class="notice">下記に必要事項をご記入の上送信下さい。弊所のコンサルタントからご連絡をさせて頂きます。</p>
            <?php the_content(); ?>
        </div>
    </div>
</main>
<?php get_footer() ?>