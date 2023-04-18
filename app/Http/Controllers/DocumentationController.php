<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function patient_documentation() {
        $data = session()->all();
        return view('ProgressInfo.documentation', compact('data'));
    }

    public function agency_documentation() {
        try {
            $data = session()->all();
            return view('Agency.documentation', compact('data'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function employee_documentation()
    {
        $data = session()->all();
        return view('Employee.employee-documentation', compact('data'));
    }
}
