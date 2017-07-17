<?php
class User extends Model
{
    public function getUser($login,$password)
    {

        $login = $this->db->escape($login);
        $sql = "select * from users where login = '{$login}' AND password = '{$password}' limit 1";
        $result = $this->db->query($sql);
        if( isset($result[0]) ){
            return $result[0];
        }
        return false;
    }
}


?>