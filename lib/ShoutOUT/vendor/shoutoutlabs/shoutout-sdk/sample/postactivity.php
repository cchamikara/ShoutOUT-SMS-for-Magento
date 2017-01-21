<?php
/**
 * Created by IntelliJ IDEA.
 * User: Madura
 * Date: 19/10/2016
 * Time: 15:46
 */
require_once('autoload.php');

use Swagger\Client\Api\DefaultApi;
use Swagger\Client\ApiClient;
use Swagger\Client\Configuration;
use Swagger\Client\Model\ActivityRecord;

$authorization = 'Apikey <API_KEY>';//Replace <API_KEY> with your API Key
$config = new Configuration();
$config->setDebug(true);
$config->setSSLVerification(false);

$apiClient = new ApiClient($config);

$api_instance = new DefaultApi($apiClient);
$activity_record = new ActivityRecord(array(
    'user_id' =>'xx',//Required. your account id
    //arbitrary attributes
    'activity_name' => 'User Signup',
    'activity_data'=>array(
        'name'=>'John',
        'date'=>'2016-10-19',
        'user_id'=>'reg101'
    )
));

try {
    $result = $api_instance->activitiesRecordsPost($activity_record, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->contactPut: ', $e->getMessage(), PHP_EOL;
}