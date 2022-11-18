<?php



add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );



function enqueue_parent_styles() {

    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


// Change add to cart text on single product page


add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single' );

function woocommerce_add_to_cart_button_text_single() {

    return __( 'Add to Sample Bag', 'woocommerce' ); 

}

// Change add to cart text on product archives page


add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_archives' );

function woocommerce_add_to_cart_button_text_archives() {

    return __( 'Add to Sample Bag', 'woocommerce' );

}