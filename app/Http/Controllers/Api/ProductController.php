<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductService;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\StoreProductImagesRequest;
use Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $products = $this->productService->getAllProducts($request->all());
        return response()->json($products);
    }

    public function show(Product $product)
    {
        $product = $this->productService->getProduct($product);
        return response()->json($product);
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->createProduct($request->validated());
        return response()->json($product, 201);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product = $this->productService->updateProduct($product, $request->validated());
        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $this->productService->deleteProduct($product);
        return response()->json(['message' => 'Product deleted successfully']);
    }

    public function storeImage(StoreProductImagesRequest $request, Product $product)
    {
        foreach ($request->file('images') as $image) {
            $path = $image->store('public/products');
            $product->images()->create(['path' => $path]);
        }

        return response()->json(['message' => 'Images uploaded successfully']);
    }
}

