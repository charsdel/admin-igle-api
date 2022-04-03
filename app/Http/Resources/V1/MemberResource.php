<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

       
        return [
            
            //informacion principal para mostrar en tabla de resultados
            'memberId' => $this->id,
            'name' => $this->nombres,
            'last_name' => $this->apellidos,
            'born' => $this->fecha_nac,
            'adress' => $this->direccion,
            'status' => $this->status,

            //informacion secundaria para mostrar en vista detalle
            'nationalId' => $this->cedula,
            'gender' => $this->sexo,
            'age' => $this->edad,
            'civilStatus' => $this->estado_civil,
            'profession' => $this->profesion,
            'nationality' => $this->nacionalidad,
            'phoneNumber' => $this->telefono,
            'mail' => $this->correo,
            'pictureProfile'=> $this->foto,
            'churchBorn'=> $this->iglesia_creyo,
            'spiritualBirthDate'=> $this->fecha_nac_esp,
            'christeningDate'=> $this->fecha_bautizo,
            'churchWaterChristening'=> $this->iglesia_bautizo_agua,
            'dicipulateApprovalDate'=> $this->fecha_aprob_discipulado,
            'discipleshipTeacher'=> $this->responsable_discipulado,
            'pastServiceArea'=> $this->area_servicio_pasado,
            'currentServiceArea'=> $this->area_servicio_actual,
            'sedeId'=> $this->sede_id,
            'sedeName'=> $this->sede,
            'netId'=> $this->red_id,
            'netName'=> $this->red,
            'homeId'=> $this->home_id,
            'homeName'=> $this->hvn,
            'occupation'=> $this->ocupacion,
            //'status'=> $this->status,
            'discipleshipClass'=> $this->clase_discipulado,
            'approvedDiscipleship' => $this->discipulado_aprobado,
            'baptized' => $this->bautizado

            //falta la igesia donde se bautizo




        ];
    }
}
