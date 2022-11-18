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



// Woocommerce checkout field order changed


add_filter("woocommerce_checkout_fields", "custom_override_checkout_fields", 1);

function custom_override_checkout_fields($fields) {

    $fields['billing']['billing_first_name']['priority'] = 1;
    $fields['billing']['billing_last_name']['priority'] = 2;
    $fields['billing']['billing_email']['priority'] = 3;
    $fields['billing']['billing_phone']['priority'] = 4;
    $fields['billing']['billing_business_name']['priority'] = 5;
    $fields['billing']['billing_business_address']['priority'] = 6;
    $fields['billing']['billing_job_title']['priority'] = 7;
    $fields['billing']['billing_project_name']['priority'] = 8;
    $fields['billing']['billing_about_us']['priority'] = 9;

    // First Name & Last Name

    $fields['billing']['billing_first_name']['class'][0] = 'form-row-first';
    $fields['billing']['billing_last_name']['class'][0] = 'form-row-last';

    // Business Name and Number

    $fields['billing']['billing_business_name']['class'][0] = 'form-row-first';
    $fields['billing']['billing_business_address']['class'][0] = 'form-row-last';

    return $fields;
}

add_filter( 'woocommerce_default_address_fields', 'custom_override_default_locale_fields' );





add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );


function override_billing_checkout_fields( $fields ) {

    $fields['billing']['billing_first_name']['placeholder'] = 'First Name';

    $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
    
    $fields['billing']['billing_email']['placeholder'] = 'Email';

    $fields['billing']['billing_phone']['placeholder'] = 'Phone Number';

    $fields['billing']['billing_business_name']['placeholder'] = 'Business Name';

    $fields['billing']['billing_business_address']['placeholder'] = 'Business Address';

    $fields['billing']['billing_job_title']['placeholder'] = 'Job Title';

    $fields['billing']['billing_project_name']['placeholder'] = 'Project Name';
    
    $fields['billing']['billing_about_us']['placeholder'] = 'How to did you hear about us?';

    return $fields;

}
