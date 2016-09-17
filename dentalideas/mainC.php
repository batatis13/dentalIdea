<?php
  session_start();

  // les variables de connexion
  $dbUser = "";
  $dbPw = "";
  $dbInfo = "";
  // le variable de connexion 
  $dbConnection;
  // la classe de connection "singleton"
  include_once"models/connect.class.php";
  //inclus la classe pour les eurreurs comme on a fait dans le c++
  include_once"models/error_code.class.php";
  //la creation de la connexion
  $dbConnection=connect::setConnection($dbInfo,$dbUser,$dbPw);



    //creer la page principale
    $pageData = new stdClass();
	// le titre 
    $pageData->title = "";
	// css
    $pageData->css = "<link rel='stylesheet' href=''/>";
	//java and jquery
    $pageData->script="<script src=''></script>";
     $pageData->script+="<script src=''></script>";
	 $pageData->script+="<script src=''></script>";
	 // pour le login on va inclu les classes des utilisateurs et de l'admin
     include_once"models/users.class.php";
	 include_once"models/admin.class.php";
	 // le header 
    $pageData->content= include_once "views/header.php";
	//le div de milieu ou il ya le side menu et le contenu
	$pageData->content+= "<div class='center'>";
	// si il y a une utilisateur logged in
	if(isset($_SESSION["userType"]))
	{
	  //le fichier du menu on doit lui donner un class qui sera le meme du contenu pour faire les 2 inline-block dans le CSS
	 $pageData->content= include_once "views/sideMenu.php";
	 // le variable page c'est le variable dans le fichier sideMenu qui va egale a le nom du page quand l'utilisateur clique sur le lien
     $userClicked = isset($_GET['page']);
	 $pageData->content= "<div id='contenu'>";
	}
	
	// si l'utilisateur clique sur un lien dans le header ou le footer ou le side menu
    if($userClicked)
    {
	  // le nom du fichier (le varaible page ses valeurs doit etre les noms des fichiers)
      $fileToLoad = $_GET['page'];
       $pageData->content .= include_once "views/$fileToLoad.php";
      
    }
	// si il y a un utilisateur logged in alors il va voir le page principal
	elseif(isset($_SESSION["userType"]))
	{
	     $fileToLoad = "principal";
         $pageData->content .= include_once "views/$fileToLoad.php";
	}
	// l'acceuil ou le login quand personne est logged in
    else
    {
	  // si on n'a pas cliquer sur le menu le page de logIn va paraitre (c'est la page de login)
         $fileToLoad = "logIn";
         $pageData->content .= include_once "views/$fileToLoad.php";
    }
	if(isset($_SESSION["userType"]))
	  $pageData->content+= "</div>";
	$pageData->content+= "</div>";
    $pageData->content.= include_once "views/footer.php";
	//page template
    $page = include_once "views/page.php";
 
 
    echo $page;
    include_once "checkingLogIn.control.php";

 