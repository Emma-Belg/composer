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
    $to = "test@email";
    $subject = "error";
    $from = "another@email";
    //https://fossies.org/dox/phpmyfaq-2.9.13/classMonolog_1_1Handler_1_1NativeMailerHandler.html
    //level is "	The minimum logging level at which this handler will be triggered" should be an int
    $level = Logger::ERROR;
    //bool	$bubble	Whether the messages that are handled can bubble up the stack or not
    $bubble = true;
    //int	$maxColumnWidth	The maximum column width that the message lines will have
    $maxColumnWidth = 70;


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
            $NativeMailerHandler = new  Monolog\Handler\NativeMailerHandler($to, $subject, $from, $level, $bubble, $maxColumnWidth
            );
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


require "buttons.html";
