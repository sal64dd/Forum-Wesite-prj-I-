<?php

namespace Db\Tables;

class thread{
   public static function Query() : string 
   {
       return <<<SQL
CREATE TABLE thread(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(128) NOT NULL,
    content TEXT NOT NULL,
    created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    user_id INT UNSIGNED NOT NULL,
    FOREIGN KEY fk_thread_userid_1 (user_id) REFERENCES user(id)
) ENGINE=InnoDb;
SQL;
   } 
}