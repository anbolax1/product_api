<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::query();

        if ($request->has('name')) {
            $query->where('name', $request->name);
        }

        return response()->json($query->paginate(50));
    }

    public function create(Request $request)
    {
        $data = $request->data;

        if(!is_array(reset($data))) {
            $data = [$data];
        }

        $properties = [];
        foreach ($data as $item) {
            if (isset($item['name']) && isset($item['value'])) {
                $property = Property::firstOrCreate(
                    ['name' => $item['name'], 'value' => $item['value']],
                );

                $properties[] = $property;
            }
        }

        return response()->json($properties);
    }
}
