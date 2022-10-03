<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeEditRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    function __construct() {
        //$this-> middleware('logged', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
        $this-> middleware('logged', ['except' => ['index', 'show']]);        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all()->sortBy('nombre');
        return view('type.index', ['activeTipo' => 'active',
                                        'types' => $types,
                                        'subTitle' => 'Type list',
                                        'title' => 'Type',]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create', ['activeTipo' => 'active',
                                        'subTitle' => 'Add type',
                                        'title' => 'Type',]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|min:2|max:100',
            'descripcion' => 'required|min:2',
        ];
        $messages = [
            'nombre.max'      => 'name is too long',
            'nombre.min'      => 'name is too short',
            'nombre.required' => 'name is required',
            'descripcion.min'      => 'descripcion is too short',
            'descripcion.required' => 'descripcion is required',
        ];
        $validator = Validator::make($request->all() ,$rules, $messages);
        if ($validator->fails()) {
            return back()
                    ->withInput()
                    ->withErrors($validator);
        }
        $type = new Type($request->all());
        try {
            $type->save();
            $message = 'The type has been inserted with id number: ' . $type->id;
        } catch(\Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['store' => 'An unexpected error occurred while inserting.']);
        }
        return redirect('type')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('type.show', ['activeTipo' => 'active',
                                        'tipo' => $type,
                                        'subTitle' => 'Show type',
                                        'title' => 'Type',]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('type.edit', ['activeTipo' => 'active',
                                        'tipo' => $type,
                                        'subTitle' => 'Edit type',
                                        'title' => 'Type',]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(TypeEditRequest $request, Type $type)
    {
        try {
            $type->update($request->all());
            //$type->fill($request->all());
            //$type->save();
            $message = 'The type has been updated.';
        } catch(Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['update' => 'An unexpected error occurred while updating.']);
        }
        return redirect('type')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        try {
            $type->delete();
            $message = 'The type ' . $type->nombre . ' has been removed.';
        } catch(\Exception $e) {
            $message = 'The type ' . $type->nombre . ' has not been removed.';
        }
        return redirect('type')->with('message', $message);
    }
}
