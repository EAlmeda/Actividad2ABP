<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        $resultResponse = new ResultResponse();

        $this->setResultResponse(
            $resultResponse,
            $products,
            ResultResponse::SUCCESS_CODE,
            ResultResponse::TXT_SUCCESS_CODE
        );
        return $products;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateProduct($request);

        $resultResponse = new ResultResponse();

        try {
            $newProduct   = new Product([
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'available' => $request->get('available'),
                'image_path' => $request->get('image_path'),
                'description' => $request->get('description'),
                'type' => $request->get('type'),
            ]);

            $newProduct->save();

            $this->setResultResponse(
                $resultResponse,
                $newProduct,
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
            $product = Product::findOrFail($id);

            $this->setResultResponse(
                $resultResponse,
                $product,
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

    public function findByName($name)
    {
        $query = Product::query();
        $resultResponse = new ResultResponse();

        try {
            $query->orWhere('name', 'LIKE', '%' . $name . '%');

            $product = $query->paginate(1);

            $this->setResultResponse(
                $resultResponse,
                $product,
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

    public function findByPrice($price)
    {
        $query = Product::query();
        $resultResponse = new ResultResponse();

        try {
            $query->orWhere('price', 'LIKE', '%' . $price . '%');

            $product = $query->paginate(1);

            $this->setResultResponse(
                $resultResponse,
                $product,
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

    public function findByAvailable($available)
    {
        $query = Product::query();
        $resultResponse = new ResultResponse();

        try {
            $query->orWhere('available', 'LIKE', '%' . $available . '%');

            $product = $query->paginate(1);

            $this->setResultResponse(
                $resultResponse,
                $product,
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

    public function findByImagePath($image_path)
    {
        $query = Product::query();
        $resultResponse = new ResultResponse();

        try {
            $query->orWhere('image_path', 'LIKE', '%' . $image_path . '%');

            $product = $query->paginate(1);

            $this->setResultResponse(
                $resultResponse,
                $product,
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

    public function findByDescription($description)
    {
        $query = Product::query();
        $resultResponse = new ResultResponse();

        try {
            $query->orWhere('description', 'LIKE', '%' . $description . '%');

            $product = $query->paginate(1);

            $this->setResultResponse(
                $resultResponse,
                $product,
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

    public function findByType($type)
    {
        $query = Product::query();
        $resultResponse = new ResultResponse();

        try {
            $query->orWhere('type', 'LIKE', '%' . $type . '%');

            $product = $query->paginate(1);

            $this->setResultResponse(
                $resultResponse,
                $product,
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
        $query = Product::query();
        $resultResponse = new ResultResponse();
        $columns = ['name', 'price', 'available', 'image_path', 'description', 'type'];

        try {
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $value . '%');
            }

            $product = $query->paginate(1);

            $this->setResultResponse(
                $resultResponse,
                $product,
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
        $this->validateProduct($request);
        $resultResponse = new ResultResponse();

        try {
            $product = Product::findOrFail($id);

            $product->name = $request->get('name');
            $product->price = $request->get('price');
            $product->available = $request->get('available');
            $product->image_path = $request->get('image_path');
            $product->description = $request->get('description');
            $product->type = $request->get('type');

            $product->save();

            $this->setResultResponse(
                $resultResponse,
                $product,
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
            $product = Product::findOrFail($id);

            $product->name = $request->get('name', $product->title);
            $product->price = $request->get('price', $product->price);
            $product->available = $request->get('available', $product->available);
            $product->image_path = $request->get('image_path', $product->image_path);
            $product->description = $request->get('description', $product->description);
            $product->type = $request->get('type', $product->type);

            $product->save();

            $this->setResultResponse(
                $resultResponse,
                $product,
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
            $product = Product::findOrFail($id);

            $product->delete();

            $this->setResultResponse(
                $resultResponse,
                $product,
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
