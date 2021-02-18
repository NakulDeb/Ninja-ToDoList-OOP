<?php

namespace Nakul\Models\Query;

trait Create
{
    public function create($data)
    {
        $fillable_property = $this->fillable;
        $data = array_filter($data, function ($key) use($fillable_property){
            return in_array($key, $fillable_property);
        },ARRAY_FILTER_USE_KEY);


        $query = "INSERT INTO $this->model ";
        $query .= " (`".implode("`, `", array_keys($data))."`) ";
        $query .= " VALUES ('".implode("', '", $data)."') ";


        if($this->conn->query($query) === false){
            die('Insertion Error. ' . $query. $this->conn->error);
        }
    }
}