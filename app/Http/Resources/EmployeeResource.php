<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'emp_name'=>$this->emp_name,
            'department'=>$this->department,
            'dep_id'=>$this->dep_id,
            'shift'=>$this->shift,
            'salary'=>$this->salary
        ];
    }
}
