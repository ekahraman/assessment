<?php

/**
 * Database Instance
 *
 * HOST     -> DB host name
 * USER     -> DB user name
 * PASSWORD -> DB password
 * DATABASE -> DB name
 * CHARSET  -> DB charset
 */

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'assessment');
define('CHARSET', 'utf8');

/**
 * Takes no parameters and returns
 * a PDO instance
 *
 * @return PDO
 */
function PDO() {
    static $instance;
    if ($instance === null) {
        $args = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => FALSE,
        );
        $info       = 'mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=' . CHARSET;
        $instance   = new PDO($info, USER, PASSWORD, $args);
    }

    return $instance;
}