<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libs\ApiExtensions;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();

        $resultResponse = new ResultResponse();

        ApiExtensions::setResultResponse(
            $resultResponse,
            $employees,
            ResultResponse::SUCCESS_CODE,
            ResultResponse::TXT_SUCCESS_CODE
        );
        return $employees;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $resultResponse = new ResultResponse();

        try {
            $this->validateEmployee($request);

            $newEmployee   = new Employee([
                'name' => $request->get('name'),
                'surname_1' => $request->get('surname_1'),
                'surname_2' => $request->get('surname_2'),
                'team' => $request->get('team'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
                'work_shift' => $request->get('work_shift'),
                'bank_account' => $request->get('bank_account'),
                'address' => $request->get('address')
            ]);

            $newEmployee->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $newEmployee,
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
            $employee = Employee::findOrFail($id);

            ApiExtensions::setResultResponse(
                $resultResponse,
                $employee,
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

        $resultResponse = ApiExtensions::findByColumns(Employee::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findBySurname($value)
    {
        $columns = ['surname_1', 'surname_2'];

        $resultResponse = ApiExtensions::findByColumns(Employee::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByTeam($value)
    {
        $columns = ['team'];

        $resultResponse = ApiExtensions::findByColumns(Employee::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByPhone($value)
    {
        $columns = ['phone'];

        $resultResponse = ApiExtensions::findByColumns(Employee::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByEmail($value)
    {
        $columns = ['email'];

        $resultResponse = ApiExtensions::findByColumns(Employee::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByWorkShift($value)
    {
        $columns = ['work_shift'];

        $resultResponse = ApiExtensions::findByColumns(Employee::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByBankAccount($value)
    {
        $columns = ['bank_account'];

        $resultResponse = ApiExtensions::findByColumns(Employee::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByAddress($value)
    {
        $columns = ['address'];

        $resultResponse = ApiExtensions::findByColumns(Employee::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByAllColumns($value)
    {
        $columns = ['name', 'surname_1', 'surname_2', 'team', 'phone', 'email', 'work_shift', 'bank_account', 'address'];

        $resultResponse = ApiExtensions::findByColumns(Employee::class, $columns, $value);

        return response()->json($resultResponse);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $resultResponse = new ResultResponse();

        try {
            $this->validateEmployee($request);

            $employee = Employee::findOrFail($id);

            $employee->name = $request->get('name');
            $employee->surname_1 = $request->get('surname_1');
            $employee->surname_2 = $request->get('surname_2');
            $employee->team = $request->get('team');
            $employee->phone = $request->get('phone');
            $employee->email = $request->get('email');
            $employee->work_shift = $request->get('work_shift');
            $employee->bank_account = $request->get('bank_account');
            $employee->address = $request->get('address');

            $employee->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $employee,
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
            $this->validateEmployee($request);

            $employee = Employee::findOrFail($id);

            $employee->name = $request->get('name', $employee->name);
            $employee->surname_1 = $request->get('surname_1', $employee->surname_1);
            $employee->surname_2 = $request->get('surname_2', $employee->surname_2);
            $employee->team = $request->get('team', $employee->team);
            $employee->phone = $request->get('phone', $employee->phone);
            $employee->email = $request->get('email', $employee->email);
            $employee->work_shift = $request->get('work_shift', $employee->work_shift);
            $employee->bank_account = $request->get('bank_account', $employee->bank_account);
            $employee->address = $request->get('address', $employee->address);

            $employee->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $employee,
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
            $employee = Employee::findOrFail($id);

            $employee->delete();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $employee,
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

    private function validateEmployee($request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:200',
            'surname_1' => 'required|max:200',
            'surname_2' => 'required|max:200',
            'team' => 'required|max:50',
            'phone' => 'required|numeric|digits:9',
            'email' => 'required|unique:App\Models\Customer,email|email',
            'work_shift' => 'required|max:50',
            'bank_account' => 'required|unique:App\Models\Employee,bank_account|max:100',
            'address' => 'required|max:200'
        ]);
    }
}
