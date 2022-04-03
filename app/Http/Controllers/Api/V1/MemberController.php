<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Validator;


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
        


        $member->direccion = $input['direccion'];
        $member->correo = $input['correo'];
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
        $member->fecha_bautizo = $input['fecha_bautizo'];
        $member->iglesia_bautizo_agua = $input['iglesia_bautizo_agua'];

        //$member->discipulado_aprobado = $input['discipulado_aprobado'];
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
}
