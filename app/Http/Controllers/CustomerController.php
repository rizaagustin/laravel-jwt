<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Customer;
use App\Imports\CustomerImport;
class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('data_customers', compact('customers'));
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new CustomerImport(), storage_path('app/public/excel/'.$nama_file));

        //remove from server
        // Storage::delete($path);

        if($import) {
            //redirect
            return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('customer.index')->with(['error' => 'Data Gagal Diimport!']);
        }
    }
}
