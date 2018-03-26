# Messaging SDK
# Introduction Telstra's Event Detection API provides the ability to subscribe to and receive mobile network events for a given set of mobile numbers on Telstra's mobile network, such as; SIMswap, port-in, port-out, carrier-detection and international roaming events. ## Features Event Detection API provides these features   | Feature              | Description |   |---|---|   |`SIMswap` | Returns a timestamped event for a particular mobile number for SIM swap, port-in, port-out and cancelled events on Telstra's mobile network |   |`Carrier Detection` | Find out what Australian carrier a mobile number is subscribed to |   |`International Roaming` | *Coming soon.* Detect roaming events when a particular mobile number connects to an international carrier |  ## Getting access to the API The Event Detection API is available on our Enterprise Plans only. Please submit your [sales enquiry](https://dev.telstra.com/content/sales-enquiry-contact-form) . Or contact your Telstra Account Executive. We're available Monday to Friday 9am - 5pm. ## Frequently asked questions **Q: What Events does the Telstra Events Detection API report?** A: Events occurring within our network or in relation to our network. Examples include: SIM Swap, Port-in and Port-out  **Q: How quickly are the network events reported?** A: This will vary from event to event and will depend on the circumstances but we aim to report it as quickly as possible typically within seconds of occurrence (in near real-time)  **Q: How long is the event data stored by Telstra?** A: 90 days  **Q: Do you provide event data relating to other carriers?** A: Only if it relates to our network; for example an port-into Telstra from another service provider  **Q: Who can access this data?** A: Access is restricted to personnel that support the service and customers who have agreed to Telstra terms of service    # Getting Started First step is to create an `App`. After you've created an `App`, follow these steps 1. Authenticate by getting an Oauth token 2. Use the Event Detection API ## Run in Postman To get started quickly and easily with all the features of the Event Detection API, download the Postman collection here  <a href=\"https://app.getpostman.com/run-collection/efcaf747d3cb76784787#?env%5BMessaging%20API%20Environments%5D=W3siZW5hYmxlZCI6dHJ1ZSwia2V5IjoiY2xpZW50X2lkIiwidHlwZSI6InRleHQiLCJ2YWx1ZSI6IiJ9LHsiZW5hYmxlZCI6dHJ1ZSwia2V5IjoiY2xpZW50X3NlY3JldCIsInR5cGUiOiJ0ZXh0IiwidmFsdWUiOiIifSx7ImVuYWJsZWQiOnRydWUsImtleSI6ImFjY2Vzc190b2tlbiIsInR5cGUiOiJ0ZXh0IiwidmFsdWUiOiIifSx7ImVuYWJsZWQiOnRydWUsImtleSI6Imhvc3QiLCJ0eXBlIjoidGV4dCIsInZhbHVlIjoidGFwaS50ZWxzdHJhLmNvbSJ9LHsiZW5hYmxlZCI6dHJ1ZSwia2V5IjoiQXV0aG9yaXphdGlvbiIsInR5cGUiOiJ0ZXh0IiwidmFsdWUiOiIifSx7ImVuYWJsZWQiOnRydWUsImtleSI6Im9hdXRoLWhvc3QiLCJ0eXBlIjoidGV4dCIsInZhbHVlIjoic2FwaS50ZWxzdHJhLmNvbSJ9XQ==\"><img alt=\"Run in Postman\" src=\"https://run.pstmn.io/button.svg\" /></a> ## Authentication   To get an OAuth 2.0 Authentication token, pass through your Consumer Key and Consumer Secret that you received when you registered for the Event Detection API key. The `grant_type` should be left as `client_credentials` and the scope as v1_eventdetection_simswap. The token will expire in one hour. Get your keys by creating an `App`.    # Request   ` CONSUMER_KEY=\"your consumer key\"   CONSUMER_SECRET=\"your consumer secret\"   curl -X POST -H 'Content-Type: application/x-www-form-urlencoded' \\   -d 'grant_type=client_credentials&client_id=$CONSUMER_KEY&client_secret=$CONSUMER_SECRET&scope=v1_eventdetection_simswap' \\   'https://sapi.telstra.com/v2/oauth/token' `    # Response    `{       \"access_token\" : \"1234567890123456788901234567\",       \"token_type\" : \"Bearer\",       \"expires_in\" : \"3599\"   }`  ## Subscribe mobile numbers Subscribing users mobile numbers informs the API to register that mobile number so that you can poll those numbers for particular events. You can subscribe and unsubscribe numbers (opt in and opt out) against this service. Only numbers that are opted in (i.e. subscribed) can be polled for events.  # Request  `curl -X POST -H 'content-type: application/json' \\ -H 'Authorisation: Bearer $TOKEN' \\ -d '{ \"phoneNumbers\": [     \"61467754783\" ], \"eventType\": \"simswap\", \"notificationUrl\": \"https://requestb.in/161r14g1\" }' \\ 'https://tapi.telstra.com/v1/eventdetection/events'`  # Response  `{     \"phoneNumbers\": [       {         \"phoneNumber\": \"61467754783\",         \"message\": \"opt-in status updated for this MSISDN\"     }   ] }` | Parameter              | Description |   |---|---|   |`phoneNumbers` | List of mobile numbers that has to be registered for the event |   |`eventType` | Event Type to be subscribed to |   |`notificationUrl` | URL where the event notifications has to be posted (Optional) |  ## Unsubscribe mobile numbers Unsubscribe mobile numbers against a particular event  # Request  `curl -X DELETE -H 'content-type: application/json' \\   -H 'Authorisation: Bearer $token' \\   -d '{\"phoneNumbers\": [\"61467754783\"]}' \\   'https://tapi.telstra.com/v1/eventdetection/events/{event-type}'`   # Response     ` {     \"phoneNumbers\": [       {         \"phoneNumber\": \"61467754783\",         \"message\": \"opt-out status updated for this MSISDN\"       }     ]   } `  | Parameter              | Description |   |---|---|   |`phoneNumbers` | List of mobile numbers that has to be unsubscribed from the event |   |`eventType` | Event Type to be unsubscribed from |   |`notificationUrl` | Notification URL that has to be removed (Optional) |  ## Get event subscriptions Get the list of events subscribed for  # Request  `curl -X POST -H 'content-type: application/json' \\   -H 'Authorisation: Bearer $TOKEN' \\   -d '{ \"phoneNumbers\": [ \"61467754783\" ] }' \\   'https://tapi.telstra.com/v1/eventdetection/events/subscriptions'`  # Response  ` {   \"notificationURL\": \"https://requestb.in/161r14g1\",   \"subscriptions\": [     {         \"phoneNumber\": \"61467754783\",         \"events\": [             \"SIM_SWAP\"         ]     }   ] } ` | Parameter              | Description |   |---|---|   |`phoneNumbers` | List of mobile numbers to get the subscription details |  ## Poll events Poll events for a given set of mobile numbers  # Request `curl -X POST -H 'content-type: application/json' \\   -H 'Authorisation: Bearer $token' \\   -d '{ \"phoneNumbers\": [ \"61467754783\" ] }' \\   'https://tapi.telstra.com/v1/eventdetection/events/{event_type}'`  # Response  ` {   \"eventname\": \"simswap\",   \"phoneNumbers\": [       {         \"phoneNumber\": \"+61467754783\",         \"events\": [             \"2018-01-19T14:40:34\"         ]       }   ] } ` | Parameter              | Description |   |---|---|   |`phoneNumbers` | List of mobile numbers to be polled for events |   |`eventType` | Event Type to be polled for |  ## Push notifications Push event notifications to the URL are configured with the parameter `notificationUrl` while subscribing mobile numbers. ## SIMswap sub-event types The following is a list of the sub-events types for the SIMswap feature and the description for that sub-event type. These will appear in the API response payload for SIMswap events | Sub-event type              | Description |   |---|---|   |`NEW_MSISDN` | The MSISDN of a service changes. The SIM card is not changed. Results in two events being created: 1) CREATE_SVC/PORT_IN_SVC for the new number, and 2) a NEW_MSISDN for the old MSISDN |   |`PORTIN_SVC` | A MSISDN registered for event detection is created as a mobile service on the Telstra network (note: if the MSISDN was not already registered by at least one customer for at least one event type, this event would be interpreted as a CREATE_SVC) |   |`PORTOUT_SVC` | The MSISDN is ported out from Telstra to another domestic operator |   |`NEW_SIM` | An existing Telstra MSISDN is moved onto a new SIM |   |`CREATE_SVC` | A new mobile service is created on the Telstra network (a new SIM and a new MSISDN) |   |`DELETE_SVC` | A mobile service (MSISDN and SIM) on the Telstra network is cancelled outright (as opposed to ported out to another domestic network) |  ## SDK repos * [Event Detection API - Java SDK](https://github.com/telstra/EventDetectionAPI-SDK-java) * [Event Detection API - .Net2 SDK](https://github.com/telstra/EventDetectionAPI-SDK-dotnet) * [Event Detection API - NodeJS SDK](https://github.com/telstra/EventDetectionAPI-SDK-node) * [Event Detection API - PHP SDK](https://github.com/telstra/EventDetectionAPI-SDK-php) * [Event Detection API - Python SDK](https://github.com/telstra/EventDetectionAPI-SDK-python) * [Event Detection API - Ruby SDK](https://github.com/telstra/EventDetectionAPI-SDK-ruby)


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
    "Telstra/Telstra_EventDetection": "*@master"
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
 - [ResisterPhoneNumberList](docs/Model/ResisterPhoneNumberList.md)
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


## Author




