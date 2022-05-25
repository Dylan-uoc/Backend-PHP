<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Profesor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function verificarUsuario(Request $request){
        $tipo_usuario = $request->input('tipo_usuario');
        $username = $request->input('username');
        $password = $request->input('password');

        switch ($tipo_usuario) {
            case 'students':
                
                $estudiante = Estudiante::where('email','=',$username)->where('pass','=',$password)->first();

                if($estudiante != null){
                   
                    session(["usuario" => $estudiante]);
                    session(["role" => "students"]);

                    return redirect()->route('inicioPanelEstudiantes');

                }else{
                    return redirect()->route('login')->with('error','No existe estudiante con ese usuario y contraseña');
                }

                break;

            case 'teachers':
                $profesor = Profesor::where('email','=',$username)->where('nif','=',$password)->first();

                if($profesor != null){
                   
                    session(["usuario" => $profesor]);
                    session(["role" => "teachers"]);

                    return redirect()->route('inicioPanelProfesor');

                }else{
                    return redirect()->route('login')->with('error','No existe profesor con ese usuario y contraseña');
                }
                break;

            case 'users_admin':
                $admin = User::where('email','=',$username)->where('password','=',$password)->first();

                if($admin != null){
                   
                    session(["usuario" => $admin]);
                    session(["role" => "users_admin"]);

                    return redirect()->route('admin');

                }else{
                    return redirect()->route('login')->with('error','No existe administrador con ese usuario y contraseña');
                }
                break;
                break;
        }
    }

    public function logout(){
        Session::flush();
        return redirect()->route('login');
    }
}
