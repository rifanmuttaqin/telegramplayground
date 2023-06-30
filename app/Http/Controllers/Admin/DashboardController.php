<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        // $category = $this->category->getAll();

        if($request->ajax()) {
            
            // return datatables()
            //     ->of($category)
            //     ->addColumn('action', function ($category) {
            //         return view('admin.category.action', [
            //             'category' => $category
            //         ]);
            //     })
            //     ->addIndexColumn()
            //     ->make(true);
        }
        return view('admin.dashboard.index');
    }
}
