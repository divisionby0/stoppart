<?php

class TestDbSelector extends DBSelector
{
    protected function selectItems(){
        $query = 'SELECT * FROM tovsNew';
        echo '<div>'.$query.'</div>';
        $result = $this->connection->query($query);
        echo '<div>Results:</div>';
        var_dump($result);
        return $result;
    }
}