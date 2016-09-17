<?php
 class Admin 
 {
	 private Users $newUser;
	 private $type;
	 private $name;
	 private $password;
	  
	   public function logIn($userName,$password);
		{
		   //check login
		   // if user exsits
		   //this.type=setType($userName,$password);
		}
		
	    public function createUser($args)
		{
		  $newUser=new Users();
		  $newUser->insert($args);
		}
		
		public function updateUser($args)
		{
		  $newUser=new Users();
		  $newUser->modify($args);
		}
		
		public function deleteUser($args)
		{
		  $newUser=new Users();
		  $newUser->modify($args);
		}
		
  }
?>