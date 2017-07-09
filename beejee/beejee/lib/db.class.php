<?php

class DB{
    protected $connection;

    public function __construct($host, $user, $password, $db_name){

        $this->connection = new mysqli($host, $user, $password, $db_name);

        if(mysqli_connect_error() ){
            throw new Exception('Not connection with DB');
        }

        $this->query("SET NAMES UTF8");
    }

    public function query($sql)
    {
        if(!$this->connection){
            return false;
        }

        $rezult = $this->connection->query($sql);

        if(mysqli_error($this->connection)){
            throw new Exception(mysqli_error($this->connection));
        }

        if ( is_bool($rezult) ){
            return $rezult;
        }

        $data=array();
        while($row=mysqli_fetch_assoc($rezult)){
            $data[] = $row;

        }

       //mysqli_free_result($rezult);
        return $data;
    }


    public function escape($str)
    {
        return mysqli_escape_string($this->connection, $str);
    }

}

?>