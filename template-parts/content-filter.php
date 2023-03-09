<?php
?>
<li class="c-column__item"><a href="<?php the_permalink(); ?>">
        <img src="
        <?php
        $service_single_group = get_field('service_single_group', $post->ID);
        echo esc_url($service_single_group['icon']);
        ?>" alt="dfsdsfs<?php the_title(); ?>">
        <p>
            <?php the_title(); ?>
        </p>
    </a>
</li>