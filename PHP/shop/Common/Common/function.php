<?php


function jm($a){//加密
    return md5($a);
}

function che(){
    // return 0;
    // return C('COO_KIE');exit;
    return jm(cookie('username').cookie('userid').C('COO_KIE')) === cookie('key');
}
