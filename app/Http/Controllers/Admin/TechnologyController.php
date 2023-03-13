<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::paginate(10);
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technologies.create', [ 'technology' => new Technology() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|min:3|unique:technologies,name',
            'color' => 'required'
        ]);
        $data['slug'] = Str::slug($data['name']);
        $technology = new Technology();
        $technology->fill($data);
        $technology->save();
        $technology->slug = $technology->slug . "-$technology->id";
        $technology->update();

        return redirect()->route('admin.technologies.index', compact('technology'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3', Rule::unique('technologies')->ignore($technology->id)],
            'color' => 'required',
        ],
        [
            'name' => 'Inserire un nome',
            'color' => 'Inserire un colore',
        ]);
        $data['slug'] = Str::slug($data['name']."-$technology->id");
        $technology->update($data);
        return redirect()->route('admin.technologies.index', compact('technology'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->posts()->sync([]);
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success-message', "The technology  \"$technology->name\" has been removed correctly")->with('message_class', 'success');
    }
}
