<?php

namespace Log;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class Simple {
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private static $logger = null;

    /**
     * Sets a logger instance on the object
     *
     * @param LoggerInterface $logger
     *
     * @return null
     */
    public static
    function setLogger(LoggerInterface $logger) {
        self::$logger = $logger;
    }


    public static
    function clearLogger() {
        self::$logger = null;
    }


    public static
    function log($level, $message, $context) {
        if (is_null(self::$logger)) return false;

        return self::$logger->log($level, $message, $context);
    }

    public static
    function alert($message, $context = array()) {
        return self::log(LogLevel::ALERT, $message, $context);
    }

    public static
    function critical($message, $context = array()) {
        return self::log(LogLevel::CRITICAL, $message, $context);
    }


    public static
    function debug($message, $context = array()) {
        return self::log(LogLevel::DEBUG, $message, $context);
    }


    public static
    function emergency($message, $context = array()) {
        return self::log(LogLevel::EMERGENCY, $message, $context);
    }


    public static
    function error($message, $context = array()) {
        return self::log(LogLevel::ERROR, $message, $context);
    }


    public static
    function info($message, $context = array()) {
        return self::log(LogLevel::INFO, $message, $context);
    }


    public static
    function notice($message, $context = array()) {
        return self::log(LogLevel::NOTICE, $message, $context);
    }


    public static
    function warn($message, $context = array()) {
        return self::log(LogLevel::WARNING, $message, $context);
    }
}