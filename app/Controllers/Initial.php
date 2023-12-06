<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\inicio;
class Initial extends Controller{


    public function index(){
        
        $datos['cabecera'] = view('template/cabecera');
        return view("pages/init.php",$datos);

    }
}