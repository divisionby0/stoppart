<?php


class DBConnection
{
    private $serverName = "localhost";
    private $dbName = "stoppart";
    private $login = "root";
    private $password = "kljh76RRenJh7";
    
    private $connection;
    
    private $connected;
    
    public function __construct()
    {
        $this->connection = mysqli_connect($this->serverName, $this->login, $this->password, $this->dbName);
        if (mysqli_connect_errno()) {
            printf("Не удалось подключиться: %s\n", mysqli_connect_error());
            exit();
        }
        else{
            echo '<div>db connected</div>';
            $this->connected = true;
        }
    }
    
    public function isConnected(){
        return $this->connected;
    }
    public function query($query){
        return $this->connection->query($query);
    }
}