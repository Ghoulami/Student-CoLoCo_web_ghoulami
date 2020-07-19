<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\Console\Helper\Helper as HelperHelper;

class OfferResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->property_name,
            'adresse' => $this->adresse,
            'capacite' => $this->capacity,
            'superficie' => $this->area,
            'posted_at' => $this->add_date,
            'phone_number' => $this->telephone,
            'prix' => $this->property_price,
            'imgPath' => $this->imgPath,
        ];
    }
}
