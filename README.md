# Messaging SDK


- API version: 1.0.0
- Package version: 1.0.0

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/Telstra/Telstra_EventDetection.git"
    }
  ],
  "require": {
    "Telstra/Telstra_EventDetection": "*"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Telstra_EventDetection\Api\AuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$client_id = "client_id_example"; // string | 
$client_secret = "client_secret_example"; // string | 
$grant_type = "client_credentials"; // string | 

try {
    $result = $apiInstance->authToken($client_id, $client_secret, $grant_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthenticationApi->authToken: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://tapi.telstra.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AuthenticationApi* | [**authToken**](docs/Api/AuthenticationApi.md#authtoken) | **POST** /v2/oauth/token | Generate authentication token
*GetSubscriptionApi* | [**getSubscription**](docs/Api/GetSubscriptionApi.md#getsubscription) | **POST** /v1/eventdetection/events/subscriptions | Get Event Subscriptions
*LongPollApi* | [**longpoll**](docs/Api/LongPollApi.md#longpoll) | **POST** /v1/eventdetection/events/{eventType} | Poll events
*PushNotificationsApi* | [**pushNotifications**](docs/Api/PushNotificationsApi.md#pushnotifications) | **POST** /v1/eventdetection/events/notifications | Push event notifications
*RegistrationApi* | [**register**](docs/Api/RegistrationApi.md#register) | **POST** /v1/eventdetection/events | Register
*RegistrationApi* | [**unregister**](docs/Api/RegistrationApi.md#unregister) | **DELETE** /v1/eventdetection/events/{eventType} | Unregister


## Documentation For Models

 - [Eventsattr](docs/Model/Eventsattr.md)
 - [GetEventResponse](docs/Model/GetEventResponse.md)
 - [GetSubscriptionResponse](docs/Model/GetSubscriptionResponse.md)
 - [NotificationPayload](docs/Model/NotificationPayload.md)
 - [OAuthResponse](docs/Model/OAuthResponse.md)
 - [PhoneNumberList](docs/Model/PhoneNumberList.md)
 - [PollingObj](docs/Model/PollingObj.md)
 - [PushNotificationObj](docs/Model/PushNotificationObj.md)
 - [ResisterPhoneNumberList](docs/Model/ResisterPhoneNumberList.md)
 - [ServiceEventsAttr](docs/Model/ServiceEventsAttr.md)
 - [SubscriptionObj](docs/Model/SubscriptionObj.md)
 - [Subscriptionattr](docs/Model/Subscriptionattr.md)
 - [Test](docs/Model/Test.md)
 - [UnregisterRequestObj](docs/Model/UnregisterRequestObj.md)


## Documentation For Authorisation


## auth

- **Type**: OAuth
- **Flow**: application
- **Authorisation URL**: 
- **Scopes**: 
 - **v1_eventdetection_simswap**: v1_eventdetection_simswap




