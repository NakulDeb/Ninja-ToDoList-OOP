<?php


namespace Nakul\Models\Query;


trait Get
{
    private function serveGet($query)
    {
        $result = $this->conn->query($query);
        if ($result === false) {
            die('Shomthing worng ' . $query. ' ' . $this->conn->error);
        }
        $data = array();
        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }





    public function get($items = "*", $condition = true)
    {
        $query = "SELECT  ". $items ." FROM $this->model WHERE ". $condition;
        return $this->serveGet($query);
    }





    public function getWithFullQuery($query)
    {
        return $this->serveGet($query);
    }





    public function rowCount($items = "*", $condition = true)
    {
        $query = "SELECT  ". $items ." FROM $this->model WHERE ". $condition;
        $result = $this->conn->query($query);
        return $result->fetch_array()[0];
    }
}