<?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS' ,'');
    define('DB_NAME', 'healthcare');
    class DB_con
    {
        function __construct()
        {
            $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
            $this->dbh=$con;
            // Check connection
            if (mysqli_connect_errno())
            {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
             }
        }

            // Function for registration
         public function registration($uname,$uemail,$pasword)
        {
           $ret=mysqli_query($this->dbh,"insert into admin(username,email,password) values('$uname','$uemail','$pasword')");
            return $ret;
        }

        // Function for signin
        public function signin($uname,$pasword)
        {
            $result=mysqli_query($this->dbh,"select id,username from admin where username='$uname' and password='$pasword'");
            return $result;
        }


    }
?>