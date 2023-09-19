<?php

add_shortcode( 'portfolio-list', 'wpe_portfolio_list' );

function wpe_portfolio_list() {
    $args = array(
        'post_type' => 'portfolio',
    );

    $query = new WP_Query($args);
    $output = '';

    if ($query->have_posts()) {

        while ($query->have_posts()) {
            $query->the_post();
            $permalink = get_permalink();
            $output .= "<li><a href='" . esc_url($permalink) . "'><div class='portfolio_bg_box' style='background-image: url(" . get_field('portfolio_thumbnail') . ");background-color:".get_field('background_color')."'>" . "<div class='logo-box'><div class='logo'><img src='" . get_field('client_logo') . "'alt=''></div></div></div>";
            $output .= "<h3>" . get_the_title() . "</h3>";
            $output .= "<p>" . get_the_content() . "</p></a></li>";
        }

        wp_reset_postdata();
    }

    return "<div class='portfolio_list'><ul>" . $output . "</ul></div>";
}
