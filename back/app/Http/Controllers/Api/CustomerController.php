<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libs\ApiExtensions;
use App\Libs\ResultResponse;
use App\Models\Customer;
use App\Models\OnlineOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();

        $resultResponse = new ResultResponse();

        ApiExtensions::setResultResponse(
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

        $password = Hash::make($request->get('password'));
        try {
            $this -> validateCustomer($request);

            $newCustomer   = new Customer([
                'name' => $request->get('name'),
                'surname_1' => $request->get('surname_1'),
                'surname_2' => $request->get('surname_2'),
                'birth_date' => $request->get('birth_date'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
                'password' => $password,
                'address' => $request->get('address')
            ]);

            $newCustomer->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $newCustomer,
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
            $customer = Customer::findOrFail($id);
            $customer->OnlineOrder = $customer->online();
            ApiExtensions::setResultResponse(
                $resultResponse,
                $customer,
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

        $resultResponse = ApiExtensions::findByColumns(Customer::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findBySurname($value)
    {
        $columns = ['surname_1', 'surname_2'];

        $resultResponse = ApiExtensions::findByColumns(Customer::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByBirthDate($value)
    {
        $columns = ['birth_date'];

        $resultResponse = ApiExtensions::findByColumns(Customer::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByPhone($value)
    {
        $columns = ['phone'];

        $resultResponse = ApiExtensions::findByColumns(Customer::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByEmail($value)
    {
        $columns = ['email'];

        $resultResponse = ApiExtensions::findByColumns(Customer::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByAddress($value)
    {
        $columns = ['address'];

        $resultResponse = ApiExtensions::findByColumns(Customer::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByAll($value)
    {
        $columns = ['name, surname_1, surname_2, birth_date, phone, email, address'];

        $resultResponse = ApiExtensions::findByColumns(Customer::class, $columns, $value);

        return response()->json($resultResponse);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $resultResponse = new ResultResponse();

        try {
            $this -> validateCustomer($request);

            $customer = Customer::findOrFail($id);

            $password = Hash::make($request->get('password'));

            $customer->name = $request->get('name');
            $customer->surname_1 = $request->get('surname_1');
            $customer->surname_2 = $request->get('surname_2');
            $customer->birth_date = $request->get('birth_date');
            $customer->phone = $request->get('phone');
            $customer->email = $request->get('email');
            $customer->password = $password;
            $customer->address = $request->get('address');

            $customer->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $customer,
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
            $this -> validateCustomer($request);

            $customer = Customer::findOrFail($id);

            $password = $request->get('password');
            if ($password)
                $customer->password = Hash::make($password);

            $customer->name = $request->get('name', $customer->name);
            $customer->surname_1 = $request->get('surname_1', $customer->surname_1);
            $customer->surname_2 = $request->get('surname_2', $customer->surname_2);
            $customer->birth_date = $request->get('birth_date', $customer->birth_date);
            $customer->phone = $request->get('phone', $customer->phone);
            $customer->email = $request->get('email', $customer->email);
            $customer->address = $request->get('address', $customer->address);

            $customer->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $customer,
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
            $customer = Customer::findOrFail($id);

            $customer->delete();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $customer,
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

    private function validateCustomer($request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:200',
            'surname_1' => 'required|max:200',
            'surname_2' => 'required|max:200',
            'birth_date' => 'required|date',
            'phone' => 'required|numeric|digits:9',
            'email' => 'required|unique:App\Models\Customer,email|email',
            'address' => 'required|max:200'
        ]);
    }
}
