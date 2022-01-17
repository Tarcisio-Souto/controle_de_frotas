<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Cargo;
use App\Models\Cargos;
use App\Models\Enderecos;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function create(){

        $user = new User();
        $cargos = $user::getCargos();
        $empresas = $user::getEmpresas();        

        return Inertia::render('Users/AddUser.vue', ['empresas' => $empresas, 'cargos' => $cargos]);

    }

    public function store(Request $req) {
       
        
        $msg1 = '';
        $msg2 = '';
        $msg3 = '';
        $msg4 = '';

        if (strlen($req->nome) <= 5) {
            $msg1 = "Informe um nome válido";    
        }        

        if (strlen($req->cpf) < 11) {
            $msg2 = "Informe um CPF válido";
        }

        if (intval($req->idade) < 0) {
            $msg3 = "Informe uma idade válida";
        }

        if ($req->senha != $req->confirm_senha) {
            $msg4 = "As senhas não são iguais";
        }

        if ($msg1 != '' || $msg2 != '' || $msg3 != '' || $msg4 != '') {

            $arr_err = Array(

                'nome' => $msg1,
                'cpf' => $msg2,
                'idade' => $msg3,
                'senha' => $msg4                
    
            );

        }        

        if (isset($arr_err)) {

            return Redirect::route('colaborador.cadastro')->withErrors($arr_err);

        } else {


            $address = new Enderecos();
            $address->bairro = $req->bairro;
            $address->cep = $req->cep;
            $address->cidade = $req->cidade;
            $address->logradouro = $req->logradouro;
            $address->numero = $req->numero;
            $address->uf = $req->estado;
            $address->save();

            # Obter o ID do último registro da tabela:
            $fk_address = DB::getPdo()->lastInsertId();

            $user = new User();


            //$user->src_foto = $req->foto;
            $user->nome = $req->nome;
            $user->email = $req->email_part;
            $user->senha = Hash::make($req->senha);
            $user->celular = $req->celular;
            $user->cpf = $req->cpf;


            $data = explode("/",$req->data_adm);
            $dia = $data[0];
            $mes = $data[1];
            $ano = $data[2];            
            $data_formatada = $ano.'-'.$mes.'-'.$dia;

            $data_old = date($data_formatada);
            $user->dt_admissao = $data_old;


            $user->email_inst = $req->email_inst;
            $user->tel_recado = $req->tel_rec;
            $user->sexo = $req->sexo;
            $user->idade = $req->idade;           
            $user->fk_cargo = $req->cargo;
            $user->fk_empresa = $req->empresa;
            $user->fk_endereco = $fk_address;
            
            $user->save();

            return Redirect::route('colaborador.cadastro')->with('success', 'Colaborador registrado com sucesso!');            

        }
        
        
    }


    public function listarUsuarios() {

        $colabs = User::listarColaboradores();

        return Inertia::render('Users/ListAllUsers.vue', ['colabs' => $colabs]);
        
    }


    public function show($id) {

        $colab = User::showUser($id);

        return Inertia::render('Users/ViewUser.vue', ['colab' => $colab]);

    }

    public function edit($id) {

        $colab = User::showUser($id);

        $cargos = User::getCargos();
        $empresas = User::getEmpresas();  

        return Inertia::render('Users/EditUser.vue', ['colab' => $colab, 'cargos' => $cargos, 'empresas' => $empresas]);

    } 

    public function update(Request $req) {

        $user = User::find($req->id);

        $msg1 = '';
        $msg2 = '';
        $msg3 = '';

        if (strlen($req->nome) <= 5) {
            $msg1 = "Informe um nome válido";    
        }        

        if (strlen($req->cpf) < 11) {
            $msg2 = "Informe um CPF válido";
        }

        if (intval($req->idade) < 0) {
            $msg3 = "Informe uma idade válida";
        }

        if ($msg1 != '' || $msg2 != '' || $msg3 != '') {

            $arr_err = Array(

                'nome' => $msg1,
                'cpf' => $msg2,
                'idade' => $msg3              
    
            );

        }        

        if (isset($arr_err)) {

            return Redirect::route('colaborador.editar', [$user->id_usuario])->withErrors($arr_err);

        } else {

            
            $address = Enderecos::all()->find($user->fk_endereco);

            $address->bairro = $req->bairro;
            $address->cep = $req->cep;
            $address->cidade = $req->cidade;
            $address->logradouro = $req->logradouro;
            $address->numero = $req->numero;
            $address->uf = $req->estado;
            $address->save();

            # Obter o ID do último registro da tabela:
            $fk_address = $address->id;

            $user->nome = $req->nome;
            $user->email = $req->email_part;
            //$user->senha = Hash::make($req->senha);
            $user->celular = $req->celular;
            $user->cpf = $req->cpf;


            $data = explode("/",$req->data_adm);
            $dia = $data[0];
            $mes = $data[1];
            $ano = $data[2];            
            $data_formatada = $ano.'-'.$mes.'-'.$dia;

            $data_old = date($data_formatada);
            $user->dt_admissao = $data_old;

            
            $user->email_inst = $req->email_inst;
            $user->tel_recado = $req->tel_recado;
            $user->sexo = $req->sexo;
            $user->idade = $req->idade;
            
            $cargo = Cargos::where('nome', '=', $req->cargo)->first();

            $user->fk_cargo = $cargo->id;
            $user->fk_empresa = 1;
            $user->fk_endereco = $fk_address;
            
            $user->save();

            $colabs = $user::listarColaboradores();
            return Inertia::render('Users/ListAllUsers.vue', ['colabs' => $colabs])->with('success', 'Atualizações registradas com sucesso!');          

        }
        

    }


    public function destroy($id) {

        $user = new User();
        $user::deleteUser($id);

        $colabs = $user::listarColaboradores();
        return Inertia::render('Users/ListAllUsers.vue', ['colabs' => $colabs]);

    }



    /* API */

    public function listUsers() {

        return User::all();

    }



}
