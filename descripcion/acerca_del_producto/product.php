<?php
include_once("../../metodos/clas-view.php");
include_once("../../metodos/clas-verific.php");
include_once("../../cajon/bootstrap/bootstrap.php");

if(! isset( $_SESSION))session_start();
if( isset($_GET['http'])){
    if($_SESSION['token'] != $_GET['http'] ){
       header("location: error.php");
       
    }
}

if(isset($_GET['question'])){
    if($_GET['question'] == true){
        ?><Script>
            window.onload = function() {
            alertCarrito(1);
            };
        </Script><?php  
    }if($_GET['question'] == false){
        ?><Script>
        window.onload = function(){
            alertCarrito(2);
        };
    </Script><?php   
    }if($_GET['question'] == "existe"){
        ?><Script>
        window.onload = function(){
            alertCarrito(3);
        };
        </Script><?php 
    }
}

$seccion = "producto";
include($seccion.".php");
