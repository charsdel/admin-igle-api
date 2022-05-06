<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Sede;
use App\Models\Net;
use App\Models\Home;



use Illuminate\Http\Request;
use Validator;

use Carbon\Carbon;


use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Storage;


use App\Http\Resources\V1\MemberResource;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = MemberResource::collection(Member::latest()->paginate());
       // dd('index');

       
        /*$array = [

            'data' => $data,
            'pages' => $pages,
            'totalElements' => $totalElements  

        ];*/
        return  $data;
        //return response()->json($data);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //dd('hola');

        //return $member;
        return new MemberResource($member);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {

        /*$updatedDateFormat =  Carbon::createFromFormat('m-d-Y', $dateTime)->format('Y-m-d');
        print("<pre>".print_r($updatedDateFormat, true)."</pre>");*/

        $input = $request->all();

        //return('bien');
        //dd($input);
        //return response()->json('bien', 200);

        /*
        $validator = Validator::make($input, [
            'nombres' => 'required',
            'apellidos' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }*/
        

        $member->nombres = $input['nombres'];
        $member->profesion = $input['profesion'];
        $member->status = $input['status'];



        $member->direccion = $input['direccion'];
        $member->correo = $input['correo'];
        $member->foto = $input['foto'];

        $member->telefono = $input['telefono'];
        $member->edad = $input['edad'];
        $member->nacionalidad = $input['nacionalidad'];
        $member->estado_civil = $input['estado_civil'];
        $member->sexo = $input['sexo'];
        $member->fecha_nac = $input['fecha_nac'];
        $member->sede = $input['sede'];
        $member->red = $input['red'];
        $member->hvn = $input['hvn'];
        $member->ocupacion = $input['ocupacion'];
        $member->fecha_nac_esp = $input['fecha_nac_esp'];
        $member->iglesia_creyo = $input['iglesia_creyo'];
        $member->bautizado = $input['bautizado'];
        //uso de carbon para convertir la fecha del formato  m/d/Y que envial el front a Y-m-d aceptado por la bd
        $member->fecha_bautizo = $input['fecha_bautizo'];
        $member->iglesia_bautizo_agua = $input['iglesia_bautizo_agua'];

        $member->discipulado_aprobado = $input['discipulado_aprobado'];
        $member->fecha_aprob_discipulado = $input['fecha_aprob_discipulado'];
        $member->responsable_discipulado = $input['responsable_discipulado'];

        $member->area_servicio_pasado = $input['area_servicio_pasado'];
        $member->area_servicio_actual = $input['area_servicio_actual'];


        $member->save();

        return response()->json($member, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return response()->json(null, 204);
    }



    public function search(String $search)
    {
       // dd($search);

        $data = Member::selectRaw(" *, MATCH (nombres, apellidos) AGAINST ('$search') AS puntuacion")
          ->whereRaw("MATCH (nombres, apellidos) AGAINST ('$search')")->get();
        $dataResouce = MemberResource::collection($data);
       
        return $dataResouce;
    }

    public function statictis()
    {
        $members = Member::all();

       
        $miembros = $members->count();
        $stats1 = $members->where('created_at', '<', now()->subDays(30))->count();
        $stats2 = $members->where('created_at', '>=', now()->subDays(30))->first()
        ->count();

        if($stats1 !=0 and $stats2 !=0)
        {
            $total = (( $stats1 - $stats2)/$stats2)*100;

        }else{

            $total = 0;
        }


        $hombres = $members->where('sexo', 'm')->count();
        $mujeres = $members->where('sexo', 'f')->count();
        $activos = $members->where('status', 'activo')->count();
        $inactivos = $members->where('status', 'inactivos')->count();
        /*
        $stats = User::query()
  ->select('id')
  ->addSelect(['last_30' => User::selectRaw('count(*) as total')
              	->whereDate('created_at', '<', now()->subDays(30))])
  ->addSelect(['new_users' => User::selectRaw('count(*) as total')
              	->whereDate('created_at', '>=', now()->subDays(30))])
  ->first();

$total = ($stats->new_users - $stats->last_30) / $stats->last_30;*/



        $array = [

            'miembros' => $stats2,
            'porcentaje' => ceil($total),
            'hombres' => $hombres,
            'mujeres' => $mujeres,
            'activos' => $activos,  
            'inactivos' => $inactivos  

        ];  
       
        return response()->json($array, 200);

        //return $dataResouce;
    }


    public function getSedesNetsHomes()
    {

        $sedes = Sede::all();
        $nets = Net::all();
        $homes = Home::all();

        $array = [

            'sedes' => $sedes,
            'nets' => $nets,
            'homes' => $homes,
          
        ]; 
       
        return response()->json($array, 200);
    }


    //esto debe pasarse a un proyecto de laravel a parte porque es un snipet para subir imagenes en php    
    public function saveImage()
    {
        
        #$target_dir = "C:/xampp/htdocs/admin-igle-api/uploads/"; //image upload folder name
        $target_dir = "C:/Users/cd/Documents/ANGULAR/front-adminigle/src/assets/img/users-picture/"; //image upload folder name

        
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        
        
       //moving multiple images inside folder
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $data = array("data" => $target_dir.$_FILES["image"]["name"]);
            //print json_encode($data);
        }else{
            $data = array("data" => "ERROR");

        }
       
        return response()->json($target_file, 200);
    }
}
