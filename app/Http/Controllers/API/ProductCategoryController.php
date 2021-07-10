<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $show_product = $request->input('show_product');


        if ($id) {
            $categories = ProductCategory::with(['products'])->find($id);

            if ($categories) {
                return ResponseFormatter::success(
                    $categories,
                    'Data kategori berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(null, 'Data kategori Tidak ada', 404);
            }
        }

        $categories = ProductCategory::query();

        if ($name) {
            $categories->where('name', 'like', '%' . $name . '%');
        }

        if ($show_product) {
            $categories->with('products');
        }

        return ResponseFormatter::success(
            $categories->paginate($limit),
            'Data kategori berhasil diambil'
        );
    }
}
