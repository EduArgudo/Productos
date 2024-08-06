<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\View\View;
Use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Productos=DB::table('productos')->get();
        return view('Productos.index',['productos'=> $Productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required',
            'precio' => 'required',
            'stock' => 'required|integer',
        ]);

        Productos::create($request->all());

        return redirect()->route('productos.index')
                         ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        return view('productos.show', compact('productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id_producto)
{
    $producto = productos::findOrFail($id_producto);
    return view('productos.edit', compact('producto'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_producto)
    {
        $request->validate([
            'nombre_producto' => 'required',
            'precio' => 'required',
            'stock' => 'required|integer',
        ]);
    
        $producto = Productos::findOrFail($id_producto);
        $producto->update($request->all());
    
        return redirect()->route('productos.index')
                         ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $productos)
    {
        $productos->delete();

        return redirect()->route('productos.index')
                         ->with('success', 'Producto eliminado exitosamente.');
    }
}
