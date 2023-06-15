<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Models\Invoice;

class ReportController extends Controller
{
    public function report(){
    if(Auth::user()->type == 'admin'){
        $invoices = Invoice::orderBy('created_at', 'asc')->get();
        return view('pages.report.index',compact('invoices'));
    }
    }
}
