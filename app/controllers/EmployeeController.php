<?php
include '../models/Employee.php';

class EmployeeController
{
    public function insert($obj)
    {
        $employee = new Employee();

        return $employee->insert($obj);
        header('Location:read.php');
    }

    public function update($obj, $id)
    {
        $employee = new Employee();
        return $employee->update($obj, $id);
    }

    public function delete($obj, $id)
    {
        $employee = new Employee();
        return $employee->delete($obj, $id);
    }

    public function find($id = null)
    {

    }

    public function findAll()
    {
        $employee = new Employee();
        return $employee->findAll();
    }
}
