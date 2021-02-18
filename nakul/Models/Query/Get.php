<?php


namespace Nakul\Models\Query;


trait Get
{
    private function serveGet($query)
    {
        $result = $this->conn->query($query);
        if ($result === false) {
            die('Shomthing worng ...' . $query. ' ...' . $this->conn->error);
        }
        $data = array();
        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }


    protected function makingQuery($condition, $select, $count)
    {
        $conditionSets = array();
        if($select === ['*'] || $select === []) $select =  '*';
        else $select = "`".implode("`, `", $select)."`";

        foreach($condition as $key => $value) {
            $conditionSets[] = "`".$key . "` = '" . $value . "'";
        }

        $query = "SELECT ";
        $query .= $count ? " COUNT(id) " : $select ;
        $query .= " FROM $this->model WHERE ";
        $query .=  empty($conditionSets) ? true : join(" AND ", $conditionSets);
        return $query;
    }




    public function get($condition = [], $select = ['*'], $count = false)
    {
        $query = $this->makingQuery($condition, $select, $count);

        if($count) return $this->conn->query($query)->fetch_array()[0];

        return $this->serveGet($query);
    }




    public function getWithFullQuery($query)
    {
        return $this->serveGet($query);
    }
}