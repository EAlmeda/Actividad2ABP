<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

        $this->setResultResponse(
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

            $this->setResultResponse(
                $resultResponse,
                $newAllergen,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            $this->setResultResponse(
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

            $this->setResultResponse(
                $resultResponse,
                $allergen,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            $this->setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }

        return response()->json($resultResponse);
    }

    public function findByName($name)
    {
        $resultResponse = new ResultResponse();
        try {
            $allergen = Allergen::where('name', $name)->firstOrFail();

            $this->setResultResponse(
                $resultResponse,
                $allergen,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            $this->setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }

        return response()->json($resultResponse);
    }

    public function findByDescription($description)
    {
        $resultResponse = new ResultResponse();
        try {
            $allergen = Allergen::where('name', 'LIKE', '%' . $description . '%')->firstOrFail();

            $this->setResultResponse(
                $resultResponse,
                $allergen,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            $this->setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }

        return response()->json($resultResponse);
    }

    public function findByRisk($risk)
    {
        $resultResponse = new ResultResponse();
        try {
            $allergen = Allergen::where('risk', $risk)->firstOrFail();

            $this->setResultResponse(
                $resultResponse,
                $allergen,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            $this->setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }

        return response()->json($resultResponse);
    }

    public function findByAllColumns($value)
    {
        $query = Allergen::query();
        $resultResponse = new ResultResponse();
        $columns = ['name', 'description', 'icon_name', 'risk'];

        try {
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $value . '%');
            }

            $allergen = $query->paginate(1);

            $this->setResultResponse(
                $resultResponse,
                $allergen,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            $this->setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }

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

            $this->setResultResponse(
                $resultResponse,
                $allergen,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            $this->setResultResponse(
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

            $this->setResultResponse(
                $resultResponse,
                $allergen,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            $this->setResultResponse(
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

            $this->setResultResponse(
                $resultResponse,
                $allergen,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            $this->setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }
        return response()->json($resultResponse);
    }

    private function setResultResponse($resultResponse, $data, $statusCode, $message)
    {
        $resultResponse->setData($data);
        $resultResponse->setStatusCode($statusCode);
        $resultResponse->setMessage($message);
    }
}
