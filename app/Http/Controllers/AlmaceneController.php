<?php

namespace App\Http\Controllers;

use App\Models\Almacene;
use App\Http\Requests\AlmaceneRequest;

/**
 * Class AlmaceneController
 * @package App\Http\Controllers
 */
class AlmaceneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $almacenes = Almacene::paginate();

        return view('almacene.index', compact('almacenes'))
            ->with('i', (request()->input('page', 1) - 1) * $almacenes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $almacene = new Almacene();
        return view('almacene.create', compact('almacene'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlmaceneRequest $request)
    {
        Almacene::create($request->validated());

        return redirect()->route('almacenes.index')
            ->with('success', 'Almacene created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $almacene = Almacene::find($id);

        return view('almacene.show', compact('almacene'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $almacene = Almacene::find($id);

        return view('almacene.edit', compact('almacene'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlmaceneRequest $request, Almacene $almacene)
    {
        $almacene->update($request->validated());

        return redirect()->route('almacenes.index')
            ->with('success', 'Almacene updated successfully');
    }

    public function destroy($id)
    {
        Almacene::find($id)->delete();

        return redirect()->route('almacenes.index')
            ->with('success', 'Almacene deleted successfully');
    }
}
