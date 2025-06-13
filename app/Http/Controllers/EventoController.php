<?php

use App\Models\Evento;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::with('proveedor')->get(); // relación cargada
        return view('admin.eventos.index', compact('eventos'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('admin.eventos.create', compact('proveedores'));
    }

    public function store(Request $request)
    {
        $evento = new Evento();
        $evento->nombre = $request->nombre;
        $evento->categoria = $request->categoria;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $request->fecha;
        $evento->ubicacion = $request->ubicacion;
        $evento->id_proveedor = $request->id_proveedor;

        // si hay imagen
        if ($request->hasFile('imagen')) {
            $evento->imagen = $request->file('imagen')->store('eventos', 'public');
        }

        $evento->save();
        return redirect()->route('admin.eventos.index')->with('success', 'Evento registrado');
    }

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        $proveedores = Proveedor::all();
        return view('admin.eventos.edit', compact('evento', 'proveedores'));
    }

    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);
        $evento->update($request->except('_token', '_method'));

        return redirect()->route('admin.eventos.index')->with('success', 'Evento actualizado');
    }

    public function destroy($id)
    {
        Evento::destroy($id);
        return back()->with('success', 'Evento eliminado');
    }
}
