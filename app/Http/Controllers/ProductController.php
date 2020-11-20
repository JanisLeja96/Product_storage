<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Models\Product;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Product as ProductResource;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        return view('product.index', [
            'products' => Product::all()
        ]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(StoreProduct $request)
    {
        $product = new Product();
        $product->fill($request->only('name', 'amount'));
        $product->price = $request->get('price') * 100; // Convert to cents
        $product->save();
        return redirect('/products');
    }

    public function show(Product $product)
    {
        return view('product.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        return view('product.edit', [
            'product' => $product
        ]);
    }


    public function update(UpdateProduct $request, Product $product)
    {
        if ($product->exists) {
            $data = $request->only('name', 'amount', 'price');

            $product->name = $data['name'];
            $product->amount = $data['amount'];
            $product->price = $data['price'] * 100; // Convert to cents

            $product->save();
            return redirect('/products/' . $product->id);
        }
        return abort(404);
    }


    public function destroy(Product $product)
    {
        try {
            $this->authorize('delete', $product);
        } catch (AuthorizationException $e) {
            return redirect()->back()->with('error', 'You are not authorized to delete entries');
        }

        if ($product->exists) {
            $product->delete();
            return redirect('/products');
        }
        return abort(404);
    }

    // These two functions below are used for API

    public function fetchAll()
    {
        return new ProductCollection(Product::all());
    }

    public function fetch($id)
    {
        try {
            $product = Product::findOrFail($id);
            return new ProductResource($product);
        } catch (ModelNotFoundException $e) {
            return response('Product not found', '404');
        }
    }
}
