<?php
/**
 * Created by IntelliJ IDEA.
 * User: Madura
 * Date: 19/10/2016
 * Time: 13:12
 */
require_once('autoload.php');

use Swagger\Client\Api\DefaultApi;
use Swagger\Client\ApiClient;
use Swagger\Client\Configuration;
use Swagger\Client\Model\Contact;

$authorization = 'Apikey <API_KEY>';//Replace <API_KEY> with your API Key
$config = new Configuration();
$config->setDebug(true);
$config->setSSLVerification(false);

$apiClient = new ApiClient($config);

$api_instance = new DefaultApi($apiClient);
$contact = new Contact(array(
    'mobile_number' => array('s' => '94778845713'),//Required if not specified user_id
    'user_id' => array('s' => '94778845713'),//Optional. if specified, this will be used to generate the contact id, otherwise mobile_number will be used to generate contact id
    //arbitrary attributes
    'email' => array('s' => 'madura@sqrmobile.com'),
    'tags' => array('sS' => ['lead']),
    'name' => array('s' => "Madura")
));

try {
    $result = $api_instance->contactsPut($contact, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->contactPut: ', $e->getMessage(), PHP_EOL;
}