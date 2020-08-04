<?php
include "config.php";
include_once "CrudOperations.php";
$obj = new DB;
$obj->connect();


$crudObj = new CrudOperations();
if ($_POST['crudOperation'] == "saveData") {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $DOB = $_POST['Dob'];
    $Sex = $_POST['Sex'];

    $editId = $_POST['editId'];
    $save = $crudObj->saveData($connection,$Name,$Email,$Phone,$DOB,$Sex,$editId);
    if ($save){
        echo "saved";
    }
}

if ($_POST['crudOperation'] == "getData") {
    $sr = 1;
    $tableData = '';
    $allData = $crudObj->getAllData($connection);
    if ($allData->num_rows>0) {
        while ($row = $allData->fetch_object()) {
            $tableData .= ' <tr>
                <td>'.$sr.'</td>
                <td>'.$row->Name.'</td>
                <td>'.$row->Email.'</td>
                <td>'.$row->Phone.'</td>
                <td>'.$row->DOB.'</td>
                <td>'.$row->Sex.'</td>

                <td><a href="javaScript:void(0)" onclick="editData(\''.$row->UserID.'\',\''.$row->Name.'\',\''.$row->Email.'\',\''.$row->Phone.'\',\''.$row->DOB.'\',\''.$row->Sex.'\');" class="btn btn-success btn-sm">Edit <i class="fa fa-pencil-square-o"></i></a>
                <a href="javaScript:void(0)" onclick="deleteData(\''.$row->UserID.'\');" class="btn btn-danger btn-sm">Delete <i class="fa fa-trash-o"></i></a>
                <i class="fa fa-spinner fa-spin" id="deleteSpinner'.$row->UserID.'" style="color: #ff195a;display: none"></i></td>
            </tr>';
            $sr++;
        }
    }
    echo $tableData;
}

if ($_POST['crudOperation'] == "deleteData"){
    $deleteId = $_POST['deleteId'];
    $delete = $crudObj->deleteData($connection,$deleteId);
    if ($delete){
        echo "deleted";
    }
}
