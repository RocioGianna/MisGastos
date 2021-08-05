<?php

namespace App\Http\Controllers;

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
        $user = auth()->user();
     
        $pagos = Pago::join("categorias", "pagos.categoria_id", "=", "categorias.id")->select("categorias.nombre", "pagos.*")->where('user_id', auth()->user()->id)->whereMonth('fecha', '8')->get(); 
        
        //dd($pagos);
        return view('gastos.index')->with('pagos', $pagos);
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
        $pago->categoria = $request->categoria;

        $pago->save();

        return redirect()->route('home');
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
        return view('gastos.editar')->with('pago', $pago);
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
        //
    }
}
