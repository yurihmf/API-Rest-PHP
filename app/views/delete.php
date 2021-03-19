<?php
include '../controllers/EmployeeController.php';

$data = file_get_contents('php://input');
$obj = json_decode($data);

$id = $obj->id;

if (!empty($data)) {
    $employeeController = new EmployeeController();
    $employeeController->delete($obj, $id);
    header('Location:read.php');
}
