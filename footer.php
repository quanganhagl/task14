<footer class="c-footer">
    <div class="c-footer__logo">
        <div class="l-container">
            <a href="<?php bloginfo('url') ?>"><img src="<?php bloginfo('template_directory') ?>/assets/img/logo.png"
                    alt="Hikari Tax Corporation"></a>
        </div>
    </div>
    <div class="c-footer__main">
        <div class="l-container">
            <div class="c-footer__link">
                <h3><a href="<?php bloginfo('url') ?>/news">ニュース</a></h3>
                <ul class="c-boxlink">
                    <?php
                    $args = array(
                        'orderby' => 'id',
                        'order'   => 'ASC'
                    );
                    $categories = get_categories($args);

                    foreach ($categories as $category) { ?>

                    <li><a
                            href="<?php echo get_term_link($category->slug, 'category'); ?>"><?php echo  $category->name; ?></a>
                    </li>

                    <?php } ?>

                </ul>
            </div>

            <div class="c-footer__link">
                <h3><a href="cases.html">成功事例</a></h3>
                <ul class="c-boxlink">
                    <li><a href="<?php bloginfo('url') ?>/法人のお客様">法人のお客様</a></li>
                    <li><a href="<?php bloginfo('url') ?>/個人のお客様">個人のお客様</a></li>
                </ul>
            </div>

            <div class="c-footer__link">
                <ul class="c-boxlink">
                    <li><a href="<?php bloginfo('url') ?>/スタッフ">スタッフ</a></li>
                    <li><a href="<?php bloginfo('url') ?>/採用情報">採用情報</a></li>
                    <li><a href="<?php bloginfo('url') ?>/プライバシーポリシー">プライバシーポリシー</a></li>
                    <li><a href="<?php bloginfo('url') ?>/サイトマップ">サイトマップ</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/assets/js/themes.js"></script>
<?php wp_footer() ?>
</body>

</html>