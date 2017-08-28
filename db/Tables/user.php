<?php

namespace Db\Tables;

class user{
   public static function Query() : string 
   {
       return <<<SQL
CREATE TABLE user(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) UNIQUE KEY NOT NULL,
    email VARCHAR(255) UNIQUE KEY NOT NULL,
    pass VARCHAR(255) NOT NULL
) ENGINE=InnoDb;
SQL;
   } 
}