<?php
/**
 * Created by IntelliJ IDEA.
 * User: thyde
 * Date: 2/19/14
 * Time: 5:19 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Log\Test;


use Log\Simple;
use Monolog\Handler\TestHandler;
use Monolog\Logger;

class SimpleTest extends \PHPUnit_Framework_TestCase {
    /** @var \MonoLog\Logger */
    private $logger = null;
    /** @var \Monolog\Handler\TestHandler */
    private $handler = null;


    public
    function setUp() {
        Simple::clearLogger();
        $this->logger  = new Logger("justALogger");
        $this->handler = new TestHandler();

        $this->logger->pushHandler($this->handler);

        $simple = new Simple();
        $simple->setLogger($this->logger);
    }


    public
    function testDoNothing() {
        Simple::warn("Hello world");

        // doesn't throw an exception if we don't do any setup!
        $this->assertTrue(true);
    }


    public
    function testCritical() {

        $context = array("foo" => "bar");
        Simple::critical("hello", $context);

        $this->assertTrue($this->handler->hasCriticalRecords());
        foreach ($this->handler->getRecords() as $record) {
            $this->assertEquals("hello", $record['message']);
            $this->assertEquals("CRITICAL", $record['level_name']);
            $this->assertEquals($context, $record['context']);
        }
    }


    public
    function testDebug() {

        $context = array();
        Simple::debug("hello", $context);

        $this->assertTrue($this->handler->hasDebugRecords());
        foreach ($this->handler->getRecords() as $record) {
            $this->assertEquals("hello", $record['message']);
            $this->assertEquals("DEBUG", $record['level_name']);
            $this->assertEquals($context, $record['context']);
        }
    }


    public
    function testEmergency() {

        $context = array("foo" => "bar", 'baz' => 'food');
        Simple::emergency("hello", $context);

        $this->assertTrue($this->handler->hasEmergencyRecords());
        foreach ($this->handler->getRecords() as $record) {
            $this->assertEquals("hello", $record['message']);
            $this->assertEquals("EMERGENCY", $record['level_name']);
            $this->assertEquals($context, $record['context']);
        }

    }

    public
    function testError() {

        $context = array();
        Simple::error("hello");

        $this->assertTrue($this->handler->hasErrorRecords());
        foreach ($this->handler->getRecords() as $record) {
            $this->assertEquals("hello", $record['message']);
            $this->assertEquals("ERROR", $record['level_name']);
            $this->assertEquals($context, $record['context']);
        }
    }


    public
    function testInfo() {

        $context = array("foo" => "bar");
        Simple::info("hello", $context);

        $this->assertTrue($this->handler->hasinfoRecords());
        foreach ($this->handler->getRecords() as $record) {
            $this->assertEquals("hello", $record['message']);
            $this->assertEquals("INFO", $record['level_name']);
            $this->assertEquals($context, $record['context']);
        }
    }

    public
    function testNotice() {

        $context = array("foo" => "bar");
        Simple::notice("hello", $context);

        $this->assertTrue($this->handler->hasNoticeRecords());
        foreach ($this->handler->getRecords() as $record) {
            $this->assertEquals("hello", $record['message']);
            $this->assertEquals("NOTICE", $record['level_name']);
            $this->assertEquals($context, $record['context']);
        }
    }

    public
    function testWarn() {

        $context = array("foo" => "bar");
        Simple::warn("hello", $context);

        $this->assertTrue($this->handler->hasWarningRecords());
        foreach ($this->handler->getRecords() as $record) {
            $this->assertEquals("hello", $record['message']);
            $this->assertEquals("WARNING", $record['level_name']);
            $this->assertEquals($context, $record['context']);
        }
    }

}