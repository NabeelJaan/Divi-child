<?php



add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {

    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}



/*
    ==================================================
      Change add to cart text on single product page
    ==================================================

*/ 

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single' );

function woocommerce_add_to_cart_button_text_single() {

    return __( 'Add to Sample Bag', 'woocommerce' ); 

}



/*
    ==================================================
      Change add to cart text on product archives page
    ==================================================

*/ 

add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_archives' );

function woocommerce_add_to_cart_button_text_archives() {

    return __( 'Add to Sample Bag', 'woocommerce' );

}



/*
    ================================
      Removing Unncessory fields
    ================================

*/ 


add_filter( 'woocommerce_checkout_fields' , 'nabeel_remove_fields' );

function nabeel_remove_fields( $fields ) {

    unset( $fields['billing']['billing_company'] );

    unset( $fields['billing']['billing_country'] );

    unset( $fields['billing']['billing_state'] );

    unset( $fields['billing']['billing_address_2'] );

    unset( $fields['billing']['billing_postcode'] );

    unset( $fields['billing']['billing_city'] );

    unset($fields['order']['order_comments']);

    return $fields;

}



/*
    ==========================================
      Adding custom field = Business Name
    ==========================================
*/


add_filter( 'woocommerce_checkout_fields' , 'business_name_custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!

function business_name_custom_override_checkout_fields( $fields ) {

    $fields['billing']['billing_business_name'] = array(

        'label'     => __('Business Name', 'woocommerce'),
        'placeholder'   => _x('Business Name', 'placeholder', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-row-wide'),
        'clear'     => true

    );

    return $fields;
}

/**
 * Display field value on the order edit page
 */
 
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'business_name_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Bussiness Name From Checkout Form').':</strong> ' . get_post_meta( $order->get_id(), '_billing_business_name', true ) . '</p>';
}




/*
    ==========================================
      Adding custom field == Job Title
    ==========================================
*/


add_filter( 'woocommerce_checkout_fields' , 'job_title_custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!

function job_title_custom_override_checkout_fields( $fields ) {

    $fields['billing']['billing_job_title'] = array(

        'label'     => __('Job Title', 'woocommerce'),
        'placeholder'   => _x('Job Title', 'placeholder', 'woocommerce'),
        'required'  => false,
        'class'     => array('form-row-wide'),
        'clear'     => true

    );

    return $fields;
}

/**
 * Display field value on the order edit page
 */
 
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'job_custom_checkout_field_display_admin_order_meta', 20, 2 );

function job_custom_checkout_field_display_admin_order_meta($order){

    echo '<p><strong>'.__('Job Title From Checkout Form').':</strong> ' . get_post_meta( $order->get_id(), '_billing_job_title', true ) . '</p>';

}


/*
    ==================================================
      Adding custom field == Project Name
    ==================================================

*/

add_filter( 'woocommerce_checkout_fields' , 'project_title_custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!

function project_title_custom_override_checkout_fields( $fields ) {

    $fields['billing']['billing_Project_name'] = array(

        'label'     => __('Project Name', 'woocommerce'),
        'placeholder'   => _x('Project Name', 'placeholder', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-row-wide'),
        'clear'     => true

    );

    return $fields;
}

/**
 * Display field value on the order edit page
 */
 
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'project_custom_checkout_field_display_admin_order_meta', 30, 1 );

function project_custom_checkout_field_display_admin_order_meta($order){

    echo '<p><strong>'.__('Project Name From Checkout Form').':</strong> ' . get_post_meta( $order->get_id(), '_billing_project_name', true ) . '</p>';

}


/*
    ==================================================
      Adding custom field == About us
    ==================================================

*/

add_filter( 'woocommerce_checkout_fields' , 'about_title_custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!

function about_title_custom_override_checkout_fields( $fields ) {

    $fields['billing']['billing_about_us'] = array(

        'label'     => __('How did you hear about us?', 'woocommerce'),
        'placeholder'   => _x('How did you hear about us?', 'placeholder', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-row-wide'),
        'clear'     => true

    );

    return $fields;
}

/**
 * Display field value on the order edit page
 */
 
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'about_custom_checkout_field_display_admin_order_meta', 30, 1 );

function about_custom_checkout_field_display_admin_order_meta($order){

    echo '<p><strong>'.__('How did you hear about us Name From Checkout Form').':</strong> ' . get_post_meta( $order->get_id(), '_billing_about_us', true ) . '</p>';

}


