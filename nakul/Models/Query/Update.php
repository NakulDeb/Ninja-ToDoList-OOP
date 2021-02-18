<?php


namespace Nakul\Models\Query;


trait Update
{
    
    public function update($condition, $data)
    {
        $dataSets = array();
        $conditionSets = array();


        foreach($data as $key => $value) {
            $dataSets[] = "`".$key . "` = '" . $value . "'";
        }

        foreach($condition as $key => $value) {
            $conditionSets[] = "`".$key . "` = '" . $value . "'";
        }

        $query = "UPDATE $this->model SET ". join(",",$dataSets) . " WHERE " . join(" AND ", $conditionSets);

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