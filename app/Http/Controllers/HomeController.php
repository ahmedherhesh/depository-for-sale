<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Delivery;
use App\Models\Item;
use App\Models\ItemReturn;
use Illuminate\Http\Request;

class HomeController extends MasterController
{
    function profits($deliveries){
        $profits = 0;
        foreach($deliveries->get() as $delivery){
            $returnedQty = 0;
            foreach($delivery->itemReturn as $itemReturn){
                $returnedQty += $itemReturn->qty;
            }
            $profits += ($delivery->price_of_sale - $delivery->price) * ($delivery->qty - $returnedQty);
        }
        return $profits;

    }

    function index()
    {
        $items = Item::enabled();
        $items_count = $items;
        $deliveries = Delivery::query();
        $returned_items = ItemReturn::query();
        
        if (!$this->isAdmin()) {
            $items_count = $items_count->allowed();
            $deliveries = $deliveries->allowed();
            $returned_items = $returned_items->allowed();
        }

        //deliveries
        $month_deliveries = $deliveries->whereMonth('created_at',date('m'));
        $three_month_deliveries = $deliveries->whereMonth('created_at','>', date('m',strtotime('-3months')));
        $six_month_deliveries   = $deliveries->whereMonth('created_at','>', date('m',strtotime('-6months')));
        $year_deliveries = $deliveries->whereYear('created_at',date('Y'));

        //profits
        $month_profits =  $this->profits($month_deliveries);
        $three_months_profits = $this->profits($three_month_deliveries);
        $six_months_profits = $this->profits($six_month_deliveries);
        $year_profits = $this->profits($year_deliveries);
        
        $items = $items->paginate(20);
        $items_count = $items_count->count();
        $deliveries_count = $deliveries->count();
        $returned_items_count = $returned_items->count();
        return view('welcome', compact('items', 'items_count', 'deliveries_count', 'returned_items_count','month_profits','three_months_profits','six_months_profits','year_profits'));
    }
}
