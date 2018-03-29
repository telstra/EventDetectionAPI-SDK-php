# Telstra_EventDetection\PushNotificationsApi

All URIs are relative to *https://tapi.telstra.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**pushNotifications**](PushNotificationsApi.md#pushNotifications) | **POST** /v1/eventdetection/events/notifications | Push event notifications


# **pushNotifications**
> \Telstra_EventDetection\Model\PushNotificationObj pushNotifications($content_type, $body)

Push event notifications

Push event notifications to the notification URL configured during the MSISDN registration process

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Telstra_EventDetection\Api\PushNotificationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$content_type = "content_type_example"; // string | application/json
$body = new \Telstra_EventDetection\Model\NotificationPayload(); // \Telstra_EventDetection\Model\NotificationPayload | Application Id, MSISDN, Event Id and Event Date

try {
    $result = $apiInstance->pushNotifications($content_type, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PushNotificationsApi->pushNotifications: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **content_type** | **string**| application/json |
 **body** | [**\Telstra_EventDetection\Model\NotificationPayload**](../Model/NotificationPayload.md)| Application Id, MSISDN, Event Id and Event Date |

### Return type

[**\Telstra_EventDetection\Model\PushNotificationObj**](../Model/PushNotificationObj.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

