<?php
/**
 * Configuration
 * PHP version 5
 *
 * @category Class
 * @package  Telstra_EventDetection
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Telstra Event Detection API
 *
 * # Introduction Telstra's Event Detection API provides the ability to subscribe to and receive mobile network events for registered mobile numbers associated with Telstra's mobile network, such as; SIM swap, port-in, port-out, new MSIDN, new mobile service and cancelled mobile service, as well as carrier-detection. ## Features Event Detection API provides these features   | Feature              | Description |   |---|---|   |`SIM swap` | Returns timestamped event data when any of the following network events occurs in connection with a registered mobile number associated with Telstraâ€™s mobile network:  SIM swap, port-in, port-out, new MSISDN, new mobile service or cancelled mobile service |   |`Carrier Detection` | Find out what Australian carrier a mobile number is subscribed to |   |`International Roaming` | *Coming soon.* Will indicate if a mobile number is operaing in Australia or outside of Australia. |  ## Getting access to the API The Event Detection API is available on our Enterprise Plans only. Please submit your [sales enquiry](https://dev.telstra.com/content/sales-enquiry-contact-form) . Or contact your Telstra Account Executive. We're available Monday to Friday 9am - 5pm. ## Frequently asked questions **Q: What is the Telstra Event Detection (TED) API?** A: The Telstra Event Detection (TED) API is a subscription based service from Telstra that enables a customer to be alerted when a particular network event is detected in connection with a registered mobile number that may indicate that a fraudulent misuse of an end userâ€™s mobility service is about to occur.  **Q: What are the network events that the TED API can detect?** A: Currently the TED API is able to detect a bundle of events associated with Telstra SIM swaps.  **Q: Can TED API detect number porting between operators other than Telstra? E.g. Optus to Vodafone?** A: No, we donâ€™t report these type of events at present.  **Q: How quickly are the network events detected?** A: This will vary depending on the event being detected, but generally we detect the event within a couple of seconds of it occurring and notify subscribers within near real time via the API.  **Q: How long does Telstra store the event data for?** A: Event data is stored for 90 days from the occurrence of a network event and then securely purged.  **Q: Is there a limit to the number of registered mobile numbers I can have for the Telstra Event Detection API?** A: No. You may have as many Telstra Event Detection API registered mobile numbers as you require within practical limits.  **Q: Why is monitoring for SIM SWAP events important?** A: Criminals are becoming much more savvy and will often try to circumvent two factor authentication protocols by swapping the SIM card for a particular mobile number in order to gain fraudulent access to the end userâ€™s service. Monitoring for SIM swap events may provide early detection that this is occurring and help prevent criminals from being successful in their endeavours.  **Q: If an end user is currently a customer of a Telstra Reseller that still utilises the Telstra Network, am I able to detect their Network events?** A: No. Telstra resellers such as Aldi Mobile are Mobile Virtual Network Operators (MVNO) that operate as totally independent businesses to Telstra. The Telstra SIM swap API does not monitor MNVO network events at present.  **Q: How do I purchase Telstra Event Detection API?** A: At the moment, the Telstra Event Detection API is only available through your Telstra Account Manager. If you don't have a Telstra Account Manager, or are not sure who they are, please submit a [sales enquiry](https://dev.telstra.com/content/sales-enquiry-contact-form).  **Q: What support options are available for the Telstra Event Detection API?** A: We provide 24/7 telephone based technical support (for paid plans) along with email support and an online community forum.  **Q: Do you detect network events from another carrier?** A: The Telstra Event Detection API detects network events associated with the Telstra network and Telstra mobile services.  **Q: Which Telstra personnel have access to the event detection data?** A: Access to Telstra Event Detection data is restricted to only Telstra personnel that require access for the purposes of providing the service.  **Q: Why should I purchase the Telstra Event Detection API from Telstra?** A: As the network events are occurring on the Telstra network, Telstra is in a position to be able to provide fast notification of an event as it is occurring, helping subscribers to prevent fraudulent activity from occurring and to minimise the resulting financial losses.  **Q: If I require assistance setting up my Telstra Event Detection API, are there any Professional Services options available to me?** A: At the current time, the Telstra Event Detection API does not have any Professional Service options available.  **Q: What subscription options are available for Telstra Event Detection API?** A: There is a month-by-month Pay As You Go (PAYG) plan or 12 Month contract option available.  **Q: Do Early Termination Charges (ETCâ€™s) apply?** A: If you have subscribed to a 12 month contract and want to terminate the plan or downgrade to a lower plan before the expiry of your existing 12 month term, we may charge you ETCs.  **Q: What privacy requirements apply to my use of the Telstra Event Detection API?** A: Before registering an end users mobile number with Telstra Event Detection API, you must: 1.  prepare an 'End User Notifications'. for our approval, which sets out what end user information will be disclosed via the API, the purposes for which that information will be disclosed, and to which third parties that information will be disclosed; 2.  provide each of your end user with the End User Notification; and 3.  obtain express, informed consent from each end user to the use and disclosure of their event data via the API for the purposes set out in the notification.  **Q: What terms and conditions apply to my use of the Telstra Event Detection API?** A: Before using the Telstra Event Detection API, you must agree to the TED API ['Our Customer Terms'](https://www.telstra.com.au/customer-terms/business-government#cloud-services).   # Getting Started First step is to create an `App`. After you've created an `App`, follow these steps 1. Authenticate by getting an Oauth token 2. Use the Event Detection API ## Run in Postman To get started quickly and easily with all the features of the Event Detection API, download the Postman collection here  <a href=\"https://app.getpostman.com/run-collection/8ab2273e066e5c6fd653#?env%5BEvent%20Detection%20API%5D=W3sidHlwZSI6InRleHQiLCJlbmFibGVkIjp0cnVlLCJrZXkiOiJjbGllbnRfaWQiLCJ2YWx1ZSI6ImNsaWVudF9pZCJ9LHsidHlwZSI6InRleHQiLCJlbmFibGVkIjp0cnVlLCJrZXkiOiJjbGllbnRfc2VjcmV0IiwidmFsdWUiOiJjbGllbnRfc2VjcmV0In0seyJ0eXBlIjoidGV4dCIsImVuYWJsZWQiOnRydWUsImtleSI6ImFjY2Vzc190b2tlbiIsInZhbHVlIjoiaTZPdmtyelVuc3hvODhrcU9BMXg4RWtPVWxuSyJ9LHsidHlwZSI6InRleHQiLCJlbmFibGVkIjp0cnVlLCJrZXkiOiJob3N0IiwidmFsdWUiOiJ0YXBpLnRlbHN0cmEuY29tIn0seyJ0eXBlIjoidGV4dCIsImVuYWJsZWQiOnRydWUsImtleSI6Im9hdXRoLWhvc3QiLCJ2YWx1ZSI6InRhcGkudGVsc3RyYS5jb20ifV0=\"><img alt=\"Run in Postman\" src=\"https://run.pstmn.io/button.svg\" /></a> ## Authentication   To get an OAuth 2.0 Authentication token, pass through your Consumer Key and Consumer Secret that you received when you registered for the Event Detection API key. The `grant_type` should be left as `client_credentials` and the scope as v1_eventdetection_simswap. The token will expire in one hour. Get your keys by creating an `App`.    # Request   ` CONSUMER_KEY=\"your consumer key\"   CONSUMER_SECRET=\"your consumer secret\"   curl -X POST -H 'Content-Type: application/x-www-form-urlencoded' \\   -d 'grant_type=client_credentials&client_id=$CONSUMER_KEY&client_secret=$CONSUMER_SECRET&scope=v1_eventdetection_simswap' \\   'https://tapi.telstra.com/v2/oauth/token' `    # Response    `{       \"access_token\" : \"1234567890123456788901234567\",       \"token_type\" : \"Bearer\",       \"expires_in\" : \"3599\"   }`  ## Subscribe mobile numbers Subscribing end user mobile numbers informs the API to register that mobile number so that you can poll those numbers for particular events. You can subscribe and unsubscribe numbers (opt in and opt out) against this service. Only numbers that are opted in (i.e. subscribed) can be polled for events. You must have obtained your end customerâ€™s consent before you can opt them into the Event Detection service.  # Request  `curl -X POST -H 'content-type: application/json' \\ -H 'Authorization: Bearer $TOKEN' \\ -d '{ \"msisdns\": [     \"61467754783\" ], \"eventType\": \"simswap\", \"notificationUrl\": \"https://requestb.in/161r14g1\" }' \\ 'https://tapi.telstra.com/v1/eventdetection/events'` | Parameter              | Description |   |---|---|   |`msisdns` | list of mobile numbers that has to be registered for the event |   |`eventType` | event Type to be subscribed to |   |`notificationUrl` | URL where the event notifications has to be posted (Optional) |   # Response  `{     \"msisdns\": [       {         \"msisdn\": \"61467754783\",         \"description\": \"opt-in status updated for this MSISDN\",         \"carrierName\": \"Telstra\"     }   ] }` | Parameter              | Description |   |---|---|   |`msisdn` | msisdn |   |`description` | status description indicating if the msisdn was opted-in|   |`carrierName` | carrier name for the msisdn |  ## Unsubscribe mobile numbers Unsubscribe mobile numbers against a particular event  # Request  `curl -X DELETE -H 'content-type: application/json' \\   -H 'Authorization: Bearer $token' \\   -d '{\"msisdns\": [\"61467754783\"]}' \\   'https://tapi.telstra.com/v1/eventdetection/events/{event-type}'`  | Parameter              | Description |   |---|---|   |`msisdns` | list of mobile numbers that has to be unsubscribed from the event |   |`eventType` | event Type to be unsubscribed from |   |`notificationUrl` | notification URL that has to be removed (Optional) |  # Response     ` {     \"msisdns\": [       {         \"msisdn\": \"61467754783\",         \"description\": \"opt-out status updated for this MSISDN\",         \"carrierName\": \"Telstra\"       }     ]   } `  | Parameter              | Description |   |---|---|   |`msisdn` | msisdn |   |`description` | status description indicating if the msisdn was opted-out |   |`carrierName` | carrier name for the msisdn |  ## Get event subscriptions Get the list of events subscribed for  # Request  `curl -X POST -H 'content-type: application/json' \\   -H 'Authorization: Bearer $TOKEN' \\   -d '{ \"msisdns\": [ \"61467754783\" ] }' \\   'https://tapi.telstra.com/v1/eventdetection/events/subscriptions'`  | Parameter              | Description |   |---|---|   |`msisdns` | list of msisdns to get the subscription details |  # Response  ` {   \"notificationURL\": \"https://requestb.in/161r14g1\",   \"subscriptions\": [     {         \"msisdn\": \"61467754783\",         \"events\": [             \"SIM_SWAP\"         ],         \"carrierName\": \"Telstra\"     }   ] } ` | Parameter              | Description |   |---|---|   |`notificationURL` | notification URL configured while registering msisdns |   |`msisdn` | msisdn |   |`events` | list of subscribed events for that msisdn |   |`carrierName` | carrier name for the msisdn |  ## Poll events Poll events for a given set of msisdns  # Request `curl -X POST -H 'content-type: application/json' \\   -H 'Authorization: Bearer $token' \\   -d '{ \"msisdns\": [ \"61467754783\", \"61467984007\" ] }' \\   'https://tapi.telstra.com/v1/eventdetection/events/{event_type}'`   Parameter              | Description |   |---|---|   |`msisdns` | list of msisdns to be polled for events |   |`eventType` | event Type to be polled for |  # Response  ` {   \"eventType\": \"simswap\",   \"msisdns\": [     {         \"msisdn\": \"+61467754783\",         \"mobileServiceEvents\": [             {                 \"eventId\": \"NEW_SIM\",                 \"eventDate\": \"2018-01-19T14:40:34\"             }         ]     },     {         \"msisdn\": \"+61467984007\",         \"mobileServiceEvents\": [             {                 \"eventId\": \"PORTOUT_SVC\",                 \"eventDate\": \"2018-02-21T15:20:01\",                 \"carrierName\": \"Telstra\"             }         ]     } ] } ` | Parameter              | Description |   |---|---|   |`eventType` | event type requested |   |`msisdn` | msisdn |   |`mobileServiceEvents` | list of service events |   |`eventId` | Id of the event occured. Event Id can be any one of the following - NEW_MSISDN, PORTIN_SVC, PORTOUT_SVC, NEW_SIM, CREATE_SVC, DELETE_SVC |   |`eventDate` | timestamp indicating when the event occured |   |`carrierName` | carrier name for the msisdn. Carrier name will be returned only for port out events |  ## Push notifications Push event notifications to the URL are configured with the parameter `notificationUrl` while subscribing mobile numbers. # Event notification format ` {   \"eventId\": \"NEW_SIM\",   \"msisdn\" : \"61467754783\",   \"eventDate\" : \"2018-01-19T14:40:34\" } ` | Parameter              | Description |   |---|---|   |`eventId` | event Id indicating the event occured. Event Id can be any one of the following - NEW_MSISDN, PORTIN_SVC, PORTOUT_SVC, NEW_SIM, CREATE_SVC, DELETE_SVC  |   |`msisdn` | msisdn for which the event occured |   |`eventDate` | timestamp indicating when the event occured |  ## SIMswap sub-features The following is a list of the sub-features for SIM swap and the description for that sub-feature. These will appear in the 'eventId' parameter in the API response payload for SIMswap events. | SIM swap Sub-Feature              | Description |   |---|---|   |`NEW_MSISDN` | The MSISDN of a service changes. The SIM card is not changed. Results in two events being created: 1)  CREATE_SVC/PORT_IN_SVC for the new number, and 2)  a NEW_MSISDN for the old MSISDN |   |`PORTIN_SVC` | A MSISDN registered for event detection is created as a mobile service on the Telstra network (note: if the MSISDN was not already registered by at least one customer for at least one event type, this event would be interpreted as a CREATE_SVC) |   |`PORTOUT_SVC` | The MSISDN is ported out from Telstra to another domestic operator |   |`NEW_SIM` | An existing Telstra MSISDN is moved onto a new SIM |   |`CREATE_SVC` | A new mobile service is created on the Telstra network (a new SIM and a new MSISDN) |   |`DELETE_SVC` | A mobile service (MSISDN and SIM) on the Telstra network is cancelled outright (as opposed to ported out to another domestic network) |  ## SDK repos * [Event Detection API - Java SDK](https://github.com/telstra/EventDetectionAPI-SDK-java) * [Event Detection API - .Net2 SDK](https://github.com/telstra/EventDetectionAPI-SDK-dotnet) * [Event Detection API - NodeJS SDK](https://github.com/telstra/EventDetectionAPI-SDK-node) * [Event Detection API - PHP SDK](https://github.com/telstra/EventDetectionAPI-SDK-php) * [Event Detection API - Python SDK](https://github.com/telstra/EventDetectionAPI-SDK-python) * [Event Detection API - Ruby SDK](https://github.com/telstra/EventDetectionAPI-SDK-ruby)
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.3.1
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Telstra_EventDetection;

/**
 * Configuration Class Doc Comment
 * PHP version 5
 *
 * @category Class
 * @package  Telstra_EventDetection
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Configuration
{
    private static $defaultConfiguration;

    /**
     * Associate array to store API key(s)
     *
     * @var string[]
     */
    protected $apiKeys = [];

    /**
     * Associate array to store API prefix (e.g. Bearer)
     *
     * @var string[]
     */
    protected $apiKeyPrefixes = [];

    /**
     * Access token for OAuth
     *
     * @var string
     */
    protected $accessToken = '';

    /**
     * Username for HTTP basic authentication
     *
     * @var string
     */
    protected $username = '';

    /**
     * Password for HTTP basic authentication
     *
     * @var string
     */
    protected $password = '';

    /**
     * The host
     *
     * @var string
     */
    protected $host = 'https://tapi.telstra.com';

    /**
     * User agent of the HTTP request, set to "PHP-Swagger" by default
     *
     * @var string
     */
    protected $userAgent = 'Swagger-Codegen/1.0.0/php';

    /**
     * Debug switch (default set to false)
     *
     * @var bool
     */
    protected $debug = false;

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected $debugFile = 'php://output';

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected $tempFolderPath;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tempFolderPath = sys_get_temp_dir();
    }

    /**
     * Sets API key
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $key              API key or token
     *
     * @return $this
     */
    public function setApiKey($apiKeyIdentifier, $key)
    {
        $this->apiKeys[$apiKeyIdentifier] = $key;
        return $this;
    }

    /**
     * Gets API key
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     *
     * @return string API key or token
     */
    public function getApiKey($apiKeyIdentifier)
    {
        return isset($this->apiKeys[$apiKeyIdentifier]) ? $this->apiKeys[$apiKeyIdentifier] : null;
    }

    /**
     * Sets the prefix for API key (e.g. Bearer)
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $prefix           API key prefix, e.g. Bearer
     *
     * @return $this
     */
    public function setApiKeyPrefix($apiKeyIdentifier, $prefix)
    {
        $this->apiKeyPrefixes[$apiKeyIdentifier] = $prefix;
        return $this;
    }

    /**
     * Gets API key prefix
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     *
     * @return string
     */
    public function getApiKeyPrefix($apiKeyIdentifier)
    {
        return isset($this->apiKeyPrefixes[$apiKeyIdentifier]) ? $this->apiKeyPrefixes[$apiKeyIdentifier] : null;
    }

    /**
     * Sets the access token for OAuth
     *
     * @param string $accessToken Token for OAuth
     *
     * @return $this
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * Gets the access token for OAuth
     *
     * @return string Access token for OAuth
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Sets the username for HTTP basic authentication
     *
     * @param string $username Username for HTTP basic authentication
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Gets the username for HTTP basic authentication
     *
     * @return string Username for HTTP basic authentication
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Sets the password for HTTP basic authentication
     *
     * @param string $password Password for HTTP basic authentication
     *
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Gets the password for HTTP basic authentication
     *
     * @return string Password for HTTP basic authentication
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the host
     *
     * @param string $host Host
     *
     * @return $this
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * Gets the host
     *
     * @return string Host
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Sets the user agent of the api client
     *
     * @param string $userAgent the user agent of the api client
     *
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setUserAgent($userAgent)
    {
        if (!is_string($userAgent)) {
            throw new \InvalidArgumentException('User-agent must be a string.');
        }

        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * Gets the user agent of the api client
     *
     * @return string user agent
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Sets debug flag
     *
     * @param bool $debug Debug flag
     *
     * @return $this
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
        return $this;
    }

    /**
     * Gets the debug flag
     *
     * @return bool
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * Sets the debug file
     *
     * @param string $debugFile Debug file
     *
     * @return $this
     */
    public function setDebugFile($debugFile)
    {
        $this->debugFile = $debugFile;
        return $this;
    }

    /**
     * Gets the debug file
     *
     * @return string
     */
    public function getDebugFile()
    {
        return $this->debugFile;
    }

    /**
     * Sets the temp folder path
     *
     * @param string $tempFolderPath Temp folder path
     *
     * @return $this
     */
    public function setTempFolderPath($tempFolderPath)
    {
        $this->tempFolderPath = $tempFolderPath;
        return $this;
    }

    /**
     * Gets the temp folder path
     *
     * @return string Temp folder path
     */
    public function getTempFolderPath()
    {
        return $this->tempFolderPath;
    }

    /**
     * Gets the default configuration instance
     *
     * @return Configuration
     */
    public static function getDefaultConfiguration()
    {
        if (self::$defaultConfiguration === null) {
            self::$defaultConfiguration = new Configuration();
        }

        return self::$defaultConfiguration;
    }

    /**
     * Sets the detault configuration instance
     *
     * @param Configuration $config An instance of the Configuration Object
     *
     * @return void
     */
    public static function setDefaultConfiguration(Configuration $config)
    {
        self::$defaultConfiguration = $config;
    }

    /**
     * Gets the essential information for debugging
     *
     * @return string The report for debugging
     */
    public static function toDebugReport()
    {
        $report  = 'PHP SDK (Telstra_EventDetection) Debug Report:' . PHP_EOL;
        $report .= '    OS: ' . php_uname() . PHP_EOL;
        $report .= '    PHP Version: ' . PHP_VERSION . PHP_EOL;
        $report .= '    OpenAPI Spec Version: 1.0.0' . PHP_EOL;
        $report .= '    SDK Package Version: 1.0.0' . PHP_EOL;
        $report .= '    Temp Folder Path: ' . self::getDefaultConfiguration()->getTempFolderPath() . PHP_EOL;

        return $report;
    }

    /**
     * Get API key (with prefix if set)
     *
     * @param  string $apiKeyIdentifier name of apikey
     *
     * @return string API key with the prefix
     */
    public function getApiKeyWithPrefix($apiKeyIdentifier)
    {
        $prefix = $this->getApiKeyPrefix($apiKeyIdentifier);
        $apiKey = $this->getApiKey($apiKeyIdentifier);

        if ($apiKey === null) {
            return null;
        }

        if ($prefix === null) {
            $keyWithPrefix = $apiKey;
        } else {
            $keyWithPrefix = $prefix . ' ' . $apiKey;
        }

        return $keyWithPrefix;
    }
}
