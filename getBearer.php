<?php
/**
 * >> Get Bearer by PHP cURL
 *
 * >> Just a little Code Snippet to get a Bearer by PHP cURL from Commerce Tools Platform
 *
 * PHP Version 5
 *
 * @category    commercetools-php-get-bearer
 * @package
 * @author      Marcel Thiesies <thiesies@bestit-online.de>
 * @copyright   2015 best it
 * @license     http://www.bestit-online.de/
 * @version
 * @link        http://www.bestit-online.de/
 * @since       26.08.15 - 11:35
 */

function logMe($msg) {
    error_log("Get Bearer => " . $msg);

    return null;
}

function getBearer()
{
    $project = "";
    $protocol = "https://";
    $auth = "auth.sphere.io/oauth/token";
    $clientID = "";
    $clientSecret = "";
    $postFields = "grant_type=client_credentials&scope=manage_project:";

    $url = $protocol . $clientID . ":" . $clientSecret . "@" . $auth;
    $pf = $postFields . $project;

    $ch = curl_init($url);
    logMe("Initiated curl session.");

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $pf);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    logMe("Set options for curl session.");

    $result = curl_exec($ch);
    logMe("Executed curl session. Saved result.");

    curl_close($ch);
    logMe("Closed curl session.");

    return $result;
}

var_dump(getBearer());