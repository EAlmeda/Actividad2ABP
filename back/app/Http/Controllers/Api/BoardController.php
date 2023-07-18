<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        $boards = Board::all();

        $resultResponse = new ResultResponse();

        $this->setResultResponse(
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
        $this->validateBoard($request);

        $resultResponse = new ResultResponse();

        try {
            $newBoard   = new Board([
                'capacity' => $request->get('capacity'),
                'available' => $request->get('available'),
            ]);

            $newBoard->save();

            $this->setResultResponse(
                $resultResponse,
                $newBoard,
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
            $board = Board::findOrFail($id);

            $this->setResultResponse(
                $resultResponse,
                $board,
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
        $this->validateBoard($request);
        $resultResponse = new ResultResponse();

        try {
            $board = Board::findOrFail($id);

            $board->capacity = $request->get('capacity');
            $board->available = $request->get('available');

            $board->save();

            $this->setResultResponse(
                $resultResponse,
                $board,
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
            $board = Board::findOrFail($id);

            $board->capacity = $request->get('capacity', $board->capacity);
            $board->available = $request->get('available', $board->available);

            $board->save();

            $this->setResultResponse(
                $resultResponse,
                $board,
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
            $board = Board::findOrFail($id);

            $board->delete();

            $this->setResultResponse(
                $resultResponse,
                $board,
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
