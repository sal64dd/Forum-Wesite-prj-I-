<?php

namespace Tests\Core;
use Tests\AbstractTestCase;
use Src\Core\Config;
use Src\Exceptions\NotFoundException;

class ConfigTest extends AbstractTestCase {
    private $config;
    
    public function setUp() {
        $this->config = new Config();
    }
    
    public function testConfigGetDb() {
        $this->assertSame(
            $this->config->get('db')['db'],
            'test',
            'Error: db doesnt match'
        );
    }
    
    /**
     * @expectedException \Src\Exceptions\NotFoundException
     * @expectedExceptionMessage Error: Key(abc) Doesn't exists in Config file.
     */
    public function testConfigThrowError() {
        // this will throw exception
        $this->config->get('abc');     
    }
    
    
}