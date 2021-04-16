<?php
namespace App\Controllers;

use App\Models\Passivo;

class PassivoController
{
    public function get($id = null)
    {
        if ($id) {
            return Passivo::find($id);
        } else {
            return Passivo::findAll();
        }
    }
}
