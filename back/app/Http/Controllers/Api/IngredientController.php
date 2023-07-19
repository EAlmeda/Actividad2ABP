<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libs\ApiExtensions;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = Ingredient::all();

        $resultResponse = new ResultResponse();

        ApiExtensions::setResultResponse(
            $resultResponse,
            $ingredients,
            ResultResponse::SUCCESS_CODE,
            ResultResponse::TXT_SUCCESS_CODE
        );
        return $ingredients;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateIngredient($request);

        $resultResponse = new ResultResponse();

        try {
            $newIngredient   = new Ingredient([
                'name' => $request->get('name'),
                'quantity' => $request->get('quantity'),
            ]);

            $newIngredient->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $newIngredient,
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
            $ingredient = Ingredient::findOrFail($id);

            ApiExtensions::setResultResponse(
                $resultResponse,
                $ingredient,
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

        $resultResponse = ApiExtensions::findByColumns(Ingredient::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByQuantity($value)
    {
        $columns = ['quantity'];

        $resultResponse = ApiExtensions::findByColumns(Ingredient::class, $columns, $value);

        return response()->json($resultResponse);
    }


    public function findByAllColumns($value)
    {
        $columns = ['name', 'quantity'];

        $resultResponse = ApiExtensions::findByColumns(Ingredient::class, $columns, $value);

        return response()->json($resultResponse);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validateIngredient($request);
        $resultResponse = new ResultResponse();

        try {
            $ingredient = Ingredient::findOrFail($id);

            $ingredient->name = $request->get('name');
            $ingredient->quantity = $request->get('quantity');

            $ingredient->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $ingredient,
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
            $ingredient = Ingredient::findOrFail($id);

            $ingredient->name = $request->get('name', $ingredient->name);
            $ingredient->quantity = $request->get('quantity', $ingredient->quantity);

            $ingredient->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $ingredient,
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
            $ingredient = Ingredient::findOrFail($id);

            $ingredient->delete();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $ingredient,
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
}
