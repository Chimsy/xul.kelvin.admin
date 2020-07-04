<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('product_access'), 403);

        $products = DB::table('users')
            ->whereNotNull('reg_num')
            ->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('product_create'), 403);

        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        abort_unless(\Gate::allows('product_create'), 403);

        $product = Product::create($request->all());

        return redirect()->route('admin.products.index');
    }

    public function edit(User $product)
    {
        abort_unless(\Gate::allows('product_edit'), 403);

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request)
    {
        abort_unless(\Gate::allows('product_edit'), 403);

        $source_id = $request->input('source_id');
        $payment_plan = $request->input('payment_plan');
        $semester_reg = $request->input('semester_reg');
        $exam_reg = $request->input('exam_reg');
        $ecocash = $request->input('ecocash');
        $zipit = $request->input('zipit');

        DB::table('users')
            ->where('id', $source_id)
            ->update([
                'payment_plan' => $payment_plan,
                'semester_reg' => $semester_reg,
                'exam_reg' => $exam_reg,
                'ecocash' => $ecocash,
                'zipit' => $zipit,
            ]);

        return redirect()->route('admin.products.index');
    }

    public function show(User $product)
    {
        abort_unless(\Gate::allows('product_show'), 403);

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_unless(\Gate::allows('product_delete'), 403);

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

}
