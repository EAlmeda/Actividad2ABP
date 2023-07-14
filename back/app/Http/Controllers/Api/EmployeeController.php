<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use ResultResponse;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();

        $resultResponse = new ResultResponse();

        $this->setResultResponse(
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
        $this->validateEmployee($request);

        $resultResponse = new ResultResponse();

        try {
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

            $this->setResultResponse(
                $resultResponse,
                $newEmployee,
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
            $employee = Employee::findOrFail($id);

            $this->setResultResponse(
                $resultResponse,
                $employee,
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
        $this->validateEmployee($request);
        $resultResponse = new ResultResponse();

        try {
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

            $this->setResultResponse(
                $resultResponse,
                $employee,
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

            $this->setResultResponse(
                $resultResponse,
                $employee,
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
            $employee = Employee::findOrFail($id);

            $employee->delete();

            $this->setResultResponse(
                $resultResponse,
                $employee,
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
