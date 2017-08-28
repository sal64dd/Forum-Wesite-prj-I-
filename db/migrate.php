<?php

/*============================================================
 *  migrate cli script
 *  ver:    0.0.1
 *  descp:  Creates database tables specified in 
 *          tables Folder. 
 *  Params: None 
 *  Use:    Run php migrate run to create all the 
 *          specified tables. 
 *============================================================
 */

namespace Db;

require_once __DIR__ . '/../vendor/autoload.php';

use Src\Core\Config;
use Db\DbCreation;
use Src\Exception\DbException;
use Src\Exception\NotFoundException;

// Getting CLI options as an array $_CLI
parse_str(implode('&', array_slice($argv, 1)), $_CLI);
$_CLI = array_keys($_CLI);      // contains all the command line options
     
// switching over CLI options.
if (isset($_CLI[0])) {
    
    switch ($_CLI[0]) {  
        // Run case: calls run function.
        case 'run' : 
            run();  // rebuilds db
            break;
            
        // Other cases: outputs error
        default:
            echo "\tError: Invalid Argument => $_CLI[0] \n";
            echo "\tTry `php migrate run` to rebuild db.\n";
            break;
    }
} else {
    echo "\tError: No Argument. \n";
    echo "\tTry `php migrate run` to rebuild db.\n";
}

/*  (run) 
 * descp: rebuilds database 
 * params:  none
 * ret: null
 */
function run() {
    // creating config and db objects
    $config = new Config();
    $dbConfig = $config->get('db');
    $db = $dbConfig['db'];
    $pdo = new \PDO(
        "mysql:host=127.0.0.1;dbname=$db",
        $dbConfig['user'],
        $dbConfig['password']
    );
    
    // Creating Tables
    try {
        DbCreation::Create($pdo);
    }
    catch (DbException $e) {
        echo 'Database Error: \n';
        echo $e->errorMessage();
        exit();
    }
    catch (NotFoundException $e) {
        echo 'NotFound Error: \n';
        echo $e->errorMessage();
        exit();
    }
    catch (\Exception $e) {
        echo 'Unknown Error? \n';
        echo $e->errorMessage();
        exit();
    }
    
    echo 'Migration Sucessfull! \n';
    
}

exit();