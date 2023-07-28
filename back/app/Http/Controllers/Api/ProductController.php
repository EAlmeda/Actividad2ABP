<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libs\ApiExtensions;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(8);

        $resultResponse = new ResultResponse();

        ApiExtensions::setResultResponse(
            $resultResponse,
            $products,
            ResultResponse::SUCCESS_CODE,
            ResultResponse::TXT_SUCCESS_CODE
        );
        return $products;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $this->validateProduct($request);

            $newProduct   = new Product([
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'available' => $request->get('available'),
                'recipe' => $request->get('recipe'),
                'image_path' => $request->get('image_path'),
                'description' => $request->get('description'),
                'type' => $request->get('type'),
            ]);

            $newProduct->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $newProduct,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_CODE,
                ResultResponse::TXT_ERROR_CODE
            );
        }


        return response()->json($resultResponse);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $resultResponse = new ResultResponse();

        try {
            $product = Product::
            with('ingredients')->
            with('allergens')->
            with('onlineOrders')->
            with('kitchenOrders')->
            findOrFail($id);

            ApiExtensions::setResultResponse(
                $resultResponse,
                $product,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }

        return response()->json($resultResponse);
    }

    public function findByName($value)
    {
        $columns = ['name'];

        $resultResponse = ApiExtensions::findByColumns(Product::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByPrice($value)
    {
        $columns = ['price'];

        $resultResponse = ApiExtensions::findByColumns(Product::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByAvailable($value)
    {
        $columns = ['available'];

        $resultResponse = ApiExtensions::findByColumns(Product::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByRecipe($value)
    {
        $columns = ['recipe'];

        $resultResponse = ApiExtensions::findByColumns(Product::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByImagePath($value)
    {
        $columns = ['image_path'];

        $resultResponse = ApiExtensions::findByColumns(Product::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByDescription($value)
    {
        $columns = ['description'];

        $resultResponse = ApiExtensions::findByColumns(Product::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByType($value)
    {
        $columns = ['type'];

        $resultResponse = ApiExtensions::findByColumns(Product::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByAllColumns($value)
    {
        $columns = ['name', 'price', 'available', 'recipe', 'image_path', 'description', 'type'];

        $resultResponse = ApiExtensions::findByColumns(Product::class, $columns, $value);

        return response()->json($resultResponse);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $resultResponse = new ResultResponse();

        try {
            $this->validateProduct($request);

            $product = Product::findOrFail($id);

            $product->name = $request->get('name');
            $product->price = $request->get('price');
            $product->available = $request->get('available');
            $product->recipe = $request->get('recipe');
            $product->image_path = $request->get('image_path');
            $product->description = $request->get('description');
            $product->type = $request->get('type');

            $product->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $product,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }

        return response()->json($resultResponse);
    }

    public function patch(Request $request, $id)
    {
        $resultResponse = new ResultResponse();

        try {
            $this->validateProduct($request);

            $product = Product::findOrFail($id);

            $product->name = $request->get('name', $product->title);
            $product->price = $request->get('price', $product->price);
            $product->available = $request->get('available', $product->available);
            $product->recipe = $request->get('recipe', $product->recipe);
            $product->image_path = $request->get('image_path', $product->image_path);
            $product->description = $request->get('description', $product->description);
            $product->type = $request->get('type', $product->type);

            $product->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $product,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }

        return response()->json($resultResponse);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $resultResponse = new ResultResponse();

        try {
            $product = Product::findOrFail($id);

            $product->delete();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $product,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }
        return response()->json($resultResponse);
    }

    private function validateProduct($request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:App\Models\Product,name|max:200',
            'price' => 'required|between:0,999.99',
            'available' => 'required|boolean',
            'recipe' => 'max:1500',
            'image_path' => 'required|max:200',
            'description' => 'required|max:1000',
            'type' => 'required|max:50'
        ]);
    }

}
