<?php

namespace Db\Tables;

class post{
   public static function Query() : string 
   {
       return <<<SQL
CREATE TABLE post(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    thread_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    FOREIGN KEY fk_post_userid_1 (user_id) REFERENCES user(id),
    FOREIGN KEY fk_post_threadid_1 (thread_id) REFERENCES thread(id)
) ENGINE=InnoDb;
SQL;
   } 
}