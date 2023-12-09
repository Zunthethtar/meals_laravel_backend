<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $productRepository;

    public function __construct(ProductInterface $productRepository){
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $products = $this->productRepository->index();
        return view('admin/products/index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();

        $this->productRepository->create();
        return view('admin/products/create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->productRepository->store($request);
        return redirect('products/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories=Category::all();
        $product = $this->productRepository->edit($id);

        return view('admin.products.edit',compact('product',"categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->productRepository->update($id,$request);
        return redirect("products/index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $this->productRepository->delete($id);
        return redirect("products/index");
    }
}
