<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request,[
            'name'=>'required|string',
            'website'=>'nullable|string'
        ]);

        Brand::create($validatedData);

        return redirect(route('brands.index'))->with('message',__('lang.Added'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $validatedData = $this->validate($request,[
            'name'=>'required|string',
            'website'=>'nullable|string'
        ]);

        $brand->update($validatedData);

        return redirect(route('brands.index'))->with('message',__('lang.Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect(route('brands.index'))->with('message',__('lang.Deleted'));
    }

    public function products($id){
        $brand = Brand::findOrFail($id);
        $products = $brand->products()->paginate(10);
        return view('brands.products',compact('brand','products'));
    }
}
