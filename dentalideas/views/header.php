<?php
if(session_id()=="")
    session_start();

if(!isset($_SESSION['name']))
   $_SESSION['name']="";
   

    return"
    <header>
    <label name='UserName' >User:".$_SESSION['name']."</label>
				
    </header>
    ";
  
 
