<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'id'=> $this->id,
            "paid_amount"=>$this->paid_amount,
            "currency"=> $this->currency,
            "user_email"=> $this->user_email,
            "status"=> $this->getStatus(),
            "payment_date"=> $this->payment_date,
            "parent_identification"=> $this->parent_identification

        ];
    }

    protected function getStatus()
    {
        $statusArray = [
                1 => 'authorized',
                2 => 'decline',
                3 => 'refunded'
        ];

        return $statusArray[$this->status];
    }
}
