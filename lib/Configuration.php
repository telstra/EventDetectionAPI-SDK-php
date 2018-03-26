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
 * # Introduction Telstra's Event Detection API provides the ability to subscribe to and receive mobile network events for a given set of mobile numbers on Telstra's mobile network, such as; SIMswap, port-in, port-out, carrier-detection and international roaming events. ## Features Event Detection API provides these features   | Feature              | Description |   |---|---|   |`SIMswap` | Returns a timestamped event for a particular mobile number for SIM swap, port-in, port-out and cancelled events on Telstra's mobile network |   |`Carrier Detection` | Find out what Australian carrier a mobile number is subscribed to |   |`International Roaming` | *Coming soon.* Detect roaming events when a particular mobile number connects to an international carrier |  ## Getting access to the API The Event Detection API is available on our Enterprise Plans only. Please submit your [sales enquiry](https://dev.telstra.com/content/sales-enquiry-contact-form) . Or contact your Telstra Account Executive. We're available Monday to Friday 9am - 5pm. ## Frequently asked questions **Q: What Events does the Telstra Events Detection API report?** A: Events occurring within our network or in relation to our network. Examples include: SIM Swap, Port-in and Port-out  **Q: How quickly are the network events reported?** A: This will vary from event to event and will depend on the circumstances but we aim to report it as quickly as possible typically within seconds of occurrence (in near real-time)  **Q: How long is the event data stored by Telstra?** A: 90 days  **Q: Do you provide event data relating to other carriers?** A: Only if it relates to our network; for example an port-into Telstra from another service provider  **Q: Who can access this data?** A: Access is restricted to personnel that support the service and customers who have agreed to Telstra terms of service    # Getting Started First step is to create an `App`. After you've created an `App`, follow these steps 1. Authenticate by getting an Oauth token 2. Use the Event Detection API ## Run in Postman To get started quickly and easily with all the features of the Event Detection API, download the Postman collection here  <a href=\"https://app.getpostman.com/run-collection/efcaf747d3cb76784787#?env%5BMessaging%20API%20Environments%5D=W3siZW5hYmxlZCI6dHJ1ZSwia2V5IjoiY2xpZW50X2lkIiwidHlwZSI6InRleHQiLCJ2YWx1ZSI6IiJ9LHsiZW5hYmxlZCI6dHJ1ZSwia2V5IjoiY2xpZW50X3NlY3JldCIsInR5cGUiOiJ0ZXh0IiwidmFsdWUiOiIifSx7ImVuYWJsZWQiOnRydWUsImtleSI6ImFjY2Vzc190b2tlbiIsInR5cGUiOiJ0ZXh0IiwidmFsdWUiOiIifSx7ImVuYWJsZWQiOnRydWUsImtleSI6Imhvc3QiLCJ0eXBlIjoidGV4dCIsInZhbHVlIjoidGFwaS50ZWxzdHJhLmNvbSJ9LHsiZW5hYmxlZCI6dHJ1ZSwia2V5IjoiQXV0aG9yaXphdGlvbiIsInR5cGUiOiJ0ZXh0IiwidmFsdWUiOiIifSx7ImVuYWJsZWQiOnRydWUsImtleSI6Im9hdXRoLWhvc3QiLCJ0eXBlIjoidGV4dCIsInZhbHVlIjoic2FwaS50ZWxzdHJhLmNvbSJ9XQ==\"><img alt=\"Run in Postman\" src=\"https://run.pstmn.io/button.svg\" /></a> ## Authentication   To get an OAuth 2.0 Authentication token, pass through your Consumer Key and Consumer Secret that you received when you registered for the Event Detection API key. The `grant_type` should be left as `client_credentials` and the scope as v1_eventdetection_simswap. The token will expire in one hour. Get your keys by creating an `App`.    # Request   ` CONSUMER_KEY=\"your consumer key\"   CONSUMER_SECRET=\"your consumer secret\"   curl -X POST -H 'Content-Type: application/x-www-form-urlencoded' \\   -d 'grant_type=client_credentials&client_id=$CONSUMER_KEY&client_secret=$CONSUMER_SECRET&scope=v1_eventdetection_simswap' \\   'https://sapi.telstra.com/v2/oauth/token' `    # Response    `{       \"access_token\" : \"1234567890123456788901234567\",       \"token_type\" : \"Bearer\",       \"expires_in\" : \"3599\"   }`  ## Subscribe mobile numbers Subscribing users mobile numbers informs the API to register that mobile number so that you can poll those numbers for particular events. You can subscribe and unsubscribe numbers (opt in and opt out) against this service. Only numbers that are opted in (i.e. subscribed) can be polled for events.  # Request  `curl -X POST -H 'content-type: application/json' \\ -H 'Authorization: Bearer $TOKEN' \\ -d '{ \"phoneNumbers\": [     \"61467754783\" ], \"eventType\": \"simswap\", \"notificationUrl\": \"https://requestb.in/161r14g1\" }' \\ 'https://tapi.telstra.com/v1/eventdetection/events'`  # Response  `{     \"phoneNumbers\": [       {         \"phoneNumber\": \"61467754783\",         \"message\": \"opt-in status updated for this MSISDN\"     }   ] }` | Parameter              | Description |   |---|---|   |`phoneNumbers` | List of mobile numbers that has to be registered for the event |   |`eventType` | Event Type to be subscribed to |   |`notificationUrl` | URL where the event notifications has to be posted (Optional) |  ## Unsubscribe mobile numbers Unsubscribe mobile numbers against a particular event  # Request  `curl -X DELETE -H 'content-type: application/json' \\   -H 'Authorization: Bearer $token' \\   -d '{\"phoneNumbers\": [\"61467754783\"]}' \\   'https://tapi.telstra.com/v1/eventdetection/events/{event-type}'`   # Response     ` {     \"phoneNumbers\": [       {         \"phoneNumber\": \"61467754783\",         \"message\": \"opt-out status updated for this MSISDN\"       }     ]   } `  | Parameter              | Description |   |---|---|   |`phoneNumbers` | List of mobile numbers that has to be unsubscribed from the event |   |`eventType` | Event Type to be unsubscribed from |   |`notificationUrl` | Notification URL that has to be removed (Optional) |  ## Get event subscriptions Get the list of events subscribed for  # Request  `curl -X POST -H 'content-type: application/json' \\   -H 'Authorization: Bearer $TOKEN' \\   -d '{ \"phoneNumbers\": [ \"61467754783\" ] }' \\   'https://tapi.telstra.com/v1/eventdetection/events/subscriptions'`  # Response  ` {   \"notificationURL\": \"https://requestb.in/161r14g1\",   \"subscriptions\": [     {         \"phoneNumber\": \"61467754783\",         \"events\": [             \"SIM_SWAP\"         ]     }   ] } ` | Parameter              | Description |   |---|---|   |`phoneNumbers` | List of mobile numbers to get the subscription details |  ## Poll events Poll events for a given set of mobile numbers  # Request `curl -X POST -H 'content-type: application/json' \\   -H 'Authorization: Bearer $token' \\   -d '{ \"phoneNumbers\": [ \"61467754783\" ] }' \\   'https://tapi.telstra.com/v1/eventdetection/events/{event_type}'`  # Response  ` {   \"eventname\": \"simswap\",   \"phoneNumbers\": [       {         \"phoneNumber\": \"+61467754783\",         \"events\": [             \"2018-01-19T14:40:34\"         ]       }   ] } ` | Parameter              | Description |   |---|---|   |`phoneNumbers` | List of mobile numbers to be polled for events |   |`eventType` | Event Type to be polled for |  ## Push notifications Push event notifications to the URL are configured with the parameter `notificationUrl` while subscribing mobile numbers. ## SIMswap sub-event types The following is a list of the sub-events types for the SIMswap feature and the description for that sub-event type. These will appear in the API response payload for SIMswap events | Sub-event type              | Description |   |---|---|   |`NEW_MSISDN` | The MSISDN of a service changes. The SIM card is not changed. Results in two events being created: 1) CREATE_SVC/PORT_IN_SVC for the new number, and 2) a NEW_MSISDN for the old MSISDN |   |`PORTIN_SVC` | A MSISDN registered for event detection is created as a mobile service on the Telstra network (note: if the MSISDN was not already registered by at least one customer for at least one event type, this event would be interpreted as a CREATE_SVC) |   |`PORTOUT_SVC` | The MSISDN is ported out from Telstra to another domestic operator |   |`NEW_SIM` | An existing Telstra MSISDN is moved onto a new SIM |   |`CREATE_SVC` | A new mobile service is created on the Telstra network (a new SIM and a new MSISDN) |   |`DELETE_SVC` | A mobile service (MSISDN and SIM) on the Telstra network is cancelled outright (as opposed to ported out to another domestic network) |  ## SDK repos * [Event Detection API - Java SDK](https://github.com/telstra/EventDetectionAPI-SDK-java) * [Event Detection API - .Net2 SDK](https://github.com/telstra/EventDetectionAPI-SDK-dotnet) * [Event Detection API - NodeJS SDK](https://github.com/telstra/EventDetectionAPI-SDK-node) * [Event Detection API - PHP SDK](https://github.com/telstra/EventDetectionAPI-SDK-php) * [Event Detection API - Python SDK](https://github.com/telstra/EventDetectionAPI-SDK-python) * [Event Detection API - Ruby SDK](https://github.com/telstra/EventDetectionAPI-SDK-ruby)
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: unset
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
