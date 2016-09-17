<?php
if(session_id()=="")
{
    session_start();
}

include_once"models/users.class.php";
include_once"models/admin.class.php";

 if(isset($_POST['bouttonNom']))
  {
	
    $userName=$_POST['inputName'];
    $Password=$_POST['inputName'];
	if(!empty($userName)|| !empty($Password))
	{
		$client=new client($dbConnection);
        $userNameF=$client->checkingUserName($userName);
	    $userPassF=$client->checkingingPassword($Password);
	    if($userNameF==error_code::failed ||$userPassF==error_code::failed )
	    echo "<script> alert ('Wrong userName or Password')</script>";
	    else
	    {
			$_SESSION['type']="Client";
			$client->setIdClient($userNameF,$userPassF);
			$name=$client->getName();
			$prenom=$client->getPrename();
			$_SESSION['name']=$prenom." ".$name;
		    echo "<script> window.location='http://127.0.0.1:8000/3rdSession/uml/cafeteria/mainC.php?page=acceuil';</script>";
	    }
	}
	else
	echo "<script> alert ('Enter all the required information')</script>";

  }
  
  if(isset($_POST['butEntrerAdmin']))
  {
	
    $userName=$_POST['adminUserName'];
    $Password=$_POST['adminPassword'];
	if(!empty($userName)|| !empty($Password))
	{
		$admin=new admin($dbConnection);
        $userNameF=$admin->checkingUserName($userName);
	    $userPassF=$admin->checkingingPassword($Password);
	    if($userNameF==error_code::failed ||$userPassF==error_code::failed )
	    echo "<script> alert ('Wrong userName or Password')</script>";
	    else
	    {
			
			$_SESSION['type']="Admin";
			$admin->setIdAdmin($userNameF,$userPassF);
			$_SESSION['name']=$userNameF;
		    echo "<script> window.location='http://127.0.0.1:8000/3rdSession/uml/cafeteria/mainC.php?page=acceuil';</script>";
	    }
	}
	else
	echo "<script> alert ('Enter all the required information')</script>";

  }
  
  if(isset($_POST['butInsertMembre']))
  {
	$nom=$_POST['txtNomMembre'];
	$prenom=$_POST['txtPrenomMembre'];
    $userName=$_POST['txtLogin'];
    $password=$_POST['txtPassword'];
    $client=new client($dbConnection);
	if(!empty($userName)|| !empty($password)||!empty($nom)||!empty($prenom))
	{
		$check=$client->insertClient($nom,$prenom,$userName,$password);
		if($check!=error_code::failed )
		{
			$_SESSION['type']="Client";
			$client->setIdClient($userNameF,$userPassF);
			$name=$client->getName();
			$prenom=$client->getPrename();
			$_SESSION['name']=$prenom." ".$name;
		    echo "<script> window.location='http://127.0.0.1:8000/3rdSession/uml/cafeteria/mainC.php?page=acceuil';</script>";
	     }
		 else
		 echo "<script> alert ('Couldn't make the inscription')</script>";
	}
	else
	echo "<script> alert ('Enter all the required information')</script>";

  }
  
   if(isset($_POST['logOut']))
  {
	session_destroy();
	$conn->closeConn();
	$dbConnection=null;
	 echo "<script> window.location='http://127.0.0.1:8000/3rdSession/uml/cafeteria/mainC.php?page=acceuil';</script>";
  }

  