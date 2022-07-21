<?php

require_once get_template_directory() . '/giftiform/gifte-cpt.php';

function register_gifte_scripts()
{
    wp_enqueue_script('jquery', get_template_directory_uri() . '/giftiform/assets/js/jquery-3.6.0.min.js', array(), false, true);
    wp_enqueue_script('jquery-validation', get_template_directory_uri() . '/giftiform/assets/js/jquery.validate.min.js', array(), false, true);
    wp_enqueue_script('gifte', get_template_directory_uri() . '/giftiform/assets/js/gifte-functions.js', array(), false, true);
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap-grid-only@1.0.0/bootstrap.css');
    wp_enqueue_style('gifte', get_template_directory_uri() . '/giftiform/assets/css/gifte.css');
}
add_action('wp_enqueue_scripts', 'register_gifte_scripts');

// Shortcode: [gifte_form]
function create_gifteform_shortcode($atts)
{
    $atts = shortcode_atts(array(), $atts, 'gifte_form');

    /* if(is_user_logged_in()){
        get_template_part('giftiform/blocks/form');
    } else {
        get_template_part('giftiform/blocks/not-user-logged-in');
    } */

    get_template_part('giftiform/blocks/form');
}
add_shortcode('gifte_form', 'create_gifteform_shortcode');


function gifte_submit($form_data)
{
    $form_data = $_POST;

    if ($form_data) {


        $gifte_id = wp_insert_post(array(
            'post_title' => $_POST['first_name'] . ' ' . $_POST['last_name'],
            'post_status' => 'publish',
            'post_type' => 'giftiform'
        ));

        if ($gifte_id) {
            foreach ($form_data as $key => $value) {
                add_post_meta($gifte_id, $key, $value);
            }

            add_post_meta($gifte_id, 'user', get_current_user_id());

            echo json_encode(array('status' => $form_data, 'msg' => site_url()));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'internal server error'));
        }
    } else {
        echo json_encode(array('status' => false, 'msg' => 'internal server error'));
    }
    wp_die();
}
add_action("wp_ajax_gifte_submit", "gifte_submit");
add_action("wp_ajax_nopriv_gifte_submit", "gifte_submit");


// Schedule Cron Job Event
if (!wp_next_scheduled('gifte_cron_job_hook')) {
    wp_schedule_event(time(), 'daily', 'gifte_cron_job_hook');
}

add_action('gifte_cron_job_hook', 'gifte_cron_job');

function gifte_cron_job()
{
    do_action('wp_ajax_data_render');
}

function data_render()
{
    $args_query = array('post_type' => 'giftiform', 'post_status' => 'publish');
    $query = new WP_Query($args_query);

    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            $schedule_date = get_field('occasion_date');
            if ($schedule_date) {
                $datediff = strtotime($schedule_date) - time();
                $days = round($datediff / (60 * 60 * 24));
                if (nBetween($days, 7, 0)) {

                    echo get_the_title() . "<br>";

                    $headers[] = 'Content-type: text/html; charset=utf-8';
                    //$headers[] = 'From: ' . get_bloginfo("name") . ' <' . get_bloginfo("admin_email") . '>' . "\r\n";
                    $to = get_field('user')->user_email;
                    $subject =  get_bloginfo("name") . ' - Upcoming Event Reminder';

                    ob_start();
                    $body = include TEMPLATEPATH . '/giftiform/email.php';
                    $body = ob_get_clean();

                    wp_mail($to, $subject, $body, $headers);
                }
            }
        endwhile;
    endif;
    wp_reset_postdata();

    wp_die();
}
add_action("wp_ajax_data_render", "data_render");
add_action("wp_ajax_nopriv_data_render", "data_render");


function nBetween($varToCheck, $high, $low)
{
    if ($varToCheck < $low) return false;
    if ($varToCheck > $high) return false;
    return true;
}



add_action('init', 'register_new_item_endpoint');
function register_new_item_endpoint()
{
    add_rewrite_endpoint('gifte-form', EP_ROOT | EP_PAGES);
}

add_filter('query_vars', 'new_item_query_vars');
function new_item_query_vars($vars)
{
    $vars[] = 'gifte-form';
    return $vars;
}

add_filter('woocommerce_account_menu_items', 'add_new_item_tab');
function add_new_item_tab($items)
{
    $items['gifte-form'] = 'Gifte Form';
    return $items;
}


add_action('woocommerce_account_gifte-form_endpoint', 'add_new_item_content');
function add_new_item_content()
{
    get_template_part('giftiform/blocks/form');
}


function fwuk_reorder_my_account_menu()
{
    $neworder = array(
        'dashboard'          => __('Dashboard', 'woocommerce'),
        'gifte-form'          => __('Gifte Form', 'woocommerce'),
        'orders'             => __('Previous Orders', 'woocommerce'),
        'wishlist-link'      => __('Wishlist', 'woocommerce'),
        'edit-address'       => __('Addresses', 'woocommerce'),
        'edit-account'       => __('Account Details', 'woocommerce'),
        'customer-logout'    => __('Logout', 'woocommerce'),
    );
    return $neworder;
}
add_filter('woocommerce_account_menu_items', 'fwuk_reorder_my_account_menu');




function ts_redirect_login($redirect, $user)
{
    return site_url('/my-account/gifte-form/');
}

add_filter( 'woocommerce_login_redirect', 'ts_redirect_login', 10, 2 );

add_filter( 'woocommerce_registration_redirect', 'custom_redirection_after_registration', 10, 1 );
function custom_redirection_after_registration( $redirection_url ){
   return site_url('/my-account/gifte-form/'); // Always return something
}

add_action( 'woocommerce_register_form_start', 'bbloomer_add_name_woo_account_registration' );
  
function bbloomer_add_name_woo_account_registration() {
    ?>
  
    <p class="form-row form-row-first">
    <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
  
    <p class="form-row form-row-last">
    <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>
  
    <div class="clear"></div>

	<p class="form-row">
    <label for="reg_billing_phone"><?php _e( 'Phone Number', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
    </p>
  
    <?php
}

add_filter( 'woocommerce_registration_errors', 'bbloomer_validate_name_fields', 10, 3 );
  
function bbloomer_validate_name_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }
	if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
        $errors->add( 'billing_phone_error', __( '<strong>Error</strong>: Phone is required!.', 'woocommerce' ) );
    }
    return $errors;
}

add_action( 'woocommerce_created_customer', 'bbloomer_save_name_fields' );
  
function bbloomer_save_name_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
    }
  	if ( isset( $_POST['billing_phone'] ) ) {
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
        update_user_meta( $customer_id, 'phone', sanitize_text_field($_POST['billing_phone']) );
    }
}
