# Telstra_EventDetection\LongPollApi

All URIs are relative to *https://tapi.telstra.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**longpoll**](LongPollApi.md#longpoll) | **POST** /v1/eventdetection/events/{eventType} | Poll events


# **longpoll**
> \Telstra_EventDetection\Model\GetEventResponse longpoll($event_type, $body)

Poll events

Poll events for a given set of mobile numbers

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: auth
$config = Telstra_EventDetection\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Telstra_EventDetection\Api\LongPollApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$event_type = "event_type_example"; // string | Event Type
$body = new \Telstra_EventDetection\Model\PollingObj(); // \Telstra_EventDetection\Model\PollingObj | List of phone numbers on which polling has to be performed

try {
    $result = $apiInstance->longpoll($event_type, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LongPollApi->longpoll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **event_type** | **string**| Event Type |
 **body** | [**\Telstra_EventDetection\Model\PollingObj**](../Model/PollingObj.md)| List of phone numbers on which polling has to be performed |

### Return type

[**\Telstra_EventDetection\Model\GetEventResponse**](../Model/GetEventResponse.md)

### Authorization

[auth](../../README.md#auth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

