<?php

//determine the login role based on id
function login_role($id){
    if($id == 1){
        return "Admin";
    }else if($id == 2){
        return "Employee";
    }
}
?>