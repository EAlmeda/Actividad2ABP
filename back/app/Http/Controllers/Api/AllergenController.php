<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libs\ApiExtensions;
use App\Models\Allergen;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;
use Illuminate\Support\Facades\Log;

class AllergenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allergens = Allergen::all();

        $resultResponse = new ResultResponse();

        ApiExtensions::setResultResponse(
            $resultResponse,
            $allergens,
            ResultResponse::SUCCESS_CODE,
            ResultResponse::TXT_SUCCESS_CODE
        );
        return $allergens;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validateAllergen($request);

        $resultResponse = new ResultResponse();

        try {
            $newAllergen   = new Allergen([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'icon_name' => $request->get('icon_name'),
                'risk' => $request->get('risk'),
            ]);

            $newAllergen->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $newAllergen,
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
            $allergen = Allergen::with('ingredients')->findOrFail($id);

            ApiExtensions::setResultResponse(
                $resultResponse,
                $allergen,
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

        $resultResponse = ApiExtensions::findByColumns(Allergen::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByDescription($value)
    {
        $columns = ['description'];

        $resultResponse = ApiExtensions::findByColumns(Allergen::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByRisk($value)
    {
        $columns = ['risk'];

        $resultResponse = ApiExtensions::findByColumns(Allergen::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByAllColumns($value)
    {
        $columns = ['name', 'description', 'icon_name', 'risk'];

        $resultResponse = ApiExtensions::findByColumns(Allergen::class, $columns, $value);

        return response()->json($resultResponse);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validateAllergen($request);
        $resultResponse = new ResultResponse();

        try {
            $allergen = Allergen::findOrFail($id);

            $allergen->name = $request->get('name');
            $allergen->description = $request->get('description');
            $allergen->icon_name = $request->get('icon_name');
            $allergen->risk = $request->get('risk');

            $allergen->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $allergen,
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
            $allergen = Allergen::findOrFail($id);

            $allergen->name = $request->get('name', $allergen->name);
            $allergen->description = $request->get('description', $allergen->description);
            $allergen->icon_name = $request->get('icon_name', $allergen->icon_name);
            $allergen->risk = $request->get('risk', $allergen->risk);

            $allergen->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $allergen,
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
            $allergen = Allergen::findOrFail($id);

            $allergen->delete();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $allergen,
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
