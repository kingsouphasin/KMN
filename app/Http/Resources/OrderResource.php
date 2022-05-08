<?php

namespace App\Http\Resources;

use Attribute;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'type' => 'order',
            'attributes' => [
                'user_id' => $this->user_id,
                'recipient_id' => $this->recipient_id,
                'original_branch' => $this->original_branch,
                'destination_branch' => $this->destination_branch ,
                'order_date' => $this->order_date,
                'order_month' => $this->order_month,
                'order_year' => $this->order_year,
                'status' => $this->status,
                'order_item' => Order_itemsResource::collection($this->item)
            ], 
        ];
    }
}
