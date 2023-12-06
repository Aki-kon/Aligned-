<?php 
namespace App\Controllers;
use App\Models\Perfil;
use CodeIgniter\Controller;

class Profile extends Controller{

    public function index(){
        $datos['cabecera'] = view('template/cabecera');
        return view("pages/perfil.php",$datos);

    }
}