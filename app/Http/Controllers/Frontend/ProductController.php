<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest('id')->paginate(10);
        $products->setPath('');
        return Inertia::render('Frontend/Products/Index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $products = Product::take(5)->get();
        return Inertia::render('Frontend/Products/Create', [
            'products' => $products,
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());
        return redirect()->route('products.index')->with('message', 'Producto registrado correctamente');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return Inertia::render('Frontend/Products/Show', [
            'product' => $product,
        ]);
    }

    public function search(Request $request)
    {

        $search = $request->search;
        $products = Product::query()
        ->where('name', `%${search}%`)
        ->orWhere('price', `%${search}%`)
        ->get();
        return Inertia::render('Frontend/Products/Index', [
            'products' => $products
        ]);

    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrfail($id);
        $product->update($request->validated());
        return redirect()->route('products.show', $product->id)->with('message', 'Producto actualizado');
    }

    public function delete($id)
    {
        $product = Product::findOrfail($id);
        $product->delete();
        return redirect()->route('products.index')->with('message', 'Producto eliminado correctamente');
    }
}
