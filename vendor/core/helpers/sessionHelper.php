<?php

/**
 * @package arafat php framework
 * @author arafat.dml@gmail.com
 * set data in session
 * @param key and val
 * @return val
 */

function session_set($key, $val)
{
    $_SESSION[$key] = $val;
    return $_SESSION[$key];
}

/**
 * @package arafat php framework
 * @author arafat.dml@gmail.com
 * Retrive form session
 * @param session_key
 * @return session_val or false
 */

function session_get($key)
{
    if(isset($_SESSION[$key])){
        return $_SESSION[$key];
    }
    return false;
}