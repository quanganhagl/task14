<?php

/**
 * Template Name: Services Page
 */
?>
<?php get_header();
$termservices = get_term_children(19, 'service-taxonomy');
$termcontents = get_term_children(24, 'service-taxonomy');
?>
<main class="p-service">
    <div class="c-breadcrumb">
        <div class="l-container">
            <a href="<?php bloginfo('url') ?>">Home</a>
            <span>ご提供サービス</span>
        </div>
    </div>
    <div class="c-headpage">
        <div class="l-container2">
            <h2 class="c-title">ご提供サービス</h2>
        </div>
    </div>

    <div class="feature_img">
        <img src="<?php bloginfo('template_directory') ?>/assets/img/img_services01.png" alt="ご提供サービス">
    </div>
    <div class="p-service__content">
        <div class="l-container">
            <p class="notice">ひかり税理士法人がご提供するすべてのサービスを目的別に検索していただけます</p>
            <!-- =======checkArea====== -->
            <div class=" p-service__checkArea">
                <form id="serviceSearch" method="get" action="#" data-url="<?php echo admin_url('admin-ajax.php') ?>">
                    <div class="checkArea__form">
                        <legend class="servicesList-heading">サービスの対象で選ぶ</legend>
                        <div class="checkArea__inner">
                            <?php if ($termservices) : foreach ($termservices as $termservice) :
                                    $termservice = get_term_by('id', $termservice, 'service-taxonomy');
                            ?>
                            <div class="c-w240">
                                <label>
                                    <input class="chkbutton" type="checkbox" name="service-taxonomy"
                                        value="<?php echo $termservice->term_id ?>"><?php echo $termservice->name ?></label>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="checkArea__form form2">
                        <legend class="servicesList-heading">サービスの内容で選ぶ</legend>
                        <div class="checkArea__inner">
                            <?php if ($termcontents) : foreach ($termcontents as $termcontent) :
                                    $termcontent = get_term_by('id', $termcontent, 'service-taxonomy');
                                    // showr($termcontent)
                            ?>
                            <div class="c-w156">
                                <label>
                                    <input class="chkbutton" type="checkbox" name="service-taxonomy"
                                        value="<?php echo $termcontent->term_id ?>"><?php echo $termcontent->name ?></label>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>

            <?php
            $services = get_posts(array('post_type' => 'services', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1))
            ?>
            <p class="p-service__result"><?php echo count($services); ?>件が該当しました</p>
            <ul class="c-column">
                <?php foreach ($services as $service) :
                    setup_postdata($service);
                ?>
                <li class="c-column__item"><a href="<?php echo get_permalink($service->ID); ?>">
                        <img src="<?php $service_single_group = get_field('service_single_group', $service->ID);
                                        echo esc_url($service_single_group['icon']); ?>"
                            alt="<?php echo get_the_title($service->ID); ?>">
                        <p><?php echo get_the_title($service->ID); ?></p>
                    </a>
                </li>
                <?php
                endforeach; ?>
            </ul>

            <div class="endcontent">
                <img src="<?php bloginfo('template_directory') ?>/assets/img/img_more05.png" alt="">
                <img src="<?php bloginfo('template_directory') ?>/assets/img/img_more06.png" alt="">
            </div>
        </div>
    </div>
</main>
<?php get_footer() ?>