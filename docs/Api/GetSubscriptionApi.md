# Telstra_EventDetection\GetSubscriptionApi

All URIs are relative to *https://tapi.telstra.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getSubscription**](GetSubscriptionApi.md#getSubscription) | **POST** /v1/eventdetection/events/subscriptions | Get Event Subscriptions


# **getSubscription**
> \Telstra_EventDetection\Model\GetSubscriptionResponse getSubscription($body)

Get Event Subscriptions

Get the list of events subscribed for

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: auth
$config = Telstra_EventDetection\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Telstra_EventDetection\Api\GetSubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Telstra_EventDetection\Model\PhoneNumberList(); // \Telstra_EventDetection\Model\PhoneNumberList | List of subscribed phone numbers

try {
    $result = $apiInstance->getSubscription($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GetSubscriptionApi->getSubscription: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Telstra_EventDetection\Model\PhoneNumberList**](../Model/PhoneNumberList.md)| List of subscribed phone numbers |

### Return type

[**\Telstra_EventDetection\Model\GetSubscriptionResponse**](../Model/GetSubscriptionResponse.md)

### Authorization

[auth](../../README.md#auth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

