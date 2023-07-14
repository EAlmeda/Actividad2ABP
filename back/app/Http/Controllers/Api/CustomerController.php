<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OnlineOrder;
use Illuminate\Http\Request;
use ResultResponse;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();

        $resultResponse = new ResultResponse();

        $this->setResultResponse(
            $resultResponse,
            $customers,
            ResultResponse::SUCCESS_CODE,
            ResultResponse::TXT_SUCCESS_CODE
        );
        return $customers;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateCustomer($request);

        $resultResponse = new ResultResponse();

        try {
            $newCustomer   = new Customer([
                'name' => $request->get('name'),
                'surname_1' => $request->get('surname_1'),
                'surname_2' => $request->get('surname_2'),
                'birth_date' => $request->get('birth_date'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
                'address' => $request->get('address')
            ]);

            $newCustomer->save();

            $this->setResultResponse(
                $resultResponse,
                $newCustomer,
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
            $customer = Customer::findOrFail($id);
            $customer.OnlineOrder =$customer->online();
            $this->setResultResponse(
                $resultResponse,
                $customer,
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
        $this->validateCustomer($request);
        $resultResponse = new ResultResponse();

        try {
            $customer = Customer::findOrFail($id);

            $customer->name = $request->get('name');
            $customer->surname_1 = $request->get('surname_1');
            $customer->surname_2 = $request->get('surname_2');
            $customer->birth_date = $request->get('birth_date');
            $customer->phone = $request->get('phone');
            $customer->email = $request->get('email');
            $customer->address = $request->get('address');

            $customer->save();

            $this->setResultResponse(
                $resultResponse,
                $customer,
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
            $customer = Customer::findOrFail($id);

            $customer->name = $request->get('name', $customer->name);
            $customer->surname_1 = $request->get('surname_1', $customer->surname_1);
            $customer->surname_2 = $request->get('surname_2', $customer->surname_2);
            $customer->birth_date = $request->get('birth_date', $customer->birth_date);
            $customer->phone = $request->get('phone', $customer->phone);
            $customer->email = $request->get('email', $customer->email);
            $customer->address = $request->get('address', $customer->address);

            $customer->save();

            $this->setResultResponse(
                $resultResponse,
                $customer,
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
            $customer = Customer::findOrFail($id);

            $customer->delete();

            $this->setResultResponse(
                $resultResponse,
                $customer,
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
