<?php
/**
 * ObjectSerializer
 *
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
 * ObjectSerializer Class Doc Comment
 *
 * @category Class
 * @package  Telstra_EventDetection
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ObjectSerializer
{
    /**
     * Serialize data
     *
     * @param mixed  $data   the data to serialize
     * @param string $type   the SwaggerType of the data
     * @param string $format the format of the Swagger type of the data
     *
     * @return string|object serialized form of $data
     */
    public static function sanitizeForSerialization($data, $type = null, $format = null)
    {
        if (is_scalar($data) || null === $data) {
            return $data;
        } elseif ($data instanceof \DateTime) {
            return ($format === 'date') ? $data->format('Y-m-d') : $data->format(\DateTime::ATOM);
        } elseif (is_array($data)) {
            foreach ($data as $property => $value) {
                $data[$property] = self::sanitizeForSerialization($value);
            }
            return $data;
        } elseif (is_object($data)) {
            $values = [];
            $formats = $data::swaggerFormats();
            foreach ($data::swaggerTypes() as $property => $swaggerType) {
                $getter = $data::getters()[$property];
                $value = $data->$getter();
                if ($value !== null
                    && !in_array($swaggerType, ['DateTime', 'bool', 'boolean', 'byte', 'double', 'float', 'int', 'integer', 'mixed', 'number', 'object', 'string', 'void'], true)
                    && method_exists($swaggerType, 'getAllowableEnumValues')
                    && !in_array($value, $swaggerType::getAllowableEnumValues())) {
                    $imploded = implode("', '", $swaggerType::getAllowableEnumValues());
                    throw new \InvalidArgumentException("Invalid value for enum '$swaggerType', must be one of: '$imploded'");
                }
                if ($value !== null) {
                    $values[$data::attributeMap()[$property]] = self::sanitizeForSerialization($value, $swaggerType, $formats[$property]);
                }
            }
            return (object)$values;
        } else {
            return (string)$data;
        }
    }

    /**
     * Sanitize filename by removing path.
     * e.g. ../../sun.gif becomes sun.gif
     *
     * @param string $filename filename to be sanitized
     *
     * @return string the sanitized filename
     */
    public static function sanitizeFilename($filename)
    {
        if (preg_match("/.*[\/\\\\](.*)$/", $filename, $match)) {
            return $match[1];
        } else {
            return $filename;
        }
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the path, by url-encoding.
     *
     * @param string $value a string which will be part of the path
     *
     * @return string the serialized object
     */
    public static function toPathValue($value)
    {
        return rawurlencode(self::toString($value));
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the query, by imploding comma-separated if it's an object.
     * If it's a string, pass through unchanged. It will be url-encoded
     * later.
     *
     * @param string[]|string|\DateTime $object an object to be serialized to a string
     *
     * @return string the serialized object
     */
    public static function toQueryValue($object)
    {
        if (is_array($object)) {
            return implode(',', $object);
        } else {
            return self::toString($object);
        }
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the header. If it's a string, pass through unchanged
     * If it's a datetime object, format it in ISO8601
     *
     * @param string $value a string which will be part of the header
     *
     * @return string the header string
     */
    public static function toHeaderValue($value)
    {
        return self::toString($value);
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the http body (form parameter). If it's a string, pass through unchanged
     * If it's a datetime object, format it in ISO8601
     *
     * @param string|\SplFileObject $value the value of the form parameter
     *
     * @return string the form string
     */
    public static function toFormValue($value)
    {
        if ($value instanceof \SplFileObject) {
            return $value->getRealPath();
        } else {
            return self::toString($value);
        }
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the parameter. If it's a string, pass through unchanged
     * If it's a datetime object, format it in ISO8601
     *
     * @param string|\DateTime $value the value of the parameter
     *
     * @return string the header string
     */
    public static function toString($value)
    {
        if ($value instanceof \DateTime) { // datetime in ISO8601 format
            return $value->format(\DateTime::ATOM);
        } else {
            return $value;
        }
    }

    /**
     * Serialize an array to a string.
     *
     * @param array  $collection                 collection to serialize to a string
     * @param string $collectionFormat           the format use for serialization (csv,
     * ssv, tsv, pipes, multi)
     * @param bool   $allowCollectionFormatMulti allow collection format to be a multidimensional array
     *
     * @return string
     */
    public static function serializeCollection(array $collection, $collectionFormat, $allowCollectionFormatMulti = false)
    {
        if ($allowCollectionFormatMulti && ('multi' === $collectionFormat)) {
            // http_build_query() almost does the job for us. We just
            // need to fix the result of multidimensional arrays.
            return preg_replace('/%5B[0-9]+%5D=/', '=', http_build_query($collection, '', '&'));
        }
        switch ($collectionFormat) {
            case 'pipes':
                return implode('|', $collection);

            case 'tsv':
                return implode("\t", $collection);

            case 'ssv':
                return implode(' ', $collection);

            case 'csv':
                // Deliberate fall through. CSV is default format.
            default:
                return implode(',', $collection);
        }
    }

    /**
     * Deserialize a JSON string into an object
     *
     * @param mixed    $data          object or primitive to be deserialized
     * @param string   $class         class name is passed as a string
     * @param string[] $httpHeaders   HTTP headers
     * @param string   $discriminator discriminator if polymorphism is used
     *
     * @return object|array|null an single or an array of $class instances
     */
    public static function deserialize($data, $class, $httpHeaders = null)
    {
        if (null === $data) {
            return null;
        } elseif (substr($class, 0, 4) === 'map[') { // for associative array e.g. map[string,int]
            $inner = substr($class, 4, -1);
            $deserialized = [];
            if (strrpos($inner, ",") !== false) {
                $subClass_array = explode(',', $inner, 2);
                $subClass = $subClass_array[1];
                foreach ($data as $key => $value) {
                    $deserialized[$key] = self::deserialize($value, $subClass, null);
                }
            }
            return $deserialized;
        } elseif (strcasecmp(substr($class, -2), '[]') === 0) {
            $subClass = substr($class, 0, -2);
            $values = [];
            foreach ($data as $key => $value) {
                $values[] = self::deserialize($value, $subClass, null);
            }
            return $values;
        } elseif ($class === 'object') {
            settype($data, 'array');
            return $data;
        } elseif ($class === '\DateTime') {
            // Some API's return an invalid, empty string as a
            // date-time property. DateTime::__construct() will return
            // the current time for empty input which is probably not
            // what is meant. The invalid empty string is probably to
            // be interpreted as a missing field/value. Let's handle
            // this graceful.
            if (!empty($data)) {
                return new \DateTime($data);
            } else {
                return null;
            }
        } elseif (in_array($class, ['DateTime', 'bool', 'boolean', 'byte', 'double', 'float', 'int', 'integer', 'mixed', 'number', 'object', 'string', 'void'], true)) {
            settype($data, $class);
            return $data;
        } elseif ($class === '\SplFileObject') {
            /** @var \Psr\Http\Message\StreamInterface $data */

            // determine file name
            if (array_key_exists('Content-Disposition', $httpHeaders) &&
                preg_match('/inline; filename=[\'"]?([^\'"\s]+)[\'"]?$/i', $httpHeaders['Content-Disposition'], $match)) {
                $filename = Configuration::getDefaultConfiguration()->getTempFolderPath() . self::sanitizeFilename($match[1]);
            } else {
                $filename = tempnam(Configuration::getDefaultConfiguration()->getTempFolderPath(), '');
            }

            $file = fopen($filename, 'w');
            while ($chunk = $data->read(200)) {
                fwrite($file, $chunk);
            }
            fclose($file);

            return new \SplFileObject($filename, 'r');
        } elseif (method_exists($class, 'getAllowableEnumValues')) {
            if (!in_array($data, $class::getAllowableEnumValues())) {
                $imploded = implode("', '", $class::getAllowableEnumValues());
                throw new \InvalidArgumentException("Invalid value for enum '$class', must be one of: '$imploded'");
            }
            return $data;
        } else {
            // If a discriminator is defined and points to a valid subclass, use it.
            $discriminator = $class::DISCRIMINATOR;
            if (!empty($discriminator) && isset($data->{$discriminator}) && is_string($data->{$discriminator})) {
                $subclass = '\Telstra_EventDetection\Model\\' . $data->{$discriminator};
                if (is_subclass_of($subclass, $class)) {
                    $class = $subclass;
                }
            }
            $instance = new $class();
            foreach ($instance::swaggerTypes() as $property => $type) {
                $propertySetter = $instance::setters()[$property];

                if (!isset($propertySetter) || !isset($data->{$instance::attributeMap()[$property]})) {
                    continue;
                }

                $propertyValue = $data->{$instance::attributeMap()[$property]};
                if (isset($propertyValue)) {
                    $instance->$propertySetter(self::deserialize($propertyValue, $type, null));
                }
            }
            return $instance;
        }
    }
}
