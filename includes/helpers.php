<?php

/**
 * This file contains settings for qterest;
 */

namespace QTEREST\Helpers;

use DrewM\MailChimp\MailChimp;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * This function validates email adress using filter_var()
 *
 * @param string $email Email adress to validate
 *
 * @return boolean
 */
function validate_email($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

/**
 * This function returns the ip address for the client
 *
 * @return string
 */
function get_client_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

/**
 * This function checks if the mailchimp api key enterd in the settings page is valid
 *
 * @return boolean
 */
function mailchimp_api_key_is_valid()
{

    $options = get_option('qterest_options');

    $option_key = "qterest_field_mailchimp_api_key";

    try {
        $MailChimp = new MailChimp($options[$option_key]);
    } catch (\Exception $e) {
        return false;
    }

    $response = $MailChimp->get("");

    if (isset($response['account_id'])) {
        return true;
    }

    return false;

}


/**
 * This function returns the notification email enter on the qterest settings page
 * 
 * @return mixed Null if not enterd
 */
function maybe_get_notification_email(){

    $options = get_option('qterest_options');

    $option_key = "qterest_field_contact_notification_email";

    $email = isset($options[$option_key]) ? $options[$option_key] : "";

    if(!empty($email)){
        return $email;
    } 

    return NULL;
}

/**
 * This function searchs for name in with other keys like first_name and last_name
 * 
 * @param array $params array
 * 
 * @return mixed
 */
function maybe_fix_name($params){


    if(isset($params['first_name'], $params['last_name']) && !empty($params['first_name']) && !empty($params['last_name']) ){

        $params['name'] = $params['first_name'] . " " . $params['last_name'];

        return $params;

    }

    if(isset($params['first-name'], $params['last-name']) && !empty($params['first-name']) && !empty($params['last-name']) ){

        $params['name'] = $params['first-name'] . " " . $params['last-name'];

        return $params;

    }

    return $params;



}