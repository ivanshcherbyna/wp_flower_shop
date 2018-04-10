<?php
/* ----------- VALIDATION & SAVE FIELDS CIENT ON REGISTRATION CUSTOMER ---------------*/
/**

* register fields Validating.

*/

function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {

if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {

$validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );

}

if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {

$validation_errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );

}
return $validation_errors;
}

add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );

/**
* Below code save extra fields.
*/
function wooc_save_extra_register_fields( $customer_id ) {

if ( isset( $_POST['billing_phone'] ) ) {
// Phone input filed which is used in WooCommerce
update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
}
if ( isset( $_POST['billing_first_name'] ) ) {
//First name field which is by default
update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
// First name field which is used in WooCommerce
update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
}
if ( isset( $_POST['billing_last_name'] ) ) {
// Last name field which is by default
update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
// Last name field which is used in WooCommerce
update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
}
if ( isset( $_POST['billing_company'] ) ) {
// Last name field which is used in WooCommerce
update_user_meta( $customer_id, 'billing_company', sanitize_text_field( $_POST['billing_company'] ) );
}
if ( isset( $_POST['billing_address_1'] ) ) {
// Last name field which is used in WooCommerce
update_user_meta( $customer_id, 'billing_address_1', sanitize_text_field( $_POST['billing_address_1'] ) );
}
if ( isset( $_POST['billing_address_2'] ) ) {
// Last name field which is used in WooCommerce
update_user_meta( $customer_id, 'billing_address_2', sanitize_text_field( $_POST['billing_address_2'] ) );
}
if ( isset( $_POST['billing_postcode'] ) ) {
// Last name field which is used in WooCommerce
update_user_meta( $customer_id, 'billing_postcode', sanitize_text_field( $_POST['billing_postcode'] ) );
}
if ( isset( $_POST['billing_phone'] ) ) {
// Last name field which is used in WooCommerce
update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
}
if ( isset( $_POST['billing_city'] ) ) {
// Last name field which is used in WooCommerce
update_user_meta( $customer_id, 'billing_city', sanitize_text_field( $_POST['billing_city'] ) );
}
if ( isset( $_POST['billing_state'] ) ) {
// Last name field which is used in WooCommerce
update_user_meta( $customer_id, 'billing_state', sanitize_text_field( $_POST['billing_state'] ) );
}
if ( isset( $_POST['billing_country'] ) ) {
// country field which is used in WooCommerce
update_user_meta( $customer_id, 'billing_country', sanitize_text_field( $_POST['billing_country'] ) );
}
if ( isset( $_POST['password_hint'] ) ) {
// field which is by custom
update_user_meta( $customer_id, 'password_hint', sanitize_text_field( $_POST['password_hint'] ) );
}
if ( isset( $_POST['client_reward_program_account'] ) ) {
// field which is by custom
update_user_meta( $customer_id, 'client_reward_program_account', sanitize_text_field( $_POST['client_reward_program_account'] ) );
}
if ( isset( $_POST['work_phone'] ) ) {
// field which is by custom
update_user_meta( $customer_id, 'work_phone', sanitize_text_field( $_POST['work_phone'] ) );
}
if ( isset( $_POST['work_phone_exten'] ) ) {
// field which is by custom
update_user_meta( $customer_id, 'work_phone_exten', sanitize_text_field( $_POST['work_phone_exten'] ) );
}

}
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );
/* ----------- SAVE FIELDS CIENT ON REGISTRATION CUSTOMER ---------------*/

/* ------ ADD CUSTOM FIELDS OF CUSTOMER IN ADMIN MENU--------*/
add_action( 'edit_user_profile', 'custom_user_profile_fields' );

function custom_user_profile_fields( $user )
{
    echo '<h3 class="heading">Custom Fields</h3>';

    ?>

    <table class="form-table">
        <tr>
            <th><label for="password_hint">Password hint</label></th>
            <td><input type="text" class="input-text form-control" name="password_hint" id="password_hint_id" value="<?php echo esc_html(get_user_meta($_GET['user_id'],'password_hint',true)); ?>"/></td>
        </tr>
        <tr>
            <th><label for="client_reward_program_account">Client reward program account</label></th>
            <td><input type="text" class="input-text form-control" name="client_reward_program_account" id="client_reward_program_account_id" value="<?php echo esc_html(get_user_meta($_GET['user_id'],'client_reward_program_account',true)); ?>"/></td>
        </tr>
        <tr>
        <th><label for="work_phone">Work phone</label></th>
            <td><input type="text" class="input-text form-control" name="work_phone" id="work_phone_id" value="<?php echo esc_html(get_user_meta($_GET['user_id'],'work_phone',true)); ?>"/></td>
        </tr>
        <tr>
            <th><label for="work_phone_exten">Work phone exten</label></th>
            <td><input type="text" class="input-text form-control" name="work_phone_exten" id="work_phone_exten_id" value="<?php echo esc_html(get_user_meta($_GET['user_id'],'work_phone_exten',true)); ?>"/></td>


        </tr>
    </table>

    <?php
}

add_action( 'edit_user_profile_update', 'save_custom_user_profile_fields' );

/**
 *   @param User Id $user_id
 */
function save_custom_user_profile_fields( $user_id )
{
    $custom_data = $_POST['password_hint'];
    update_user_meta( $user_id, 'password_hint', $custom_data );
     $custom_data = $_POST['client_reward_program_account'];
    update_user_meta($user_id, 'client_reward_program_account', $custom_data );
     $custom_data = $_POST['work_phone'];
    update_user_meta( $user_id, 'work_phone', $custom_data );
    $custom_data = $_POST['work_phone_exten'];
    update_user_meta( $user_id, 'work_phone_exten', $custom_data );

}

/* ------ /ADD CUSTOM FIELDS OF CUSTOMER IN ADMIN MENU--------*/
/* ---------- ADD ACTION BY SHOW USER ON FRONT-END HEADER----------------*/
function get_user(){

        $user_id = get_current_user_id();
    if (!empty($user_id)) {
        $user = get_user_by('ID', $user_id);
        $username = $user->display_name;
        $all_meta_for_user = get_user_meta($user_id);
        echo '<a href='.get_home_url().'/my-account/">'.$username.'</a>';
    }
    else echo '<a href='.get_home_url().'/my-account/">Not Authorised</a>';
    }
add_action('my_show_user','get_user');
/* ---------- ADD ACTION BY SHOW USER ON FRONT-END HEADER----------------*/