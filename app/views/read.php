<?php
include '../controllers/EmployeeController.php';
$employeeController = new EmployeeController();

header('Content-Type: application/json');

$data = $employeeController->findAll();
echo json_encode($data);
