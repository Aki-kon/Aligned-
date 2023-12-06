<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Comunidades ;
class Community extends Controller{

    public function index(){

        $datos['cabecera'] = view('template/cabecera');
        return view("pages/comunidades.php",$datos);

    }

}