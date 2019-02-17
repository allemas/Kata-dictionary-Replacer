<?php
require_once "DictionaryReplacer.php";

use PHPUnit\Framework\TestCase;

class DictionaryReplacer_test extends TestCase
{
    function testClassType()
    {
        $class = new DictionaryReplacer();
        $this->assertInstanceOf(
            DictionaryReplacer::class,
            $class
        );
    }

    function testEmptyInput()
    {
        $class = new DictionaryReplacer();
        $this->assertEquals(
            $class->replace("", ["temp" => "template"]),
            ""
        );
    }

    /**
     * input : "\$temp\$", dict \["temp", "temporary"\],
     * output: "temporary"
     */
    function testBaseRemplacement()
    {
        $class = new DictionaryReplacer();
        $this->assertEquals(
            $class->replace("\$temp\$", ["temp" => "temporary"]),
            "temporary"
        );
    }

    /**
     * input : "\abc$temp\$", dict \["temp", "temporary"\],
     * output: "abctemporary"
     */
    function testInStringRemplacement()
    {
        $class = new DictionaryReplacer();
        $this->assertEquals(
            $class->replace("abc\$temp\$", ["temp" => "temporary"]),
            "abctemporary"
        );
    }

    /**
     * input : "\$temp\$ here comes the name \$name\$", dict \["temp",
     * "temporary"\] \["name", "John Doe"\],
     * output : "temporary here comes the name John Doe"
     */
    function testAdvencedReplacement()
    {
        $class = new DictionaryReplacer();
        $this->assertEquals(
            $class->replace("\$temp\$ here comes the name \$name\$", ["temp" => "temporary", "name" => "John Doe"]),
            "temporary here comes the name John Doe"
        );
    }


}