<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KitchenOrder;
use Illuminate\Http\Request;
use ResultResponse;

class KitchenOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kitchenOrders = KitchenOrder::all();

        $resultResponse = new ResultResponse();

        $this->setResultResponse(
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
        $this->validateKitchenOrder($request);

        $resultResponse = new ResultResponse();

        try {
            $newKitchenOrder   = new KitchenOrder([
                'begin_date' => $request->get('begin_date'),
                'end_date' => $request->get('end_date'),
                'status' => $request->get('status'),
            ]);

            $newKitchenOrder->save();

            $this->setResultResponse(
                $resultResponse,
                $newKitchenOrder,
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
            $kitchenOrder = KitchenOrder::findOrFail($id);

            $this->setResultResponse(
                $resultResponse,
                $kitchenOrder,
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
        $this->validateKitchenOrder($request);
        $resultResponse = new ResultResponse();

        try {
            $kitchenOrder = KitchenOrder::findOrFail($id);

            $kitchenOrder->begin_date = $request->get('begin_date');
            $kitchenOrder->end_date = $request->get('end_date');
            $kitchenOrder->status = $request->get('status');

            $kitchenOrder->save();

            $this->setResultResponse(
                $resultResponse,
                $kitchenOrder,
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

    public function put(Request $request, $id)
    {
        $resultResponse = new ResultResponse();

        try {
            $kitchenOrder = KitchenOrder::findOrFail($id);

            $kitchenOrder->begin_date = $request->get('begin_date', $kitchenOrder->begin_date);
            $kitchenOrder->end_date = $request->get('end_date', $kitchenOrder->end_date);
            $kitchenOrder->status = $request->get('status', $kitchenOrder->status);

            $kitchenOrder->save();

            $this->setResultResponse(
                $resultResponse,
                $kitchenOrder,
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
            $kitchenOrder = KitchenOrder::findOrFail($id);

            $kitchenOrder->delete();

            $this->setResultResponse(
                $resultResponse,
                $kitchenOrder,
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
