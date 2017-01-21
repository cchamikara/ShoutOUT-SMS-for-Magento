# ShoutOUT PHP SDK

This is the PHP SDK for ShoutOUT

- API version: 2016-05-02T13:02:33Z
- Package version: 
- Build date: 2016-06-06T08:37:50.274Z
- Build package: class io.swagger.codegen.languages.PhpClientCodegen

## Requirements

PHP 5.4.0 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com//.git"
    }
  ],
  "require": {
    "/": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/SwaggerClient-php/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit lib/Tests
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ShoutOUTCustomAuthorizer
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

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

## Documentation for API Endpoints

All URIs are relative to *https://amdimbh5tf.execute-api.us-east-1.amazonaws.com/v7*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DefaultApi* | [**activitiesPost**](docs/Api/DefaultApi.md#activitiespost) | **POST** /activities | 
*DefaultApi* | [**activitiesRecordsPost**](docs/Api/DefaultApi.md#activitiesrecordspost) | **POST** /activities/records | 
*DefaultApi* | [**contactsPost**](docs/Api/DefaultApi.md#contactspost) | **POST** /contacts | 
*DefaultApi* | [**contactsPut**](docs/Api/DefaultApi.md#contactsput) | **PUT** /contacts | 
*DefaultApi* | [**messagesPost**](docs/Api/DefaultApi.md#messagespost) | **POST** /messages | 


## Documentation For Models

 - [Activity](docs/Model/Activity.md)
 - [ActivityRecord](docs/Model/ActivityRecord.md)
 - [Contact](docs/Model/Contact.md)
 - [Message](docs/Model/Message.md)
 - [MessageContent](docs/Model/MessageContent.md)
 - [MessageResponse](docs/Model/MessageResponse.md)
 - [Response](docs/Model/Response.md)


## Documentation For Authorization


## ShoutOUTCustomAuthorizer

- **Type**: API key
- **API key parameter name**: Authorization
- **Location**: HTTP header


## Author

Square Mobile



