<?php

function Model($nameModel){
    include_once "../../Models/$nameModel.php";
}
function View($nameView){
    include_once "./user/pages/$nameView.php";
}