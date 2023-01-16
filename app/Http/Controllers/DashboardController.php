<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class DashboardController extends Controller
{
    public function index()
    {
        return view('home', [
            "total_menus" => Menu::all()->count(),
            'total_sales' => Menu::select(Menu::raw('SUM(price) as total_sales'))->whereDate('created_at', NOW()->toDateString())->get()
        ]);
    }
}
