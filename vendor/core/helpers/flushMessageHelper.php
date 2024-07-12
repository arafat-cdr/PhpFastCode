<?php
function set_flush($is_flush_msg = 0, $alert_class = NULL, $msg_1 = NULL, $msg_2 = NULL, $grid_class = NUll) {

    $_SESSION['is_flush_msg'] =  $is_flush_msg;
    $_SESSION['grid_class']   =  $grid_class;
    $_SESSION['alert_class']  =  $alert_class;
    $_SESSION['msg_1']        =  $msg_1;
    $_SESSION['msg_2']        =  $msg_2;
}

function default_success_flash($type = 'Save'){

    set_flush(TRUE, "success", "Well done! ", "Data ".$type." Successfull");
}

function default_failed_flash($type = 'Save'){

    set_flush(TRUE, "danger",  "oops! ", "Data ".$type." Failed");
}

function custom_success_flash($msg){
    set_flush(TRUE, "success", "Well done! ", $msg);
}

function custom_failed_flash($msg){
    set_flush(TRUE, "danger", "Oops! ", $msg);
}


function delete_flush() {

    $_SESSION['is_flush_msg'] =  NULL;
    $_SESSION['grid_class']   =  NULL;
    $_SESSION['alert_class']  =  NULL;
    $_SESSION['msg_1']        =  NULL;
    $_SESSION['msg_2']        =  NULL;
}
