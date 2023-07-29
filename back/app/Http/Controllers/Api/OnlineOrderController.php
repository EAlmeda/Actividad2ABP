<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libs\ApiExtensions;
use App\Models\OnlineOrder;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;
use Illuminate\Support\Facades\Log;


class OnlineOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $onlineOrders = OnlineOrder::paginate();

        $resultResponse = new ResultResponse();

        ApiExtensions::setResultResponse(
            $resultResponse,
            $onlineOrders,
            ResultResponse::SUCCESS_CODE,
            ResultResponse::TXT_SUCCESS_CODE
        );
        return $onlineOrders;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $this->validateOnlineOrder($request);

            $newOnlineOrder   = new OnlineOrder([
                'amount' => $request->get('amount'),
                'date' => Carbon::parse($request->get('date')),
                'expected_date' => Carbon::parse($request->get('expectedDate')),
                'address' => $request->get('address'),
                'status' => strtolower($request->get('status')),
                'type' => strtolower($request->get('type')),
                'customer_id' => $request->get('customerId')
            ]);
            $t=$newOnlineOrder->save();
            Log::info($t);
            Log::info($newOnlineOrder);

            $products = $request->get('products');
            if (isset($products)) {
                foreach ($products as $product) {
                    $newOnlineOrder
                        ->products()
                        ->attach($product['id'], ['quantity' => $product['quantity']]);
                }
            }

            ApiExtensions::setResultResponse(
                $resultResponse,
                $newOnlineOrder,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {

            ApiExtensions::setResultResponse(
                $resultResponse,
                $e,
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
            $onlineOrder = OnlineOrder::
            with('products')->
            with('employee')->
            with('customer')->
            findOrFail($id);

            ApiExtensions::setResultResponse(
                $resultResponse,
                $onlineOrder,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                $e,
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }

        return response()->json($resultResponse);
    }

    public function findByAmount($value)
    {
        $columns = ['amount'];

        $resultResponse = ApiExtensions::findByColumns(OnlineOrder::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByDate($value)
    {
        $columns = ['date'];

        $resultResponse = ApiExtensions::findByColumns(OnlineOrder::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByExpectedDate($value)
    {
        $columns = ['expected_date'];

        $resultResponse = ApiExtensions::findByColumns(OnlineOrder::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByAddress($value)
    {
        $columns = ['address'];

        $resultResponse = ApiExtensions::findByColumns(OnlineOrder::class, $columns, $value);

        return response()->json($resultResponse);
    }


    public function findByStatus($value)
    {
        $columns = ['status'];

        $resultResponse = ApiExtensions::findByColumns(OnlineOrder::class, $columns, $value);

        return response()->json($resultResponse);
    }


    public function findByType($value)
    {
        $columns = ['type'];

        $resultResponse = ApiExtensions::findByColumns(OnlineOrder::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByAllColumns($value)
    {
        $columns = ['amount', 'date', 'expected_date', 'address', 'status', 'type'];

        $resultResponse = ApiExtensions::findByColumns(OnlineOrder::class, $columns, $value);

        return response()->json($resultResponse);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $resultResponse = new ResultResponse();

        try {
            $this->validateOnlineOrder($request);

            $onlineOrder = OnlineOrder::findOrFail($id);

            $onlineOrder->amount = $request->get('amount');
            $onlineOrder->date = $request->get('date');
            $onlineOrder->expected_date = $request->get('expected_date');
            $onlineOrder->address = $request->get('address');
            $onlineOrder->status = $request->get('status');
            $onlineOrder->type = $request->get('type');

            $onlineOrder->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $onlineOrder,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                $e,
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
            $this->validateOnlineOrder($request);

            $onlineOrder = OnlineOrder::findOrFail($id);

            $onlineOrder->amount = $request->get('amount', $onlineOrder->amount);
            $onlineOrder->date = $request->get('date', $onlineOrder->date);
            $onlineOrder->expected_date = $request->get('expected_date', $onlineOrder->expected_date);
            $onlineOrder->address = $request->get('address', $onlineOrder->address);
            $onlineOrder->status = $request->get('status', $onlineOrder->status);
            $onlineOrder->type = $request->get('type', $onlineOrder->type);

            $onlineOrder->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $onlineOrder,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                $e,
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
            $onlineOrder = OnlineOrder::findOrFail($id);

            $onlineOrder->delete();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $onlineOrder,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                $e,
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }
        return response()->json($resultResponse);
    }

    private function validateOnlineOrder($request)
    {
        $request->date = Carbon::parse($request->date);
        $request->expected_date = Carbon::parse($request->expected_date);
        $validatedData = $request->validate([
            'amount' => 'required|numeric|gt:0',
            'date' => 'required|date',
            'expectedDate' => 'required|date',
            'address' => 'required|max:200',
            'status' => 'required|max:50',
            'type' => 'required|max:50'
        ]);
    }
}
