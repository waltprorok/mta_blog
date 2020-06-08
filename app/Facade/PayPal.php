<?php

namespace App\Facade;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PayPal
{
    public static function apiContext()
    {
        // Suppress DateTime warnings, if not set already
        date_default_timezone_set(@date_default_timezone_get());

// Adding Error Reporting for understanding errors properly
        error_reporting(E_ALL);
        ini_set('display_errors', '1');

// Replace these values by entering your own ClientId and Secret by visiting https://developer.paypal.com/developer/applications/
        $clientId = 'AVxibg4wjMPMQyKRiJw-aXk3Nm04wIX0iXVQ7tT-oixKf758Ztecfa-xUd3RXK_hwHlwVmeibeEM_6a-';
        $clientSecret = 'EHL_wat4iYWquURlhCAcytKosWG629t3Fskxd_AJ3vcDH99plg70h0EE5zZF47AvL849d62uKhWsLqVc';

        /**
         * All default curl options are stored in the array inside the PayPalHttpConfig class. To make changes to those settings
         * for your specific environments, feel free to add them using the code shown below
         * Uncomment below line to override any default curl options.
         */
// \PayPal\Core\PayPalHttpConfig::$defaultCurlOptions[CURLOPT_SSLVERSION] = CURL_SSLVERSION_TLSv1_2;


        /** @var \Paypal\Rest\ApiContext $apiContext */
        $apiContext = self::getApiContext($clientId, $clientSecret);

        return $apiContext;
    }

    public static function getApiContext($clientId, $clientSecret)
    {

        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                $clientId,
                $clientSecret
            )
        );

        // Comment this line out and uncomment the PP_CONFIG_PATH
        // 'define' block if you want to use static file
        // based configuration

        $apiContext->setConfig(
            array(
                'mode' => 'sandbox',
                'log.LogEnabled' => true,
                'log.FileName' => '../PayPal.log',
                'log.LogLevel' => 'DEBUG', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
                'cache.enabled' => true,
                //'cache.FileName' => '/PaypalCache' // for determining paypal cache directory
                // 'http.CURLOPT_CONNECTTIMEOUT' => 30
                // 'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
                //'log.AdapterFactory' => '\PayPal\Log\DefaultLogFactory' // Factory class implementing \PayPal\Log\PayPalLogFactory
            )
        );

        // Partner Attribution Id
        // Use this header if you are a PayPal partner. Specify a unique BN Code to receive revenue attribution.
        // To learn more or to request a BN Code, contact your Partner Manager or visit the PayPal Partner Portal
        // $apiContext->addRequestHeader('PayPal-Partner-Attribution-Id', '123123123');

        return $apiContext;
    }
}
