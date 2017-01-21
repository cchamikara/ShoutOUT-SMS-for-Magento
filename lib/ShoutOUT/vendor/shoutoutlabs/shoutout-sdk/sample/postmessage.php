<?php
/**
 * Created by IntelliJ IDEA.
 * User: asankanissanka
 * Date: 6/6/16
 * Time: 9:34 PM
 */
require_once('autoload.php');

use Swagger\Client\Api\DefaultApi;
use Swagger\Client\ApiClient;
use Swagger\Client\Configuration;
use Swagger\Client\Model\Message;

$authorization = 'Apikey <API_KEY>';
$config = new Configuration();
$config->setDebug(true);
$config->setSSLVerification(false);

$apiClient = new ApiClient($config);

$api_instance = new DefaultApi($apiClient);
$message = new Message(array(
    'source' => 'ShoutDEMO',
    'destinations' => ['94718121914'],
    'content' => array(
        'sms' => 'Sent via SMS Gateway'
    ),
    'transports' => ['SMS']
));

try {
    echo $message->__toString();
    $result = $api_instance->messagesPost($message, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->messagesPost: ', $e->getMessage(), PHP_EOL;
}