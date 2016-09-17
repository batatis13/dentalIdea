<?php
class connect
{
    private static $connection;
    
    private function __construct()
    {
        
    }
    private function __clone() {}
    public static function setConnection($dbInfo,$dbUser,$dbPw)
    {
        if(connect::$connection ==null)
        {
          try
          {
           connect::$connection = new PDO($dbInfo,$dbUser,$dbPw);
            connect::$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          }
          catch(Exception $ex)
          {
            echo "<script>alert('connection failed');</script>";
         } 
        }
 
        return connect::$connection;
    }
    
    public function closeConn()
    {
      oci_close(connect::$connection);
    }
}
?>