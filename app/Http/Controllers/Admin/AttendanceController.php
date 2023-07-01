<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class AttendanceController extends Controller
{
    protected $telegram;

    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

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

        return view('admin.dashboard.attendance.index');
    }    
}
