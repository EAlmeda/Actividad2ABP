<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();

        $resultResponse = new ResultResponse();

        $this->setResultResponse(
            $resultResponse,
            $bookings,
            ResultResponse::SUCCESS_CODE,
            ResultResponse::TXT_SUCCESS_CODE
        );
        return $bookings;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateBooking($request);

        $resultResponse = new ResultResponse();

        try {
            $newBooking   = new Booking([
                'booker_name' => $request->get('booker_name'),
                'booker_phone' => $request->get('booker_phone'),
                'booker_time' => $request->get('booker_time'),
                'people_quantity' => $request->get('people_quantity'),
                'date' => $request->get('date'),
                'time' => $request->get('time'),
            ]);

            $newBooking->save();

            $this->setResultResponse(
                $resultResponse,
                $newBooking,
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
            $booking = Booking::findOrFail($id);

            $this->setResultResponse(
                $resultResponse,
                $booking,
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

    public function findByBookerName($booker_name)
    {
        $query = Booking::query();
        $resultResponse = new ResultResponse();
        $columns = ['booker_name'];

        try {
            foreach ($columns as $column) {
                $query->orWhere($column, $booker_name);
            }

            $booking = $query->paginate();

            $this->setResultResponse(
                $resultResponse,
                $booking,
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

    public function findByBookerPhone($booker_phone)
    {
        $query = Booking::query();
        $resultResponse = new ResultResponse();
        $columns = ['booker_phone'];

        try {
            foreach ($columns as $column) {
                $query->orWhere($column, $booker_phone);
            }

            $booking = $query->paginate();

            $this->setResultResponse(
                $resultResponse,
                $booking,
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

    public function findByDateTime($value)
    {
        $query = Booking::query();
        $resultResponse = new ResultResponse();
        $columns = ['date', 'time'];

        try {
            foreach ($columns as $column) {
                $query->orWhere($column, $value);
            }

            $booking = $query->paginate();

            $this->setResultResponse(
                $resultResponse,
                $booking,
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
        $query = Booking::query();
        $resultResponse = new ResultResponse();
        $columns = ['booker_name', 'booker_phone', 'date', 'time'];

        try {
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $value . '%');
            }

            $booking = $query->paginate();

            $this->setResultResponse(
                $resultResponse,
                $booking,
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
        $this->validateBooking($request);
        $resultResponse = new ResultResponse();

        try {
            $booking = Booking::findOrFail($id);

            $booking->name = $request->get('name');
            $booking->surname_1 = $request->get('surname_1');
            $booking->booker_time = $request->get('booker_time');
            $booking->people_quantity = $request->get('people_quantity');
            $booking->date = $request->get('date');
            $booking->time = $request->get('time');

            $booking->save();

            $this->setResultResponse(
                $resultResponse,
                $booking,
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
            $booking = Booking::findOrFail($id);

            $booking->name = $request->get('name', $booking->name);
            $booking->surname_1 = $request->get('surname_1', $booking->surname_1);
            $booking->booker_time = $request->get('booker_time', $booking->booker_time);
            $booking->people_quantity = $request->get('people_quantity', $booking->people_quantity);
            $booking->date = $request->get('date', $booking->date);
            $booking->time = $request->get('time', $booking->time);

            $booking->save();

            $this->setResultResponse(
                $resultResponse,
                $booking,
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
            $booking = Booking::findOrFail($id);

            $booking->delete();

            $this->setResultResponse(
                $resultResponse,
                $booking,
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
