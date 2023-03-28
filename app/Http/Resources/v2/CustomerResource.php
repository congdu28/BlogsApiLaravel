<?php

namespace App\Http\Resources\v2;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'name_customer' => $this->name_customer
        ];
    }
}
