<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Pago;
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

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show( $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit($pago)
    {
        $registro = Pago::find($pago);

        $categorias = Categoria::get();
        
        return view('gastos.editar')->with('pago', $pago)->with('categorias', $categorias)->with('pago', $registro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pago)
    {
        $registro = Pago::find($pago);

        $registro->gasto = $request->nombre_gasto;
        $registro->descripcion = $request->descripcion;
        $registro->precio = $request->monto;
        $registro->pagado = $request->pagado;
        $registro->fecha = $request->fecha;
        $registro->categoria_id = $request->categoria;
        $registro->user_id = auth()->user()->id;

        $registro->save();

        return redirect()->route('home');
    }
    /**
     * Update de estado pago o no pago
     */
    public function updateEstado($pago)
    {
        $registro = Pago::find($pago);
        $estado;
        
        if ($registro->pagado == 0) {
            $estado = 1;
        }else{
            $estado = 0;
        }

        $registro->pagado = $estado;

        $registro->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy($pago)
    {   
        $registro = Pago::find($pago);

        $registro->delete();

        return redirect()->back();
    }
}
