<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionData = "'$row->id', '$row->name','$row->unit_id','$row->type_id','$row->stock'";

                    $btn = '
                            <button class="btn btn-primary btn-sm" onclick="EditAction(' . $actionData . ')" data-toggle="modal" data-target="#updateModal">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        ';

                    $btn .= '
                            <button class="btn btn-danger btn-sm" onclick="DeleteAction(' . $actionData . ')"
                                data-toggle="modal" data-target="#DeleteModal">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        if (session(key: 'success_message')) {
            Alert::success('Success!', session(key: 'success_message'));
        }

        $optionType = Type::all();
        $optionUnit = Unit::all();

        return view('product.index',compact('optionType', 'optionUnit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->unit_id = $request->unit_id;
        $product->type_id = $request->type_id;
        $product->stock = $request->stock;
        $product->save();

        // return Response()->json(['name' => true]);
        if ($product) {
            return Response()->json(['name' => true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        $product->name = $request->name;
        $product->unit_id = $request->unit_id;
        $product->type_id = $request->type_id;
        $product->stock = $request->stock;
        $product->save();

        if ($product) {
            return Response()->json(['name' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Product::find($id)->delete();
    }
}
