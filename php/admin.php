<?php

    // $mysqli = mysqli_connect("localhost","root","2822023097","cloud");

    // if(mysqli_connect_errno()){
    //     die(mysqli_connect_error());
    // }

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        print_r(json_encode($_GET));
        
        // if(isset($_GET["get_users"])){
        //     echo "{\"message\":\"Alles gut\"}";
        // }
        // echo "{\"message\":".$_GET["get_users"]."}";
    }else{
        echo "{\"message\":\"Problem\"}";
    }


    
    

?>