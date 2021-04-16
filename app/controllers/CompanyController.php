<?php
namespace App\Controllers;

use App\Models\Company;

class CompanyController
{

    public function get($id_empresa = null)
    {
        $company = new Company();
        if ($id_empresa) {
            return $company->find($id_empresa);
        } else {
            return $company->findAll();
        }
    }

    public function post($id_empresa = null)
    {
        $company = new Company();
        if ($id_empresa) {
            return $company->update($id_empresa, $_POST);
        } else {
            return $company->insert($_POST);
        }
    }

    // public function put($id_empresa)
    // {
    //     $company = new Company();
    //     return $company->update($id_empresa, $_PUT);
    // }

    public function delete($id_empresa)
    {
        $company = new Company();
        return $company->delete($id_empresa);
    }
}
