<?php

class PlatesDBSelector extends DBSelector
{
    protected function selectItems(){
        $query = 'SELECT ida, name,imageFile,(SELECT name FROM creator WHERE id=AutorPicture) AS author, (SELECT name FROM picture WHERE id=Picture) AS image FROM tovsNew WHERE Factory=16 AND Diameter=200';
        $result = $this->connection->query($query);
        return $result;
    }
}