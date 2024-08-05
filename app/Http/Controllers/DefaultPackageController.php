<?php

namespace App\Http\Controllers;

use App\Models\DefaultPackage;
use App\Models\ListExam;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DefaultPackageController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()) {
            $default_packages = DefaultPackage::query();

            return DataTables::of($default_packages)
                    ->editColumn('peso_price', function ($row) {
                        return number_format($row->peso_price,2);
                    })
                    ->editColumn('dollar_price', function ($row) {
                        return number_format($row->dollar_price,2);
                    })
                    ->editColumn('action', function ($row) {
                        return '<a href="" class="btn btn-sm btn-primary"><i class="feather icon-edit"></i></a>
                                <a href="" class="btn btn-sm btn-primary"><i class="feather icon-trash"></i></a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view("DefaultPackages.list-default-packages");
    }

    public function create() {
        $exams = ListExam::get();
        return view("DefaultPackages.add-default-package", compact('exams'));
    }

    public function store() {

    }

    public function show($id) {
    
    }

    public function edit($id) {
    
    }

    public function update(Request $request, $id) { 
    
    }

    public function destroy($id) {
    
    }
}
