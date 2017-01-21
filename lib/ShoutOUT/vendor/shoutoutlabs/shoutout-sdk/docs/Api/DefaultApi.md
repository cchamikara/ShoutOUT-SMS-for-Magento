# Swagger\Client\DefaultApi

All URIs are relative to *https://amdimbh5tf.execute-api.us-east-1.amazonaws.com/v7*

Method | HTTP request | Description
------------- | ------------- | -------------
[**activitiesPost**](DefaultApi.md#activitiesPost) | **POST** /activities | 
[**activitiesRecordsPost**](DefaultApi.md#activitiesRecordsPost) | **POST** /activities/records | 
[**contactsPost**](DefaultApi.md#contactsPost) | **POST** /contacts | 
[**contactsPut**](DefaultApi.md#contactsPut) | **PUT** /contacts | 
[**messagesPost**](DefaultApi.md#messagesPost) | **POST** /messages | 


# **activitiesPost**
> \Swagger\Client\Model\Response activitiesPost($activity, $authorization)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ShoutOUTCustomAuthorizer
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');

Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Apikey');

$api_instance = new Swagger\Client\Api\DefaultApi();
$activity = new \Swagger\Client\Model\Activity(); // \Swagger\Client\Model\Activity | 
$authorization = "authorization_example"; // string | 

try {
    $result = $api_instance->activitiesPost($activity, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->activitiesPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **activity** | [**\Swagger\Client\Model\Activity**](../Model/\Swagger\Client\Model\Activity.md)|  |
 **authorization** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\Response**](../Model/Response.md)

### Authorization

[ShoutOUTCustomAuthorizer](../../README.md#ShoutOUTCustomAuthorizer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **activitiesRecordsPost**
> \Swagger\Client\Model\Response activitiesRecordsPost($activity_record, $authorization)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ShoutOUTCustomAuthorizer
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\DefaultApi();
$activity_record = new \Swagger\Client\Model\ActivityRecord(); // \Swagger\Client\Model\ActivityRecord | 
$authorization = "authorization_example"; // string | 

try {
    $result = $api_instance->activitiesRecordsPost($activity_record, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->activitiesRecordsPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **activity_record** | [**\Swagger\Client\Model\ActivityRecord**](../Model/\Swagger\Client\Model\ActivityRecord.md)|  |
 **authorization** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\Response**](../Model/Response.md)

### Authorization

[ShoutOUTCustomAuthorizer](../../README.md#ShoutOUTCustomAuthorizer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **contactsPost**
> contactsPost($contact, $authorization)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ShoutOUTCustomAuthorizer
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\DefaultApi();
$contact = new \Swagger\Client\Model\Contact(); // \Swagger\Client\Model\Contact | 
$authorization = "authorization_example"; // string | 

try {
    $api_instance->contactsPost($contact, $authorization);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->contactsPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **contact** | [**\Swagger\Client\Model\Contact**](../Model/\Swagger\Client\Model\Contact.md)|  |
 **authorization** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[ShoutOUTCustomAuthorizer](../../README.md#ShoutOUTCustomAuthorizer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **contactsPut**
> \Swagger\Client\Model\Contact contactsPut($contact, $authorization)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ShoutOUTCustomAuthorizer
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\DefaultApi();
$contact = new \Swagger\Client\Model\Contact(); // \Swagger\Client\Model\Contact | 
$authorization = "authorization_example"; // string | 

try {
    $result = $api_instance->contactsPut($contact, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->contactsPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **contact** | [**\Swagger\Client\Model\Contact**](../Model/\Swagger\Client\Model\Contact.md)|  |
 **authorization** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\Contact**](../Model/Contact.md)

### Authorization

[ShoutOUTCustomAuthorizer](../../README.md#ShoutOUTCustomAuthorizer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **messagesPost**
> \Swagger\Client\Model\MessageResponse messagesPost($message, $authorization)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ShoutOUTCustomAuthorizer
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\DefaultApi();
$message = new \Swagger\Client\Model\Message(); // \Swagger\Client\Model\Message | 
$authorization = "authorization_example"; // string | 

try {
    $result = $api_instance->messagesPost($message, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->messagesPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **message** | [**\Swagger\Client\Model\Message**](../Model/\Swagger\Client\Model\Message.md)|  |
 **authorization** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\MessageResponse**](../Model/MessageResponse.md)

### Authorization

[ShoutOUTCustomAuthorizer](../../README.md#ShoutOUTCustomAuthorizer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

