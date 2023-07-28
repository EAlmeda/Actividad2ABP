<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libs\ApiExtensions;
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
        $bookings = Booking::paginate();

        $resultResponse = new ResultResponse();

        ApiExtensions::setResultResponse(
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
        $resultResponse = new ResultResponse();

        try {
            $this->validateBooking($request);

            $newBooking   = new Booking([
                'booker_name' => $request->get('booker_name'),
                'booker_phone' => $request->get('booker_phone'),
                'booker_email' => $request->get('booker_email'),
                'people_quantity' => $request->get('people_quantity'),
                'date' => $request->get('date'),
            ]);

            $newBooking->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $newBooking,
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
            $booking = Booking::with('customer')->findOrFail($id);

            ApiExtensions::setResultResponse(
                $resultResponse,
                $booking,
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

    public function findByBookerName($booker_name)
    {
        $columns = ['booker_name'];

        $resultResponse = ApiExtensions::findByColumns(Booking::class, $columns, $booker_name);

        return response()->json($resultResponse);
    }

    public function findByBookerPhone($booker_phone)
    {
        $columns = ['booker_phone'];

        $resultResponse = ApiExtensions::findByColumns(Booking::class, $columns, $booker_phone);

        return response()->json($resultResponse);
    }



    public function findByBookerEmail($booker_email)
    {
        $columns = ['booker_email'];

        $resultResponse = ApiExtensions::findByColumns(Booking::class, $columns, $booker_email);

        return response()->json($resultResponse);
    }

    public function findByPeopleQuantity($value)
    {
        $columns = ['people_quantity'];

        $resultResponse = ApiExtensions::findByColumns(Booking::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByDate($value)
    {
        $columns = ['date'];

        $resultResponse = ApiExtensions::findByColumns(Booking::class, $columns, $value);

        return response()->json($resultResponse);
    }

    public function findByAllColumns($value)
    {
        # TODO Ensure that all the columns need to be indexed. It makes no sense we need the booking_time to search when having the rest of values.
        $columns = ['booker_name', 'booker_phone', 'booker_email', 'people_quantity', 'date'];

        $resultResponse = ApiExtensions::findByColumns(Booking::class, $columns, $value);

        return response()->json($resultResponse);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $resultResponse = new ResultResponse();

        try {
            $this->validateBooking($request);

            $booking = Booking::findOrFail($id);

            $booking->booker_name = $request->get('booker_name');
            $booking->booker_phone = $request->get('booker_phone');
            $booking->booker_email = $request->get('booker_email');
            $booking->people_quantity = $request->get('people_quantity');
            $booking->date = $request->get('date');

            $booking->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $booking,
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
            $this->validateBooking($request);

            $booking = Booking::findOrFail($id);

            $booking->booker_name = $request->get('booker_name', $booking->booker_name);
            $booking->booker_phone = $request->get('booker_phone', $booking->booker_phone);
            $booking->booker_email = $request->get('booker_email', $booking->booker_email);
            $booking->people_quantity = $request->get('people_quantity', $booking->people_quantity);
            $booking->date = $request->get('date', $booking->date);

            $booking->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $booking,
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
            $booking = Booking::findOrFail($id);

            $booking->delete();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $booking,
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

    private function validateBooking($request)
    {
        $validatedData = $request->validate([
            'booker_name' => 'required|unique:App\Models\Booking,booker_name|max:200',
            'booker_phone' => 'required|numeric|digits:9',
            'booker_email' => 'required|email',
            'people_quantity' => 'required|integer|between:0,50',
            'date' => 'required|date'
        ]);
    }
}
