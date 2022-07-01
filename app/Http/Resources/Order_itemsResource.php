<?php

namespace App\Http\Resources;

use Attribute;
use Illuminate\Http\Resources\Json\JsonResource;

class Order_itemsResource extends JsonResource
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
            'id' => $this->id,
            'type' => 'Order_items',
            'attribute' => [
                'parcel_name' => $this->parcel_name,
                'width_heigth' => $this->width_height,
                'weight' => $this->weight,
                'order_id' => $this->order_id,
                'category_id' => $this->category_id,
            ],
        ];
    }
}
