<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libs\ApiExtensions;
use App\Models\Board;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boards = Board::paginate();

        $resultResponse = new ResultResponse();

        ApiExtensions::setResultResponse(
            $resultResponse,
            $boards,
            ResultResponse::SUCCESS_CODE,
            ResultResponse::TXT_SUCCESS_CODE
        );
        return $boards;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resultResponse = new ResultResponse();

        try {
            $this->validateBoard($request);

            $newBoard   = new Board([
                'capacity' => $request->get('capacity'),
                'available' => $request->get('available'),
                'number' => $request->get('number'),
            ]);

            $newBoard->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $newBoard,
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
            $board = Board::with('kitchenOrders')->with('employee')->findOrFail($id);
            ApiExtensions::setResultResponse(
                $resultResponse,
                $board,
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

    public function findByCapacity($value)
    {
        $columns = ['capacity'];

        $resultResponse = ApiExtensions::findByColumns(Board::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByAvailability($value)
    {
        $columns = ['available'];

        $resultResponse = ApiExtensions::findByColumns(Board::class, $columns, $value);

        return response()->json($resultResponse);
    }


    public function findByAllColumns($value)
    {
        $columns = ['capacity', 'available'];

        $resultResponse = ApiExtensions::findByColumns(Board::class, $columns, $value);

        return response()->json($resultResponse);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $resultResponse = new ResultResponse();

        try {
            $this->validateBoard($request);

            $board = Board::findOrFail($id);

            $board->capacity = $request->get('capacity');
            $board->available = $request->get('available');

            $board->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $board,
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
            $this->validateBoard($request, true);

            $board = Board::findOrFail($id);

            $board->capacity = $request->get('capacity', $board->capacity);
            $board->available = $request->get('available', $board->available);
            $board->number = $request->get('number', $board->number);

            $board->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $board,
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
            $board = Board::findOrFail($id);

            $board->delete();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $board,
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

    private function validateBoard($request, $isPatch = false)
    {
        if (!$isPatch)
            $validatedData = $request->validate([
                'capacity' => 'required|integer|between:1,50',
                'number' => 'required|integer|between:1,50',
                'available' => 'required|boolean'
            ]);
        else
            $validatedData = $request->validate([
                'capacity' => 'integer|between:1,50',
                'number' => 'integer|between:1,50',
                'available' => 'boolean'
            ]);
    }
}
