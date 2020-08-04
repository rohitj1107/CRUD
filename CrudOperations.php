<?php
class CrudOperations
{
    public function saveData($connection,$Name,$Email,$Phone,$DOB,$Sex,$editId)
    {
        if ($editId == "") {
            $query = "INSERT INTO mUsers SET Name='$Name',Email='$Email',Phone='$Phone',DOB='$DOB',Sex='$Sex'";
        }else{
            $query = "UPDATE mUsers SET Name='$Name',Email='$Email',Phone='$Phone',DOB='$DOB',Sex='$Sex' WHERE UserID='$editId'";
        }
        $result = $connection->query($query) or die("Error in saving data".$connection->error);
        return $result;
    }

    public function getAllData($connection)
    {
        $query = "SELECT * FROM mUsers";
        $result = $connection->query($query) or die("Error in getting data".$connection->error);
        return $result;
    }

    public function deleteData($connection,$deleteId){
        $query = "DELETE FROM mUsers WHERE UserID='$deleteId'";
        $result = $connection->query($query) or die("Error in deleting data".$connection->error);
        return $result;
    }
}
