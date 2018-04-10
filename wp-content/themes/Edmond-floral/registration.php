<?php
    /*
     * Template Name: Registration page
     *
     */
?>
<?php get_header();?>


<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
    <div class="register-wrap">

    <div class="register-heading">Create Account</div>
    <div class="register-subheading">*Required</div>




        <div class="account-payment-wrap">
        <div class="register-block-heading"><?php esc_html_e( 'Account information', 'woocommerce' ); ?></div>

        <form method="post" class="register">
            <div class="u-column2 col-2">
            <?php do_action( 'woocommerce_register_form_start' ); ?>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
                    <input type="text" required class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                </div>

            <?php endif; ?>

            <div class="woocommerce-form-row woocommerce-form-row--wide inputs-wrap">

                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_html_e( 'Email address', 'woocommerce' ); ?> " name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
                <input type="password" required class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?> " name="password" id="reg_password" />
                <?php endif; ?>
                <input type="text" required class="woocommerce-Input woocommerce-Input--text input-text" name="password_hint" id="reg_password_hint" placeholder="Password Hint" value="<?php echo ( ! empty( $_POST['password_hint'] ) ) ? esc_attr( wp_unslash( $_POST['password_hint'] ) ) : ''; ?>"/>
                <input type="text"  class="woocommerce-Input woocommerce-Input--text input-text" name="client_reward_program_account" id="reg_client_reward_program_account" placeholder="Client reward program account #" value="<?php echo ( ! empty( $_POST['client_reward_program_account'] ) ) ? esc_attr( wp_unslash( $_POST['client_reward_program_account'] ) ) : ''; ?>"/>

            </div>

    </div>
        </div>
        <div class="billing-wrap">
            <div class="register-block-heading">Billing Information</div>
            <div class="inputs-wrap">
                <input type="text" required class="input-text" placeholder="<?php esc_html_e( 'First name', 'woocommerce' ); ?>"  name="billing_first_name" id="reg_first_name"/>
                <input type="text" required class="input-text" placeholder="<?php esc_html_e( 'Last name', 'woocommerce' ); ?>"   name="billing_last_name"  id="reg_last_name" />
                <input type="text" class="input-text" placeholder="<?php esc_html_e( 'Company', 'woocommerce' ); ?>"     name="billing_company"    id="reg_company"   />
                <input type="text" class="input-text" placeholder="<?php esc_html_e( 'Address 1', 'woocommerce' ); ?>"   name="billing_address_1"   id="reg_address1"  />
                <input type="text" class="input-text" placeholder="<?php esc_html_e( 'Address 2', 'woocommerce' ); ?>"   name="billing_address_2"   id="reg_address2"  />
                <div class="two-inputs">
                    <input type="text" required class="input-text" placeholder="City" name="billing_city" id="reg_city"/>
                    <?php
                    $countries_obj = new WC_Countries();
                    $countries_array = $countries_obj->get_countries();
                    $country_states_array = $countries_obj->get_states();
                    $arraytates = $country_states_array['US'];
                    ?>
                    <select hidden class="input-text" name="billing_country" id="reg_country" >
                    <option selected value="US">US</option>
                    </select>
                    <select class="selectpicker" title="State" name="billing_state" data-width="171px">
                    <?php
                        foreach ($arraytates as $state){
                            echo '<option value="'.$state.'">'.$state.'</option>';
                        }
                    ?>
                    </select>
                </div>
                <input type="number" placeholder="Zip Code" class="input-text" name="billing_postcode" id="reg_billing_zip"
                       value="<?php echo ( ! empty( $_POST['billing_postcode'] ) ) ? esc_attr( wp_unslash( $_POST['billing_postcode'] ) ) : ''; ?>">
                <input type="number" required placeholder="Home Phone (xxx-xxx-xxxx)"  class="input-text" name="billing_phone" id="reg_billing_phone"
                       value="<?php echo ( ! empty( $_POST['billing_phone'] ) ) ? esc_attr( wp_unslash( $_POST['billing_phone'] ) ) : ''; ?>">
                <div class="two-inputs">
                    <input type="number" placeholder="Work Phone" class="input-text" name="work_phone" id="reg_work_billing_phone"
                           value="<?php echo ( ! empty( $_POST['work_phone'] ) ) ? esc_attr( wp_unslash( $_POST['work_phone'] ) ) : ''; ?>">
                    <input type="number" placeholder="Work Phone (exten)" class="input-text" name="work_phone_exten" id="reg_work_billing_phone_exten"
                           value="<?php echo ( ! empty( $_POST['work_phone_exten'] ) ) ? esc_attr( wp_unslash( $_POST['work_phone_exten'] ) ) : ''; ?>">
                </div>
            </div>
        </div>

        <?php do_action( 'woocommerce_register_form' ); ?>
        <div class="account-options">
            <div class="options-heading">Account Options</div>
            <div class="checkbox-wrap">
                <input type="checkbox" id="test" checked="checked" />
                <label for="test">Would you like to join our client rewards programs for exclusive offer and upgrades on every fourth order ? you will
                    be subscribed to our promotional email program</label>
            </div>
        </div>
        <div class="woocommerce-FormRow btn-wrap">
            <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
            <button type="submit" class="woocommerce-Button button create-account-btn" name="register" value="<?php esc_attr_e( 'Create Account', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
        </div>

    <?php do_action( 'woocommerce_register_form_end' ); ?>

    </form>
    </div>

<?php endif; ?>

<?php

?>



<?php get_footer(); ?>
