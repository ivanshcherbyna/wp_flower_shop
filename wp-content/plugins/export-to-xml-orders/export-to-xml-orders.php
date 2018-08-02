<?php
/**
 *
Plugin Name: EXPORT ORDERS INFO TO XML 
Plugin URI: 
Description: this plugin generate & export bin file to sftp server
Author: developer
Version: 1.0
Author URI: 
*/


function xml_generate ($order_id){

    //global $order_id;
    $order = wc_get_order( $order_id );
    $total = $order->get_total();
    $order_data = $order->get_data(); // The Order data

    //--------------------
    $order_items = $order->get_items();

    //---------------------- GET WC ORDEER PARAMS--------------------//
    //https://stackoverflow.com/questions/39401393/how-to-get-woocommerce-order-details
    $order_id = $order_data['id'];
    $order_parent_id = $order_data['parent_id'];
    $order_status = $order_data['status'];
    $order_currency = $order_data['currency'];
    $order_version = $order_data['version'];
    $order_payment_method = $order_data['payment_method'];
    $order_payment_method_title = $order_data['payment_method_title'];
    $order_payment_method = $order_data['payment_method'];

## Creation and modified WC_DateTime Object date string ##

// Using a formated date ( with php date() function as method)
    //$order_date_created = $order_data['date_created']->date('Y-m-d H:i:s');
    $order_date_created = $order_data['date_created']->date('m/d/Y');
    $order_time_created = $order_data['date_created']->date('H:i');
    $order_date_modified = $order_data['date_modified']->date('Y-m-d H:i:s');

// Using a timestamp ( with php getTimestamp() function as method)
    $order_timestamp_created = $order_data['date_created']->getTimestamp();
    $order_timestamp_modified = $order_data['date_modified']->getTimestamp();


    $order_discount_total = $order_data['discount_total'];
    $order_discount_tax = $order_data['discount_tax'];
    $order_shipping_total = $order_data['shipping_total'];
    $order_shipping_tax = $order_data['shipping_tax'];
    $order_total = $order_data['cart_tax'];
    $order_total_tax = $order_data['total_tax'];
    $order_total_after_tax_disc=$total-$order_total_tax-$order_discount_total;
    //$order_total_tax_rate=$order_total_tax/$order_total;
    $order_customer_id = $order_data['customer_id']; // ... and so on

## BILLING INFORMATION:

    $order_billing_first_name = $order_data['billing']['first_name'];
    $order_billing_last_name = $order_data['billing']['last_name'];
    $order_billing_company = $order_data['billing']['company'];
    $order_billing_address_1 = $order_data['billing']['address_1'];
    $order_billing_address_2 = $order_data['billing']['address_2'];
    $order_billing_city = $order_data['billing']['city'];
    $order_billing_state = $order_data['billing']['state'];
    $order_billing_postcode = $order_data['billing']['postcode'];
    $order_billing_country = $order_data['billing']['country'];
    $order_billing_email = $order_data['billing']['email'];
    $order_billing_phone = $order_data['billing']['phone'];

## SHIPPING INFORMATION:

    $order_shipping_first_name = $order_data['shipping']['first_name'];
    $order_shipping_last_name = $order_data['shipping']['last_name'];
    $order_shipping_company = $order_data['shipping']['company'];
    $order_shipping_address_1 = $order_data['shipping']['address_1'];
    $order_shipping_address_2 = $order_data['shipping']['address_2'];
    $order_shipping_city = $order_data['shipping']['city'];
    $order_shipping_state = $order_data['shipping']['state'];
    $order_shipping_postcode = $order_data['shipping']['postcode'];
    $order_shipping_country = $order_data['shipping']['country'];

##MORE INFO

    ///--------------------------------------- GET WC ORDEER PARAMS--------------------//

    $rand=rand(110101111110,280301195730);
    $writer = new XMLWriter();
    $writer->openURI('vox_example.bin');
    $writer->startDocument('1.0','UTF-8');
    $writer->setIndent(4);
    $writer->startElement('VOX_ORDER');

    $writer->writeElement('SEQ_NO',  $rand.'.0012317'); //rand number
    $writer->writeElement('SUB_TRAN', '1');//№ sub-sale
    $writer->writeElement('SUBSALES', '1');// total number of line-item sales in  each order
    $writer->writeElement('STATION', '1'); //The Station Number you would like to  attach to the VT Order.
    $writer->writeElement('WIRE_IN', 'F'); //Use T for wire-in orders, F for all others
    $writer->writeElement('STAFF_ID', 'SM'); //Session_Id = Station No. + Staff_Id $writer->writeElement('LOC_ORIGIN', '01'); //The Division Number you would like to  attach to the VT order as the SALE Division.
    $writer->writeElement('ACC_ID', '6505563456');
    $writer->writeElement('ACC_ALLOC', '6505563456');
    $writer->writeElement('SALES_REF', '12317');
    $writer->writeElement('LEAD', '-1.00');
    $writer->writeElement('SENDER_F', $order_billing_first_name);//Customer (Sender’s) First Name.
    $writer->writeElement('SENDER_L', $order_billing_last_name);//Customer (Sender’s) Last Name.
    $writer->writeElement('SENDER_P', $order_billing_phone); //Customer (Sender) Phone Number.
    $writer->writeElement('CUS_ZIP', $order_billing_postcode);//Customer zip code.
    $writer->writeElement('C_COMPANY', $order_billing_company);//Customer Company.
    $writer->writeElement('C_ADDRESS', $order_billing_address_1);//Customer adress.
    $writer->writeElement('C_CITY', $order_billing_city); //Customer city
    $writer->writeElement('C_STATE', $order_billing_state/*'CA'*/);//Customer State
    $writer->writeElement('C_S_TAX', '-1.00'); // DEFAULT PARAM -1
    $writer->writeElement('TYPE_CODE', 'R'); //Customer Primary Type Code.
    $writer->writeElement('C_GST', '-1.00'); //GST Rate applied to future purchases. (default -1)
    $writer->writeElement('CODE1', '1');//Customer Secondary Type Code # 1
    $writer->writeElement('CODE2', '1');//Customer Secondary Type Code # 2
    $writer->writeElement('CODE3', '1');//Customer Secondary Type Code # 3
    $writer->writeElement('C_AUDIO', $order_billing_email);// Customer e-mail
    //$writer->writeElement('FIN_CHARGE', 'T'); //Not requred
    //$writer->writeElement('BILLING', 'T'); //Not requred
    $writer->writeElement('CUS_NOTE', '');//Customer Account Notes
    $writer->writeElement('TOTAL', $total/*$order_total*/);
    $writer->writeElement('TAXABLE', $total);// TOTAL ORDER TAXABLE
    $writer->writeElement('TAX_RATE', $order_shipping_tax/*'9.0000'*/);//tax rate
    $writer->writeElement('TAX', $order_total_tax/*'3.56'*/);//Order tax (tax_rate*total_order)
    $writer->writeElement('DISC_ABLE', !empty($order_discount_total)?$order_discount_total:'');// total discount
    $writer->writeElement('GRAND_TOT', $total);
    $writer->writeElement('TOT_W_TAX', $order_total_after_tax_disc);//total without tax & discount
    $writer->writeElement('BY_CCARD', $total);// Sum by card payed
    $writer->writeElement('BY_BILLED', '');//The amount charged to Customer  account.  Note: Only applicable to Account Sales.
    $writer->writeElement('CHANGE', '');//The amount of cash paid BACK to the customer as change. If this amount is calculated to be negative, order will not be stamped “paid”.
    $writer->writeElement('AUTH_NO', 'WEB');//If an Authorization number has already  been obtained
    $writer->writeElement('APPROVED', 'WEB');//If Credit Card authorization has already been obtained, then enter it here.
    $writer->writeElement('FORCE', 'T');//If the Authorization number has been  inserted into the above field, then this field must be set to T.
    $writer->writeElement('FOB', '');// Freight On Board. Any notes regarding delivery. The first 80 positions are used. Positions 80 thru 99 are RESERVED
    $writer->writeElement('CODE', 'O');//Type of Sale. Use C for Cash&Carry, P for Pickup, D for Local Delivery, I for wireIn, O for wireOut types of sales.
    $writer->writeElement('ITEM_ID', 'ALL_ELSE'); //item id If no item is found in the Inventory that it’s key words can be matched against the contents of Key_words, or Choice_1, then the item with key word “ALL_ELSE”in it’s keyword setup is selected.
    $writer->writeElement('KEY_WORDS', '');
//https://stackoverflow.com/questions/40711160/woocommerce-getting-the-order-item-price-and-quantity
    foreach ( $order_items as $item_id => $item_data ) {

        //$_product_price = get_post_meta($item_id, 'price', TRUE);
       // var_dump($item_data); die;
//        $post=get_post($item_id);
        $product_price= get_post_meta($item_id,'_price',true);
        $product_= wc_get_product($item_id);
    var_dump($product_);
//        $price = $_product->get_price();
    $fp = fopen('item_id.txt', 'w');
//
    fwrite($fp, print_r($item_id, TRUE));
    fclose($fp);
//
//        $writer->writeElement('QTY', $order->wc_get_order_item_meta($item_id, '_qty', true));//quantity
        $writer->writeElement('PRICE', $product_price);//price
        $writer->writeElement('I_TAXABLE', 'T');
        $writer->writeElement('I_GSTABLE', 'F');
        $writer->writeElement('SERV_CHG', '');
        $writer->writeElement('S_CHG_TAX', 'T');
        $writer->writeElement('DELIV_CHG', '0.00');
        $writer->writeElement('D_CHG_TAX', '0.00');
       // $writer->writeElement('CHOICE_1', $_product_name.' '.$roduct_price);//title order product with price
        $writer->writeElement('CHOICE_2', '');//


    }

//    $writer->writeElement('PRICE', '222');//price
//    $writer->writeElement('I_TAXABLE', 'T');
//    $writer->writeElement('I_GSTABLE', 'F');
//    $writer->writeElement('SERV_CHG', '');
//    $writer->writeElement('S_CHG_TAX', 'T');
//    $writer->writeElement('DELIV_CHG', '0.00');
//    $writer->writeElement('D_CHG_TAX', '0.00');
//    $writer->writeElement('CHOICE_1', 'TITLE PRODUCT');//title order product with price
//    $writer->writeElement('CHOICE_2', '');//
//    $writer->writeElement('QTY', '1');//quantity


    $writer->writeElement('DUE_DATE1', $order_date_created);//date
    $writer->writeElement('DUE_DATE2', $order_date_created);//date
    $writer->writeElement('DUE_OPT', '1- Anytime During the day ');
    $writer->writeElement('DUE_TIME1', $order_time_created);
    $writer->writeElement('DUE_TIME2', $order_time_created);
    $writer->writeElement('PROD_P_REQ', 'T');
    $writer->writeElement('CARD_P_REQ', 'T');
    $writer->writeElement('DEL_P_REQ', 'T');
    $writer->writeElement('FIRST_NAME', $order_shipping_first_name);
    $writer->writeElement('LAST_NAME', $order_shipping_last_name);
    $writer->writeElement('COMPANY', $order_shipping_company);
    $writer->writeElement('ADDRESS1', $order_shipping_address_1);
    $writer->writeElement('CITY', $order_shipping_city);
    $writer->writeElement('STATE', $order_shipping_state);
    $writer->writeElement('ZIP', $order_shipping_postcode);
    $writer->writeElement('COUNTRY', $order_shipping_country);
    $writer->writeElement('PHONE_DAY', $order_billing_phone);
    $writer->writeElement('DELIV_ACC', '');
    $writer->writeElement('MEMO', 'TEST');
    $writer->writeElement('GET_DELCHG', 'T');
    $writer->writeElement('CARD_MSG', 'TEST');
    $writer->writeElement('OCC_TYPE', '');
    $writer->writeElement('DATE_MADE', '');//Date the item was made (Production).
    $writer->writeElement('ACC_ALLOC', 'v2_edmondsfloral_com');
//    $writer->writeElement('UPD_CUS', 'T');//The section below applies only to  Account Sales (The Acc_Id above must not be BLANK).
    $writer->writeElement('ATTENTION', 'T'); //Setting this flag to T will stamp the  Order “Need Attention”. Such orders are placed On-Hold (Processing and Print  Agents) until the Attention stamp is removed by the Operator.
    $writer->writeElement('MESSAGE', 'Web Order, Please Review...');
    $writer->writeElement('CHECK', 'CHECK');



    $writer->endElement();
    $writer->endDocument();
    $writer->flush();


// save debug file for read.
//    $fp = fopen('debug_array_sum_line_items_quantity.txt', 'w');
//
//    fwrite($fp, print_r($order->get_items(), TRUE));
//    fclose($fp);

}
function send_xml_file_to_server(){
    $file = 'vox_example.bin';
    $remote_file = '/vox/vox_example_remote.bin';
    $ftp_user_name = 'vox-C4AE-F246-F6CA-932B';
    $ftp_user_pass = '178F-9C92-D5A4-6FF1';

    // create connect sftp
    $connection=ssh2_connect('vox-alpha.websystems.com','33497');

    if(ssh2_auth_password($connection, $ftp_user_name, $ftp_user_pass)){
        // Create SFTP session
        $sftp = ssh2_sftp($connection);
        $sftpStream = fopen('ssh2.sftp://'.$sftp.$remote_file, 'w');
        try {

            if (!$sftpStream) {
                throw new Exception("Could not open remote file: $remote_file");
            }

            $data_to_send = file_get_contents($file);

            if ($data_to_send === false) {
                throw new Exception("Could not open local file: $file.");
            }

            if (fwrite($sftpStream, $data_to_send) === false) {
                throw new Exception("Could not send data from file: $file.");
            }

            fclose($sftpStream);

        } catch (Exception $e) {
            error_log('Exception: ' . $e->getMessage());
            fclose($sftpStream);
        }
    } else {
        echo "connection failed\n";
    }
return 'Success';

}
function export_woocommerce_order_status_completed( $order_id ) {
    xml_generate($order_id);
   //send_xml_file_to_server();

}
add_action( 'woocommerce_order_status_completed', 'export_woocommerce_order_status_completed', 10, 1 );
//add_action( 'woocommerce_order_status_processing', 'export_woocommerce_order_status_completed', 10, 1 );

