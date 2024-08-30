<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('properties');

        if ($request->has('properties')) {
            foreach ($request->input('properties') as $property => $values) {
                $query->whereHas('properties', function ($q) use ($property, $values) {
                    $q->where('property_name', $property)
                        ->whereIn('property_value', (array) $values);
                });
            }
        }

        return response()->json($query->paginate(40));
    }
}
