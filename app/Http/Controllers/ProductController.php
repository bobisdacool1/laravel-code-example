<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $products = Product::all()->sortBy('id')->take(15);

        return response()
            ->view('product.index', [
                'products' => $products,
            ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()
            ->view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request): Response
    {
        $request->validated();

        $product = new Product();

        $product->name = $request->input('name');
        $product->article = $request->input('article');
        $product->status = $request->input('status');
        $product->data = $request->input('data');

        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();

        $isProductSaved = $product->save();

        if ($isProductSaved) {
            return response()->redirectTo(route('product.index'));
        } else {
            return response()->redirectTo(route('product.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show(int $productId): Response
    {
        $product = Product::where('id', $productId)->first();

        return response()
            ->view('product.show', [
                'product' => $product,
            ], 200);
    }

    /**
     * Show the form for deleting specified resource.
     *
     * @return Response
     */
    public function delete(int $id): Response
    {
        return response()
            ->view('product.delete', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(DestroyProductRequest $request): RedirectResponse
    {
        $request->validated();

        $productId = (int)$request->input('id');

        $product = Product::where('id', $productId)->first();

        if ($product != null) {
            if ($product->delete()) {
                return response()->redirectTo(route('product.index'));
            } else {
                $error = ['server error' => 'Request failed with server side'];
            }
        } else {
            $error = ['bad request' => 'This user doesn\'t exist!'];
        }

        return response()
            ->redirectTo(route('product.delete', ['id' => $productId]))
            ->withErrors($error);
    }
}
