<?php
class Users
 {
	  private $id;
	  private $name;
	  private $password;
	  private Branch $Branch;
	  private $creationDate;
	  private $companyId;
	  private $city;
	  private $province;
	  private $country;
	  private $iva;
	  private $honoraire;
      private $exento;
	  private $type;
	  
	    public function logIn($userName,$password);
		{
		   //check login
		   // if user exsits
		   //this.type=setType($userName,$password);
		}
		
		public function getType()
		{
		 return this.type;
		}
		
		
		// args est un variable string qui contient tous les valeurs pour le sql 
	    public function insert($args)
		{
		 
		}

		public function modify($args)
		{
		 
		}
		
	    public function delete($args)
		{
		 
		}
		
		public function select()
		{
		 
		}
		
		public function selectById()
		{
		 
		}
		
  }
?>