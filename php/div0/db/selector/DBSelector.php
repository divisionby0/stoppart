<?php

class DBSelector
{
    protected $connection;
    private $isConnected;
    public function __construct()
    {
        $this->createConnection();
    }
    
    private function createConnection(){
        $this->connection = new DBConnection();
        $this->isConnected = $this->connection->isConnected();
    }
    
    public function select(){
        if($this->isConnected){
            return $this->selectItems();
        }
        else{
            return "Error: Not connected to DB !";
        }
    }
    protected function selectItems(){
        return "selected items collection";
    }
}