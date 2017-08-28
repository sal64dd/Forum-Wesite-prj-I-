<?php

namespace Db\Tables;

class forgetPass{
   public static function Query() : string 
   {
       return <<<SQL
CREATE TABLE forgetPass(
    user_id INT UNSIGNED NOT NULL UNIQUE KEY,
    auth_key CHAR(52) NOT NULL UNIQUE KEY,
    expiry TIMESTAMP NOT NULL,
    FOREIGN KEY fk_forgotPass_userid_1 (user_id) REFERENCES user(id)
) ENGINE=InnoDb;
SQL;
   } 
}