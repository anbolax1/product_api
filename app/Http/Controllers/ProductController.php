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
                    $q->where('name', $property)
                        ->whereIn('value', (array) $values);
                });
            }
        }

        return response()->json($query->paginate(40));
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|between:0,999999.99',
                'quantity' => 'required|integer',
                'properties' => 'array',
                'properties.*' => 'exists:properties,id',
            ]);

            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ]);

            if ($request->has('properties')) {
                $product->properties()->attach($request->properties);
            }

            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
