<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdministradorController;
use App\Administrador;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{
    public function index()
    {
    	return view('paginaAdministrador');
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
    	$admin = new Administrador();
        $admin->Correo=$request->input('Correo');
        $admin->Password=Hash::make($request->input('Password'));
        $admin->save();
    	return redirect('/');
    }

    public function show()
    {

    }
    public function edit()
    {

    }
    public function update()
    {

    }
    public function destroy()
    {

    }
}
