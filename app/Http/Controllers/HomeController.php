<?php

namespace App\Http\Controllers;

use App\Models\pago;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todayDate = Carbon::today();
        $month = $todayDate->month;
        $year  = $todayDate->year;

        $totalMes = Pago::where('user_id', auth()->user()->id)
                            ->whereMonth('fecha', $month)
                            ->sum('precio');    
      
        $pagos = Pago::join("categorias", "pagos.categoria_id", "=", "categorias.id")
                            ->select("categorias.nombre", "pagos.*")
                            ->where('user_id', auth()->user()->id)
                            ->whereMonth('fecha', $month)
                            ->get(); 

        return view('home')->with('pagos', $pagos)->with('totalMes', $totalMes)->with('month', $month)->with('year', $year);
    }
}
