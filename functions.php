<?php



add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {

    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


/*
    ======================
      woocommerce support
    ======================
*/ 

// add_action( 'after_setup_theme', 'woocommerce_support' );

// function woocommerce_support() {
//    add_theme_support( 'woocommerce' );
// }


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
    ==========================
      Order confirmation text
    ==========================
*/


// add_filter('woocommerce_thankyou_order_received_text', 'woo_change_order_received_text', 10, 2 );

// function woo_change_order_received_text( $str, $order ) {
//     $new_str = $str . 'Your sample order has been submitted. If we have any questions, a representative will reach out shortly. You can also contact us toll-free at 1-877-496-3566 or info@summit-flooring.com';
//     return $new_str;
// }



/*
    ================================
      Removing Unncessory fields
    ================================

*/ 

add_filter( 'woocommerce_checkout_fields' , 'nabeel_remove_fields' );

function nabeel_remove_fields( $fields ) {

    unset( $fields['billing']['billing_company'] );

    // unset( $fields['billing']['billing_country'] );

    unset( $fields['billing']['billing_state'] );

    unset( $fields['billing']['billing_address_1'] );

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

// Display field value on the order edit page
 
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'business_n_custom_checkout_field_display_admin_order_meta', 10, 1 );

function business_n_custom_checkout_field_display_admin_order_meta($order){

    echo '<p><strong>'.__('Business Name From Checkout Form').':</strong> ' . get_post_meta( $order->get_id(), '_billing_business_name', true ) . '</p>';
}


/*
    =============================================
      Adding a custom field == Business Address
    =============================================

*/ 


add_filter( 'woocommerce_checkout_fields', 'business_address_custom_override_checkout_fields' );

function business_address_custom_override_checkout_fields( $fields ) {

    $fields['billing']['billing_business_address'] = array(

        'label'       => __('Business Address', 'woocommerce'),
        'placeholder' => _x('Business Address', 'placeholder', 'woocommerce'),
        'required'    => true,
        'class'       => array('form-row-wide'),
        'clear'       => true
    );

    return $fields;

}

// Display field value

add_action( 'woocommerce_admin_order_data_after_shipping_address', 'businessAdd_custom_checkout_field_display_admin_order_memta', 20, 1 );

function businessAdd_custom_checkout_field_display_admin_order_memta( $order ){

    echo '<p><strong>'.__('Business Address From Checkout Form').':</strong>'. get_post_meta( $order->get_id(), '_billingn_business_address', true ) . '</p>';
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
 
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'job_custom_checkout_field_display_admin_order_meta', 30, 1 );

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
 
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'project_custom_checkout_field_display_admin_order_meta', 40, 1 );

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

/*
    ==================================================
      Display field value on the order edit page
    ==================================================

*/
 
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'about_custom_checkout_field_display_admin_order_meta', 50, 1 );

function about_custom_checkout_field_display_admin_order_meta($order){

    echo '<p><strong>'.__('How did you hear about us Name From Checkout Form').':</strong> ' . get_post_meta( $order->get_id(), '_billing_about_us', true ) . '</p>';

}

/*
    ======================================================================
      Change the 'Billing details' checkout label to 'Contact Information'
    ======================================================================

*/


function wc_billing_field_strings( $translated_text, $text, $domain ) {
    switch ( $translated_text ) {
    case 'Billing details' :
    $translated_text = __( 'Client Details', 'woocommerce' );
    break;
    }
    return $translated_text;
}


add_filter( 'gettext', 'wc_billing_field_strings', 20, 3 );


/*
    ===============================================
      Change the 'cart total' heading to 'Summary'
    ===============================================
*/

function change_cart_totals( $translated ) {
    $translated = str_ireplace('Cart Totals', 'Summary', $translated);
    return $translated;
}


add_filter('gettext', 'change_cart_totals' );


/*
    ==========================================================
      Change the 'Proceed to checkouot' to 'Proceed to order'.
    ==========================================================
*/

function woocommerce_button_proceed_to_checkout() { 
    ?>

    <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button button alt wc-forward">
    
        <?php esc_html_e( 'Proceed to Order', 'woocommerce' ); ?>
    </a>

    <?php
}
   

/*
    ==============================
      Custom Thank you Page after
    ==============================
*/

add_action('template_redirect', 'woocommerce_redirect_after_purchase');

function woocommerce_redirect_after_purchase() {
    global $wp;
    if (is_checkout() && !empty($wp->query_vars['order-received'])) {
        wp_redirect('https://summitluxuryliving.com/thank-you/');
        exit;
    }
}

/*
    =========================
      Change View Cart text
    =========================
*/ 

add_filter( 'gettext', function( $translated_text ) {

    if ( 'View cart' === $translated_text ) {
        $translated_text = 'View Sample Bag';
    }
    return $translated_text;

} );


/*
    =========================
      Alter update cart text
    =========================
*/


function change_update_cart_text( $translated, $text, $domain ) {

    if( is_cart() && $translated == 'Update cart' ){
        $translated = 'Update Bag';
    }
    return $translated;
}


add_filter( 'gettext', 'change_update_cart_text', 20, 3 );

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}                               



/*
    ===================================
      Adding checkbox on checkout form
    ===================================
*/

// function cw_custom_checkbox_fields( $checkout ) {

//     echo '<div class="cw_custom_class"><h3>'.__('This is also the shipping address: ').'</h3>';

//     woocommerce_form_field( 'custom_checkbox', array(
//         'type'          => 'checkbox',
//         'label'         => __('Shipping Address.'),
//         'required'  => true,
//     ), $checkout->get_value( 'custom_checkbox' ));

//     echo '</div>';
// }


// add_action('woocommerce_checkout_process', 'cw_custom_process_checkbox');

// function cw_custom_process_checkbox() {
//     global $woocommerce;

//     if (!$_POST['custom_checkbox'])
//         wc_add_notice( __( 'Notification message.' ), 'error' );
// }


// add_action('woocommerce_checkout_update_order_meta', 'cw_checkout_order_meta');

// function cw_checkout_order_meta( $order_id ) {
//     if ($_POST['custom_checkbox']) update_post_meta( $order_id, 'checkbox name', esc_attr($_POST['custom_checkbox']));
// }

// add_action('woocommerce_after_order_notes', 'cw_custom_checkbox_fields');



/*
    ===================================
      Adding checkbox on checkout form
    ===================================
*/


function webp_upload_mimes( $existing_mimes ) {
    // add webp to the list of mime types
    $existing_mimes['webp'] = 'image/webp';
    // return the array back to the function with our added mime type
    return $existing_mimes;
}

add_filter( 'mime_types', 'webp_upload_mimes' );

//** * Enable preview / thumbnail for webp image files.*/


function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );
        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }
    return $result;
}


add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);