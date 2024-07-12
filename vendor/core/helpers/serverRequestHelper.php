<?php

function is_post(){
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        return true;
    }
    return false;
}

function is_get(){
    if($_SERVER['REQUEST_METHOD'] === "GET"){
        return true;
    }
    return false;
}