<?php
namespace App\Controllers;

use App\Models\Employee;

class EmployeeController
{
    public function post($id = null)
    {
        $employee = new Employee();
        if ($id) {
            return $employee->update($_POST, $id);
        } else {
            return $employee->insert($_POST);
        }
    }

    // public function put($id)
    // {
    //     $employee = new Employee();
    //     return $employee->update($_PUT, $id);
    // }

    public function delete($id)
    {
        $employee = new Employee();
        return $employee->delete($id);
    }

    public function get($id = null)
    {
        $employee = new Employee();
        if ($id) {
            return $employee->find($id);
        } else {
            return $employee->findAll();
        }
    }
}
