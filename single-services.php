    <?php get_header();
    $service_single_group = get_field('service_single_group');


    ?>

    <main class="p-service">
        <div class="c-breadcrumb">
            <div class="l-container">
                <a href="<?php bloginfo('url') ?>">Home</a>
                <a href="<?php bloginfo('url') ?>/publish">ご提供サービス</a>
                <span><?php the_title() ?></span>
            </div>
        </div>
        <div class="c-headpage">
            <div class="l-container2">
                <h2 class="c-title"><?php the_title() ?></h2>
            </div>
            <p>
                <?php echo $service_single_group['description'] ?>
            </p>
        </div>

        <div class="feature_img">
            <img src="<?php echo $service_single_group['image'] ?>" alt="<?php the_title() ?>">
        </div>

        <div class="p-service__consultation">
            <dl class="l-container2">
                <dt>このような方はご相談ください</dt>
                <?php foreach ($service_single_group['target_group'] as $target) : ?>
                <dd class="c-checkMark"><?php echo $target['target'] ?></dd>
                <?php endforeach ?>
            </dl>
        </div>

        <div class="p-service__merit">
            <div class="l-container2">
                <h3 class="p-service__title">ひかり税理士法人を選ぶメリット</h3>
                <dl>
                    <?php foreach ($service_single_group['advantage'] as $advantage) : ?>
                    <dt class="c-checkMark"><?php echo $advantage['advantage-title'] ?></dt>
                    <dd><?php echo $advantage['advantage-description'] ?></dd>
                    <?php endforeach ?>
                </dl>
            </div>
        </div>

        <div class="p-service__flow">
            <div class="l-container2">
                <h3 class="p-service__title">サービスの流れ</h3>
                <?php foreach ($service_single_group['steps'] as $step) : ?>
                <table>
                    <tbody>
                        <tr>
                            <th>STEP1</th>
                            <td>
                                <h4 class="flow-title"><?php echo $step['step-tite'] ?></h4>
                                <?php foreach ($step['step-subtitle_group'] as $stepsubtitle) : ?>
                                <h5 class="flow-subtitle"><?php echo $stepsubtitle['step-subtitle']  ?></h5>
                                <?php foreach ($stepsubtitle['step-description_group'] as $stepdescription) : ?>

                                <p class="c-checkMark">
                                    <?php echo $stepdescription['step-description'] ?>
                                </p>
                                <?php endforeach ?>
                                <?php endforeach ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php endforeach ?>
            </div>
        </div>

        <div class="p-service__division">
            <div class="l-container">
                <h3 class="p-service__subtitle">関連サービス</h3>
                <ul class="division-list c-flex">
                    <?php
                    foreach ($service_single_group['related-service_group'] as $related) :
                        $currentID = $related['related-service']->ID
                    ?>
                    <li class="small-12 medium-4">
                        <a href="<?php the_permalink($currentID) ?>">
                            <p class="img service__icon"><img src="<?php echo $service_single_group['icon'] ?>"></p>
                            <p class="text"><span class="arrow"><?php echo get_the_title($currentID) ?></span></p>
                        </a>
                    </li>
                    <?php
                    endforeach
                    ?>

                </ul>
            </div>

            <div class="l-btn">
                <div class="c-btn c-btn--small">
                    <a href="<?php bloginfo('url') ?>/news">ご提供サービス一覧へ</a>
                </div>
            </div>
        </div>


    </main>
    <?php get_footer();
    ?>