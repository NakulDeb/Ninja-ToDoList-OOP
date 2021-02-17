<?php


namespace Nakul\Models\Query;


trait Update
{
    
    public function update($items, $condition = true)
    {
        $query = "UPDATE $this->model SET " . $items . " WHERE ". $condition;

        if($this->conn->query($query) === false){
            die('Insertion Error. ' . $query. $this->conn->error);
        }
    }





    public function updateWithFullQuery($query)
    {
        if($this->conn->query($query) === false){
            die('Insertion Error. ' . $query. $this->conn->error);
        }
    }
}