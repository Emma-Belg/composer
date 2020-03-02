<?php

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

require_once(__DIR__. '/vendor/autoload.php');
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

$logger = new Logger('logger');

if(isset($_GET['type'])){
    $errorType = $_GET["type"];

    switch ($errorType) {

        case "DEBUG":
            $logger->pushHandler(new StreamHandler(__DIR__. '/logs/blue.log', Logger::DEBUG));
            //$logger->pushHandler(new FirePHPHandler());
            $logger->debug($_GET['message']);
            break;

        case "INFO":
            $logger->pushHandler(new StreamHandler(__DIR__. '/logs/blue.log', Logger::INFO));
            //$logger->pushHandler(new FirePHPHandler());
            $logger->INFO($_GET['message']);
            break;

        case "NOTICE":
            $logger->pushHandler(new StreamHandler(__DIR__. '/logs/blue.log', Logger::NOTICE));
            //$logger->pushHandler(new FirePHPHandler());
            $logger->NOTICE($_GET['message']);
            break;

        case "WARNING":
            $logger->pushHandler(new StreamHandler(__DIR__. '/logs/yellow.log', Logger::WARNING));
            //$logger->pushHandler(new FirePHPHandler());
            $logger->WARNING($_GET['message']);
            break;

        case "ERROR":
            $logger->pushHandler(new StreamHandler(__DIR__. '/logs/red.log', Logger::ERROR));
            //$logger->pushHandler(new FirePHPHandler());
            $logger->ERROR($_GET['message']);
            break;


        case "CRITICAL":
            $logger->pushHandler(new StreamHandler(__DIR__. '/logs/red.log', Logger::CRITICAL));
            //$logger->pushHandler(new FirePHPHandler());
            $logger->CRITICAL($_GET['message']);
            break;

        case "ALERT":
            $logger->pushHandler(new StreamHandler(__DIR__. '/logs/red.log', Logger::ALERT));
            //$logger->pushHandler(new FirePHPHandler());
            $logger->ALERT($_GET['message']);
            break;

        case "EMERGENCY":
            $logger->pushHandler(new StreamHandler(__DIR__. '/logs/black.log', Logger::EMERGENCY));
            //$logger->pushHandler(new FirePHPHandler());
            $logger->EMERGENCY($_GET['message']);
            break;
    }

/*    function errorHandeling ($getValue, $errorType, $fileColour){
        if ($_GET["type"] == $getValue) {
            $logger = new Logger('logger');
            $logger->pushHandler(new StreamHandler(__DIR__. '/logs/'.$fileColour.'.log', $errorType));
            $logger->pushHandler(new FirePHPHandler());
            $logger->$errorType($_GET['message']);
            }

    }

    errorHandeling("INFO", "Logger::INFO", "blue");
    errorHandeling("DEBUG", "Logger::DEBUG", "blue");
*/
}




/*$logger = new Logger('logger');



$browserHanlder = new \Monolog\Handler\BrowserConsoleHandler(\Monolog\Logger::INFO);
$streamHandler = new \Monolog\Handler\StreamHandler(__DIR__. '/logs/blue.log', \Monolog\Logger::DEBUG);

$logger->info($_GET['message']);
$logger->pushHandler($browserHanlder);
$logger->pushHandler($streamHandler);

//$app->container->logger = $logger;



$logger->pushHandler(new StreamHandler(__DIR__. '/logs/blue.log', Logger::DEBUG));
$logger->pushHandler(new FirePHPHandler());
$logger->debug($_GET['message']);

$logger->pushHandler(new StreamHandler(__DIR__. '/logs/yellow.log', Logger::WARNING));
$logger->pushHandler(new FirePHPHandler());
$logger->warning($_GET['message']);

$logger->pushHandler(new StreamHandler(__DIR__. '/logs/red.log', Logger::ERROR));
$logger->pushHandler(new FirePHPHandler());
$logger->error($_GET['message']);

$logger->pushHandler(new StreamHandler(__DIR__. '/logs/black.log', Logger::EMERGENCY));
$logger->pushHandler(new FirePHPHandler());
$logger->emergency($_GET['black'].$_GET['message']);*/
require "buttons.html";
