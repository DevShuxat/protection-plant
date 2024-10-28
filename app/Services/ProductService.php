<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
  public function createProduct(array $data)
  {
    return Product::create($data);
  }

  public function updateProduct(Product $product, array $data)
  {
    $product->update($data);
    return $product;
  }

  public function deleteProduct(Product $product)
  {
    return $product->delete();
  }

  public function getAllProducts($request)
  {

    $query = Product::with('images', 'category');

    if ($request['search']) {
      $query->where('name', 'ilike', '%' . $request['search'] . '%');
    }

    if ($request['category_id']) {
      $query->where('category_id', $request['category_id']);
    }

    $products = $query->get();
    return $products;
  }

  public function getProduct(Product $product)
  {
    // Bitta mahsulotni olish
    return $product->load('images', 'category');
  }
}
