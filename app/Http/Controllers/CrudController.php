<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{

    public function consulta($id=null)
    {
        if (isset($id)) {            
            $consulta = DB::table('clientes')->get();
            $usuario = DB::table('clientes')->get()->where('id_cliente', $id)->first();
            return view('index')->with('consulta', $consulta)->with('usuario', $usuario);
        }
        else{
            $consulta = DB::table('clientes')->get();
            return view('index')->with('consulta', $consulta);
        }
    }

    public function alta(Request $request)
    {
        $data = $request->validate([
            'clave'=>['int','required', 'unique:clientes,clave'],
            'nom_com'=> ['required'],
            'raz_soc'=> ['required'],
            'rfc'=> ['required', 'max:13', 'unique:clientes,rfc','regex:/^([A-Z,Ñ,&]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})$/'],
            'edad'=> ['int'],
            'domicilio'=> '',
            'estatus'=>''
        ],[
            'clave.int'=>'Debe ser numerico',
            'clave.required'=>'El campo clave es obligatorio.',
            'clave.unique'=>'Ya se encuentra registrado un cliente con esa clave',

            'nom_com.required'=> 'El campo Nombre comercial es obligatorio.',

            'raz_soc.required'=> 'El campo Razón social es obligatorio.',

            'rfc.required'=> 'El campo RFC es obligatorio.',
            'rfc.unique'=>'Ya se encuentra registrado un cliente con ese RFC',
            'rfc.max'=>'El RFC no puede tener más de 13 caracteres.',
            'rfc.regex'=>'El RFC proporcionado no es válido.',

            'edad.int'=>'Debe ser numero.'
        ]);

        $estatus = 2;

        if(isset($data['estatus']))
            $estatus = 1;

        DB::table('clientes')->insert([
            'clave' => $data['clave'], 
            'nom_com' => $data['nom_com'],
            'raz_soc' => $data['raz_soc'],
            'rfc' => $data['rfc'],
            'edad' => $data['edad'],
            'domicilio' => $data['domicilio'],
            'estatus'=>$estatus
        ]);

    	return redirect()->action('CrudController@consulta');
    }

    public function editar($id)
    {
        $data = request()->validate([
            'clave'=>['required', Rule::unique('clientes')->ignore($id, 'id_cliente')],
            'nom_com'=> ['required'],
            'raz_soc'=> ['required'],
            'rfc'=> ['required', 'max:13', 'regex:/^([A-Z,Ñ,&]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})$/'],
            'edad'=> ['max:3'],
            'domicilio'=> ['max:100'],
            'estatus'=>''
        ],[
            'clave.required'=>'El campo clave es obligatorio.',
            'clave.unique'=>'Ya se encuentra registrado un cliente con esa clave',
            'clave.max'=>'La clave no puede tener más de 15 caracteres.',

            'nom_com.required'=> 'El campo Nombre comercial es obligatorio.',

            'raz_soc.required'=> 'El campo Razón social es obligatorio.',

            'rfc.required'=> 'El campo RFC es obligatorio.',
            'rfc.unique'=>'Ya se encuentra registrado un cliente con ese RFC',
            'rfc.max'=>'El RFC no puede tener más de 13 caracteres.',
            'rfc.regex'=>'El RFC proporcionado no es válido.',

            'edad.int'=>'Debe ser numero.'
        ]);

        $estatus = 2;

        if(isset($data['estatus']))
            $estatus = 1;

        DB::table('clientes')
            ->where('id_cliente', $id)
            ->update([
            'clave'=>$data['clave'],
            'nom_com'=>$data['nom_com'],
            'raz_soc'=>$data['raz_soc'],
            'rfc'=>$data['rfc'],
            'edad'=>$data['edad'],
            'domicilio'=>$data['domicilio'],
            'estatus'=>$estatus
        ]);

        return redirect("/$id");
    }

    public function eliminar($id)
    {
    	DB::table('clientes')
            ->where('id_cliente', $id)
            ->update([
            'estatus'=>3
        ]);

        return redirect("/$id");
    }


}
