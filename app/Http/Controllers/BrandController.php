<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Resources\BrandResource;
use Hossam\Licht\Controllers\LichtBaseController;

class BrandController extends LichtBaseController
{

    public function index()
    {
        $brands = Brand::all();
        $brands = BrandResource::collection($brands);
        return view('brands', compact('brands'));
    }

    public function store(StoreBrandRequest $request)
    {
        $brand = Brand::create($request->validated());
        return redirect()->route('brands.index');
    }

    public function show(Brand $brand)
    {
        return $this->successResponse(BrandResource::make($brand));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update($request->validated());
        return redirect()->route('brands.index');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
