<?php

namespace Db\Tables;

class signupRequest{
   public static function Query() : string 
   {
       return <<<SQL
CREATE TABLE signupRequest(
    username VARCHAR(20) NOT NULL UNIQUE KEY ,
    email VARCHAR(255) NOT NULL UNIQUE KEY ,
    pass VARCHAR(255) NOT NULL,
    auth_key CHAR(52) NOT NULL UNIQUE KEY,
    expiry TIMESTAMP NOT NULL
) ENGINE=InnoDb;
SQL;
   } 
}