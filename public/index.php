<?php
/**
 * Created by PhpStorm.
 * User: thor
 * Date: 03.01.2017
 * Time: 16.40
 */

require_once __DIR__ . '/../vendor/autoload.php';


use \GuzzleHttp\Client;


$request = new Client();
$res = $request->get('https://api.github.com/gists/d18dbed4a77e38dcf928a532a2ded23c');

if ( $res->getStatusCode() == 200) {
    $json = (string)$res->getBody();

    $object = json_decode($json, true);

    header('Location: ' . $object['files']['dotfiles.sh']['raw_url']);
}
