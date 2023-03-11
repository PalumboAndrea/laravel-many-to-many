<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::paginate(10);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create', ['type' => new Type()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Type $type)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|min:3|unique:types,name',
            'color' => 'required'
        ]);
        $data['slug'] = Str::slug($data['name']);
        $type = new Type();
        $type->fill($data);
        $type->save();
        $type->slug = $type->slug . "-$type->id";
        $type->update();

        return redirect()->route('admin.types.index', compact('type'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3', Rule::unique('types')->ignore($type->id)],
            'color' => 'required',
        ],
        [
            'name' => 'Inserire un nome',
            'color' => 'Inserire un colore',
        ]);
        $data['slug'] = Str::slug($data['name']."-$type->id");
        $type->update($data);
        return redirect()->route('admin.types.index', compact('type'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('success-message', "The type  \"$type->name\" has been removed correctly")->with('message_class', 'success');
    }
}