<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libs\ApiExtensions;
use App\Models\KitchenOrder;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;

class KitchenOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kitchenOrders = KitchenOrder::all();

        $resultResponse = new ResultResponse();

        ApiExtensions::setResultResponse(
            $resultResponse,
            $kitchenOrders,
            ResultResponse::SUCCESS_CODE,
            ResultResponse::TXT_SUCCESS_CODE
        );
        return $kitchenOrders;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $resultResponse = new ResultResponse();

        try {
            $this->validateKitchenOrder($request);

            $newKitchenOrder   = new KitchenOrder([
                'begin_date' => $request->get('begin_date'),
                'end_date' => $request->get('end_date'),
                'status' => $request->get('status'),
            ]);

            $newKitchenOrder->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $newKitchenOrder,
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
            $kitchenOrder = KitchenOrder::findOrFail($id);

            ApiExtensions::setResultResponse(
                $resultResponse,
                $kitchenOrder,
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

    public function findByBeginDate($value)
    {
        $columns = ['begin_date'];

        $resultResponse = ApiExtensions::findByColumns(KitchenOrder::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByStatus($value)
    {
        $columns = ['status'];

        $resultResponse = ApiExtensions::findByColumns(KitchenOrder::class, $columns, $value);

        return response()->json($resultResponse);
    }


    public function findByEndDate($value)
    {
        $columns = ['end_date'];

        $resultResponse = ApiExtensions::findByColumns(KitchenOrder::class, $columns, $value);

        return response()->json($resultResponse);
    }


    public function findByAllColumns($value)
    {
        $columns = ['begin_date', 'end_date', 'status'];

        $resultResponse = ApiExtensions::findByColumns(KitchenOrder::class, $columns, $value);

        return response()->json($resultResponse);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $resultResponse = new ResultResponse();

        try {
            $this->validateKitchenOrder($request);

            $kitchenOrder = KitchenOrder::findOrFail($id);

            $kitchenOrder->begin_date = $request->get('begin_date');
            $kitchenOrder->end_date = $request->get('end_date');
            $kitchenOrder->status = $request->get('status');

            $kitchenOrder->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $kitchenOrder,
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
            $this->validateKitchenOrder($request);

            $kitchenOrder = KitchenOrder::findOrFail($id);

            $kitchenOrder->begin_date = $request->get('begin_date', $kitchenOrder->begin_date);
            $kitchenOrder->end_date = $request->get('end_date', $kitchenOrder->end_date);
            $kitchenOrder->status = $request->get('status', $kitchenOrder->status);

            $kitchenOrder->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $kitchenOrder,
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
            $kitchenOrder = KitchenOrder::findOrFail($id);

            $kitchenOrder->delete();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $kitchenOrder,
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

    private function validateKitchenOrder($request)
    {
        $validatedData = $request->validate([
            'begin_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|max:50',
        ]);
    }
}
