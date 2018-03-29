# Telstra_EventDetection\RegistrationApi

All URIs are relative to *https://tapi.telstra.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**register**](RegistrationApi.md#register) | **POST** /v1/eventdetection/events | Register
[**unregister**](RegistrationApi.md#unregister) | **DELETE** /v1/eventdetection/events/{eventType} | Unregister


# **register**
> \Telstra_EventDetection\Model\ResisterPhoneNumberList register($body)

Register

Register for an event

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: auth
$config = Telstra_EventDetection\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Telstra_EventDetection\Api\RegistrationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Telstra_EventDetection\Model\SubscriptionObj(); // \Telstra_EventDetection\Model\SubscriptionObj | Subscribe with a list of phone numbers, push notification URL (optional) and the event type.

try {
    $result = $apiInstance->register($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RegistrationApi->register: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Telstra_EventDetection\Model\SubscriptionObj**](../Model/SubscriptionObj.md)| Subscribe with a list of phone numbers, push notification URL (optional) and the event type. |

### Return type

[**\Telstra_EventDetection\Model\ResisterPhoneNumberList**](../Model/ResisterPhoneNumberList.md)

### Authorization

[auth](../../README.md#auth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **unregister**
> \Telstra_EventDetection\Model\ResisterPhoneNumberList unregister($event_type, $body)

Unregister

Unregister from an event

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: auth
$config = Telstra_EventDetection\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Telstra_EventDetection\Api\RegistrationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$event_type = "event_type_example"; // string | Event Type
$body = new \Telstra_EventDetection\Model\UnregisterRequestObj(); // \Telstra_EventDetection\Model\UnregisterRequestObj | List of subscribed phone numbers and notification URL (optional)

try {
    $result = $apiInstance->unregister($event_type, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RegistrationApi->unregister: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **event_type** | **string**| Event Type |
 **body** | [**\Telstra_EventDetection\Model\UnregisterRequestObj**](../Model/UnregisterRequestObj.md)| List of subscribed phone numbers and notification URL (optional) |

### Return type

[**\Telstra_EventDetection\Model\ResisterPhoneNumberList**](../Model/ResisterPhoneNumberList.md)

### Authorization

[auth](../../README.md#auth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

