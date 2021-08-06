<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\pago;
use App\Models\user;
use App\Models\Categoria;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $pagos = Pago::join("categorias", "pagos.categoria_id", "=", "categorias.id")
                            ->select("categorias.nombre", "pagos.*")
                            ->where('user_id', auth()->user()->id)
                            ->orderBy('pagos.fecha')
                            ->get();
                            
        $total = Pago::where('user_id', auth()->user()->id)
                            ->sum('precio');    
        
        return view('gastos.index')->with('pagos', $pagos)->with('total', $total);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::get();

        return view('gastos.crear')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pago = new Pago();
        
        $pago->gasto = $request->nombre_gasto;
        $pago->descripcion = $request->descripcion;
        $pago->precio = $request->monto;
        $pago->pagado = $request->pagado;
        $pago->fecha = $request->fecha;
        $pago->categoria_id = $request->categoria;
        $pago->user_id = auth()->user()->id;

        $pago->save();

        return redirect()->route('pagos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(pago $pago)
    {
        $categorias = Categoria::get();
        
        return view('gastos.editar')->with('pago', $pago)->with('categorias', $categorias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(pago $pago)
    {   
        $pago->delete();

        return redirect()->back();
    }
}
