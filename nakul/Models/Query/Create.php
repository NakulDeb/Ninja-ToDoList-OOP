<?php

namespace Nakul\Models\Query;

trait Create
{
    protected $row_field = [];
    protected $row_value = [];

    public function create($data)
    {

        foreach ($this->fillable as $field){
            if(!is_null($data[$field])) {
                array_push($this->row_field, $field);
                array_push($this->row_value, "'".$data[$field]."'");
            }
        }
        
        $field = implode(', ', $this->row_field);
        $val = implode(', ', $this->row_value);


        $sql = "INSERT INTO $this->model ($field) VALUES ($val)";

        if($this->conn->query($sql) === false){
            die('Insertion Error. ' . $sql. $this->conn->error);
        }
    }
}