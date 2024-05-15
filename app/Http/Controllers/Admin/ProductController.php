<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private Product $product)
    {
    }

    public function index()
    {
        $products = $this->product->paginate(10);
        return view('admin.products.index', compact('products')); // php.net/compact | php.net/extract
    }

    public function create(Store $store, Category $category)
    {
        $stores = $store->all(['id', 'name']);
        $categories = $category->all(['id', 'name']);

        return view('admin.products.create', compact('stores', 'categories'));
    }

    public function store(ProductFormRequest $request, Store $store)
    {
        $store = auth()->user()->store;
        $product = $store->products()->create($request->except('store', 'categories'));

        if ($request->categories) $product->categories()->sync($request->categories);

        // $data = $request->all();
        // $data['store_id'] = $data['store'];
        //$this->product->create($data)

        // $product = $this->product->create($data);
        // $product->store()->associate($store->findOrFail($request->store));
        // $product->save();

        return redirect()->route('admin.products.index');
    }

    public function edit(string $product, Store $store, Category $category)
    {
        $stores = $store->all(['id', 'name']);
        $categories = $category->all(['id', 'name']);

        $product = $this->product->findOrFail($product);

        return view('admin.products.edit', compact('product', 'stores', 'categories'));
    }

    public function update(string $product, ProductFormRequest $request)
    {
        $product = $this->product->findOrFail($product);

        $product->update($request->except('categories'));

        $product->categories()->sync($request->categories);

        return redirect()->back();
    }

    public function destroy(string $store)
    {
        $store = $this->product->findOrFail($store);
        $store->delete();

        return redirect()->back();
    }
}
