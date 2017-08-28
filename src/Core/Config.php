<?php

/*============================================================
 *  Config Class Defination
 *  ver:    0.0.1
 *  descp:  gets config array from file specified by the 
 *          macro CONFIG_FILE.
 *  Use:    use get() method to get value of the specified 
 *          key.
 *============================================================
 */

namespace Src\Core;

use Src\Exceptions\NotFoundException;

class Config 
{    
    // stores configuration in here
    private $data;
    
    // file where config_file is sroted
    const CONFIG_FILE = __DIR__."/../../config/config.json";
    
    
    /*  (construct) 
    * descp:    gets configuration contents and stores 
    *           them in $data
    * params:   none
    * ret:      null
    */
    public function __construct () 
    {
        // check if file exists
        if (!file_exists(self::CONFIG_FILE)) {
            throw new NotFoundException(
                "Error: Config File Not Found: " .
                self::CONFIG_FILE . "."
            );
        }
        
        // Gets file contents and converts it to an array
        $config_json = file_get_contents(self::CONFIG_FILE);
        $this->data = json_decode($config_json, true);
    }
    
    /*  (get) throwable
    * descp:    gets config value of the key provided
    * params:   string Key : Provided key
    * ret:      Value of the key if exists in the config file
    *           or throws a NotFoundExcpetion.
    */
    public function get(string $key) 
    {
        
        // checks if key exists otherwise throws
        if (!isset($this->data[$key])) {
            throw new NotFoundException(
                "Error: Key($key) Doesn't exists in Config file." 
            );
        }
        
        // returns value of specified key 
        return $this->data[$key];
    }
    
}