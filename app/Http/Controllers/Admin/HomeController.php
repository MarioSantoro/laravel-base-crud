<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shore;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {


        return view('admin.home');
    }

    public function index()
    {
        $shores = Shore::Paginate(10);

        return view('admin.index', compact('shores'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('has_volley_field')) {
            $request['has_volley_field'] = true;
        } else {
            $request['has_volley_field'] = false;
        }
        ;

        if ($request->has('has_soccer_field')) {
            $request['has_soccer_field'] = true;
        } else {
            $request['has_soccer_field'] = false;
        }
        ;
        $data = $request->validate(
            [
                'name' => ['required', 'min:3', 'unique:shores'],
                'location' => ['required', 'min:5'],
                'beach_umbrella' => ['required', 'integer'],
                'beach_bed' => ['required', 'integer'],
                'daily_price' => ['required', 'decimal:2,4'],
                'opening_date' => ['required', 'date_format:Y-m-d'],
                'closing_date' => ['required', 'date_format:Y-m-d'],
                'has_volley_field' => ['boolean'],
                'has_soccer_field' => ['boolean'],
            ],
            [
                'daily_price.decimal' => 'The price must be in € format (9.99).',
            ]
        );
        $shore = new Shore();
        $shore->fill($data);
        $shore->save();

        return redirect()->route('admin.show', $shore->id)->with('created', $shore->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shore = Shore::findOrFail($id);
        return view('admin.show', compact('shore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shore = Shore::findOrFail($id);
        return view('admin.edit', compact('shore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->has('has_volley_field')) {
            $request['has_volley_field'] = true;
        } else {
            $request['has_volley_field'] = false;
        }
        ;

        if ($request->has('has_soccer_field')) {
            $request['has_soccer_field'] = true;
        } else {
            $request['has_soccer_field'] = false;
        }
        ;

        $data = $request->validate(
            [
                'name' => ['required', 'min:3', Rule::unique('shores')->ignore($id)],
                'location' => ['required', 'min:5'],
                'beach_umbrella' => ['required', 'integer'],
                'beach_bed' => ['required', 'integer'],
                'daily_price' => ['required', 'decimal:2,4'],
                'opening_date' => ['required', 'date_format:Y-m-d'],
                'closing_date' => ['required', 'date_format:Y-m-d'],
                'has_volley_field' => ['boolean'],
                'has_soccer_field' => ['boolean'],
            ],
            [
                'daily_price.decimal' => 'The price must be in € format (9.99).',
            ]
        );
        $newShore = Shore::findOrFail($id);
        $newShore->update($data);

        return redirect()->route('admin.show', $newShore->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shore = Shore::findOrFail($id);
        $shore->delete();

        return redirect()->route('admin.index')->with('deleted', $shore->name);
    }

    public function trashed()
    {
        $shores = Shore::onlyTrashed()->get();
        return view('admin.trashed', compact('shores'));
    }

    public function restore($id)
    {
        $shore = Shore::withTrashed()->findOrFail($id);
        $shore->restore();
        return redirect()->route('admin.index')->with('restored', $shore->name);
    }
}