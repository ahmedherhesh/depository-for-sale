<?php

namespace App\Http\Requests;


class DeliveryRequest extends MasterRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'nullable|exists:users,id',
            'item_id' => 'required|exists:items,id',
            'depot_id' => 'nullable|exists:depositories,id',
            'customer_name' => 'nullable',
            'customer_phone' => 'nullable|numeric',
            'notes' => 'nullable|min:4',
            'price' => 'nullable|numeric|min:1',
            'price_of_sale' => 'nullable|numeric|min:1',
            'status' => 'nullable|in:new,used,expired',
            'qty' => 'required|numeric|gt:0',
        ];
    }
}
