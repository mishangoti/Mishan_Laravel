<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'data' => [
        //         'id' => $this->id,
        //         'name' => $this->name,
        //         'email' => $this->email,
        //         'email_verified_At' => $this->email_verified_at,
        //         'phone_no' => $this->phone_no,
        //         'address' => $this->address,
        //         'city' => $this->city,
        //         'state' => $this->state,
        //         'zip_code' => $this->zip_code,
        //         'admin' => $this->admin,
        //     ],
        // ];
    }

    public function with($request)
    {
        return [
            'message' => 'success',
            'code' => '200  ',
        ];
    }  
}
