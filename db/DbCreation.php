<?php

/*============================================================
 *  DbCreation Static Class Defination
 *  ver:    0.0.1
 *  descp:  creates db Tables 
 *  Use:    call DbCreation::Create();
 *============================================================
 */

namespace Db;

use Src\Exceptions\DbException;
use Src\Exceptions\NotFoundException;

class DbCreation {
    
    /* Stores table/file names that contains class of same 
     * name whic basicaly define SQL tabel creation syntax. 
     */   
    const TABLE_CLASSES = [
        "user",
        "forgetPass",
        "signupRequest",
        "thread",
        "post" 
    ] ;
    
    /*  (Create) throwable
     * descp: Creates database Tables
     * params:  none
     * ret: null
     */
    public static function Create( \PDO $db ) {
        
        // loops for each table per file
        foreach (self::TABLE_CLASSES as $table) {
            $class = "Db\\Tables\\$table";  // prefix namespace
            
            // Check if class exists
            if (!class_exists($class)) {
                throw new NotFoundException(
                    "Error: Table Class: ($class) " .
                    "Not Found During Migration."
                );
            }
            
            
            $query = $class::Query();           // gets query
            $statement = $db->prepare($query);  // prepares it
            if (!$statement->execute()) {       // executes it
                throw new DbException(
                    "Error[$class]: ". $statement->errorinfo()[2]  // Error descp
                );                              // on error
            } 
        }
        
    }
    
}
