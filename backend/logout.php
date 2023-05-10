<?php
require_once __DIR__.'/init.php';
if(session_id()){
    session_destroy();
    redirect_to();
}