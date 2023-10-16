<?php
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

//Hide the stupid Wordpress admin bar
add_filter( 'show_admin_bar', '__return_false' );

// Adds options page to admin area.
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

//add lipsum short tag
function lipsum_func($atts){
    $a = shortcode_atts( array(
        'limit' => 100,
    ), $atts );

    $lim = $a['limit'];

    $lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus diam neque, sodales sed quam a, facilisis vehicula arcu. Praesent malesuada sapien a congue lobortis. In ullamcorper pretium massa eget pharetra. Integer a tristique leo. Proin feugiat est ut est ullamcorper, a dictum velit finibus. Donec sit amet nibh mi. Aenean ac enim ut quam fringilla auctor. Aliquam sed condimentum elit, et sagittis ipsum. Nulla aliquet dictum lorem, ultricies congue quam tempus vulputate. Nullam porta ex efficitur velit tempus, vitae convallis est mollis. Suspendisse potenti. Proin ac bibendum turpis, nec tempor velit. Nulla odio libero, tempus sed arcu non, pretium rhoncus nulla. Nulla nec nibh interdum quam sodales vulputate. Vivamus maximus sapien dui, eu efficitur lorem semper laoreet. Ut at mauris ac risus tincidunt maximus eu ut enim. Duis suscipit lacus nisl, facilisis sollicitudin nulla suscipit ut. Donec pulvinar risus odio, efficitur tincidunt metus pretium vel. Quisque et lectus vehicula lectus tempor egestas. Sed sed turpis auctor, vehicula nibh a, porta urna. Vestibulum at lorem vel massa pharetra pretium eu et sem. Ut auctor pulvinar aliquet. Curabitur velit neque, rutrum et iaculis sit amet, blandit eget odio. Cras elit sem, sollicitudin non cursus tristique, vehicula molestie nisi. Sed euismod eros a velit mattis, et cursus neque accumsan. Integer ac neque metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla hendrerit nisl rutrum, varius sapien sed, rutrum enim. Nunc malesuada mi nulla, vitae tincidunt arcu pharetra a. Nulla condimentum sem at venenatis ultrices. Cras vitae odio auctor, faucibus ex eget, ultrices felis. Donec ultricies maximus commodo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam vehicula nunc at velit vulputate consectetur. Nullam mauris metus, vestibulum vel rhoncus a, posuere nec sem. Aenean luctus cursus tortor at imperdiet. Vestibulum cursus ultrices felis non facilisis. Vestibulum ac augue nec mi tincidunt vestibulum sed a dui. Phasellus ut augue metus. Praesent faucibus velit id luctus pulvinar. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam cursus faucibus nulla. Proin purus turpis, gravida quis aliquam a, pellentesque ut nibh. Nulla sed ornare sapien. Praesent risus tellus, aliquam vehicula sapien nec, vestibulum scelerisque ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque id molestie tortor. Vivamus consequat, ex a convallis elementum, elit erat efficitur sapien, et posuere tortor nisi sit amet nisl. In feugiat nec magna ut condimentum. Morbi fringilla consequat dignissim. Maecenas tempus quam mattis tempus dictum. Mauris at purus nisi. Pellentesque rutrum libero id nulla convallis, nec rhoncus nisi sodales. Phasellus in varius urna, suscipit bibendum lacus.";

    $lipsum = substr($lorem, 0, $lim);

    return $lipsum;
}

add_shortcode( 'lipsum', 'lipsum_func' );

//replace "thank you for creating with WordPress" with circle s branding
function change_footer_admin () {

  echo 'Website created by <a href="https://www.circlesstudio.com" target="_blank">circle S studio</a>';

}

add_filter('admin_footer_text', 'change_footer_admin');

//add some of the body classes the pages need
add_filter( 'body_class', 'custom_class' );
function custom_class( $classes ) {
    if ( !is_page_template( 'front-page.php' ) ) {
        $classes[] = 'sub';
    }
    $classes[] = basename(get_permalink());
    return $classes;
}
