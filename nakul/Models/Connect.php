<?php


namespace Nakul\Models;


trait Connect
{
    protected function connect()
    {
        $new_conn = new \mysqli($this->db_host, $this->db_username, $this->db_pass, $this->db_name);
        if($new_conn->connect_error){
            die('Db connection error ' . $new_conn->connect_error);
        }
        return $new_conn;
    }
}