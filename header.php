<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <title>
        <?php
        if (is_front_page()) {
            echo '光税理士法人 Hikari Tax Corporation ';
        } else {
            wp_title('');
        }
        ?>
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/assets/css/style.css">
    <?php wp_head() ?>
</head>

<body>
    <header class="c-header">
        <div class="l-container">
            <h1 class="c-logo"><a href="<?php bloginfo('url') ?>"><img
                        src="<?php bloginfo('template_directory') ?>/assets/img/logo.png"
                        alt="Hikari Tax Corporation"></a></h1>
            <nav class="c-gnav">
                <ul>
                    <li><a href="<?php bloginfo('url') ?>/services">サービス</a></li>
                    <li><a href="<?php bloginfo('url') ?>/publish">出版物</a></li>
                    <li><a href="<?php bloginfo('url') ?>/contact">お問い合わせ</a></li>
                </ul>
            </nav>
        </div>
    </header><!-- /header -->