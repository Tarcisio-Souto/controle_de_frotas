<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public static function getUser($id) {

        $user = User::all()->find($id);
        return $user;

    }

    public static function getCargos() {

        $cargos = DB::table('cargos')->get();
        return $cargos;

    }
    
    public static function getEmpresas() {

        $empresas = DB::table('empresas')->get();
        return $empresas;

    }

    public static function listarColaboradores() {

        //$colabs = DB::table('users')->get();
        //return $colabs;

        $colabs = DB::table('users as us')
        ->join('cargos as cg','us.fk_cargo', '=', 'cg.id')
        ->join('empresas as emp', 'us.fk_empresa', '=', 'emp.id')
        ->join('enderecos as end', 'us.fk_endereco', '=',  'end.id')
        ->select('end.*', 'us.*', 'emp.*', 'cg.*',
        'emp.id as emp.emp_id', 'us.id as us_id', 'end.id as end_id', 'cg.id as cg_id',
        'emp.nome as nome_emp', 'us.nome as nome_colab', 'cg.nome as nome_cg')
        ->get();

        return $colabs;

    }

    public static function showUser($id) {

        $colab = DB::table('users as us')
        ->join('cargos as cg','us.fk_cargo', '=', 'cg.id')
        ->join('empresas as emp', 'us.fk_empresa', '=', 'emp.id')
        ->join('enderecos as end', 'us.fk_endereco', '=',  'end.id')
        ->select('end.*', 'us.*', 'emp.*', 'cg.*',
        'emp.id as emp_id', 'us.id as us_id', 'end.id as end_id', 'cg.id as cg_id',
        'emp.nome as nome_emp', 'us.nome as nome_colab', 'cg.nome as nome_cg',
        DB::raw('strftime("%d/%m/%Y", us.dt_admissao) as dt_adm_format'))
        ->where('us.id', '=', $id)
        ->get();

        //DB::raw('DATE_FORMAT(cust.cust_dob, "%d-%b-%Y") as formatted_dob')

        return $colab;

    }

    public static function deleteUser($id) {

        $colab = DB::table('users')->delete($id);
        return $colab;

    }


    public static function getEndereco($id) {

        $endereco = DB::table('users')
        ->join('enderecos', 'id', 'fk_endereco')
        ->select('*')
        ->where('fk_endereco', '=', $id)
        ->get();

        return $endereco;

    }


}
