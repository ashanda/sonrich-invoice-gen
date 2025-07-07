<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Invoice;
Use App\Models\ProductPackage;
use RealRashid\SweetAlert\Facades\Alert;
use  Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Delete Invoice!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        // Get all companies
        $companies = Company::get();
    
        // Start building the query to fetch invoices
        $query = Invoice::with('companies');
    
        // Filter by start date if provided
        if ($request->start_date) {
            $query->where('created_at', '>=', $request->start_date);
        }
    
        // Filter by end date if provided
        if ($request->end_date) {
            $query->where('created_at', '<=', $request->end_date);
        }
    
        // Filter by company if provided
        if ($request->company) {
            $query->where('company', $request->company);
        }
    
        // Apply different filters based on user type
        if (Auth::user()->type == 'admin') {
            $invoices = $query->orderBy('created_at', 'asc')->get();
            return view('pages.admin.invoice.index', compact('invoices', 'companies'));
        } else if (Auth::user()->type == 'manager') {
            $invoices = $query->where('account_departmet_checked', 'unchecked')
                              ->orderBy('created_at', 'asc')
                              ->get();
            return view('pages.account.invoice.index', compact('invoices', 'companies'));
        } else if (Auth::user()->type == 'deliver') {
            $invoices = $query->where('account_departmet_checked', 'checked')
                              ->where('deliver_departmet_checked', 'not printed')
                              ->orderBy('created_at', 'asc')
                              ->get();
            return view('pages.deliver.invoice.index', compact('invoices', 'companies'));
        } else {
            $invoices = $query->where('user_id', Auth::user()->id)
                              ->where('account_departmet_checked', 'unchecked')
                              ->where('deliver_departmet_checked', 'not printed')
                              ->orderBy('created_at', 'asc')
                              ->get();
            return view('pages.agent.index', compact('invoices', 'companies'));
        }
    }
    

    public function all(Request $request)
    {
        $title = 'Delete Invoice!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
    
        $companies = Company::get();
    
        // Start building the query based on user type
        $query = Invoice::with('companies');
    
        // Filter by start and end date if provided
        if ($request->start_date) {
            $query->where('created_at', '>=', $request->start_date);
        }
    
        if ($request->end_date) {
            $query->where('created_at', '<=', $request->end_date);
        }
    
        // Filter by company if provided
        if ($request->company) {
            $query->where('company', $request->company);
        }
    
        // Apply different filters based on user type
        if (Auth::user()->type == 'admin') {
            $invoices = $query->orderBy('created_at', 'asc')->get();
            return view('pages.admin.invoice.all', compact('invoices', 'companies'));
        } else if (Auth::user()->type == 'manager') {
            $invoices = $query->where('account_departmet_checked', 'checked')
                              //->where('manager_id', Auth::user()->id)
                              ->orderBy('created_at', 'desc')
                              ->get();
            return view('pages.account.invoice.all', compact('invoices', 'companies'));
        } else if (Auth::user()->type == 'deliver') {
            $invoices = $query->where('account_departmet_checked', 'checked')
                             // ->where('deliver_id', Auth::user()->id)
                              ->where('deliver_departmet_checked', 'printed')
                              ->orderBy('created_at', 'desc')
                              ->get();
            return view('pages.deliver.invoice.all', compact('invoices', 'companies'));
        } else {
            $invoices = $query->where('user_id', Auth::user()->id)
                              ->where('account_departmet_checked', 'checked')
                              ->where('deliver_departmet_checked', 'printed')
                              ->orderBy('created_at', 'desc')
                              ->get();
            return view('pages.agent.all', compact('invoices', 'companies'));
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $packages_main = ProductPackage::where('product_type','Main')->where('package_visibility',1)->get();
        $packages_future = ProductPackage::where('product_type','Future')->where('package_visibility',1)->get();
        $companies = Company::get();
        $title = 'Confirm!';
        $text = "Are you sure you want to save this?";
        confirmDelete($title, $text);

        return view('pages.agent.create',compact('packages_main','packages_future','companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    
        // Create a new Invoice instance
        $invoice = new Invoice();
    
        // Assign the form data to the Invoice model attributes
        
        $invoice->invoice_no = $request->invoiceNo;
        $invoice->delivery_code = $request->delivery_code;
        $invoice->delivery_id = $request->delivery_id;
        $invoice->sri_no1 = $request->sriNo1;
        $invoice->sri_no2 = $request->sriNo2;
        $invoice->sri_no3 = $request->sriNo3;
        $invoice->future_plans = json_encode($request->futurePlans);
        $invoice->customer_name = $request->customerName;
        $invoice->customer_address = $request->customerAddress;
        $invoice->customer_district = $request->customerDistrict;
        $invoice->mobile_no1 = $request->mobileNo1;
        $invoice->mobile_no2 = $request->mobileNo2;
        $invoice->company = $request->company;
        
        if($request->mainProductPackage != "N/A" && $request->mainProductPackage != null){
            $invoice->main_product_package = json_encode($request->mainProductPackage);
        }
        if($request->futureProductPackages != "N/A" && $request->futureProductPackages != null){
            $invoice->future_product_packages = json_encode($request->futureProductPackages);
        }

         // Save quantities if available
        $mainQuantities = $request->input('mainProductPackage_quantities', []); // default empty array
        $futureQuantities = $request->input('futureProductPackages_quantities', []);

        // Save quantities as JSON (you need columns in invoices table for these)
        $invoice->main_product_package_quantities = json_encode($mainQuantities);
        $invoice->future_product_package_quantities = json_encode($futureQuantities);

        $invoice->amount = $request->amount;

        if($request->file('attachments1')){
            $file= $request->file('attachments1');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/attachments'), $filename);
            $invoice->attachments1 = $filename;
        }
        if($request->file('attachments2')){
            $file= $request->file('attachments2');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/attachments'), $filename);
            $invoice->attachments2 = $filename;
        }
        if($request->file('attachments3')){
            $file= $request->file('attachments3');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/attachments'), $filename);
            $invoice->attachments3 = $filename;
        }
        if($request->file('attachments4')){
            $file= $request->file('attachments4');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/attachments'), $filename);
            $invoice->attachments4 = $filename;
        }
        if($request->file('attachments5')){
            $file= $request->file('attachments5');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/attachments'), $filename);
            $invoice->attachments5 = $filename;
        }
        $invoice->user_id = Auth::user()->id;
        // Save the invoice to the database
        $invoice->save();
        Alert::Alert('Success', 'Invoice Create Sucessfully.')->persistent(true,false);
        return redirect()->route('invoice.index')->with('success', 'User member created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::with('companies')->where('id',$id)->first();
        $companies = Company::all();
        $packages_main = ProductPackage::where('product_type','Main')->get();
        $packages_future = ProductPackage::where('product_type','Future')->get();
        $selectedMainPackages = json_decode($invoice->main_product_package_quantities, true) ?? [];
        $selectedFuturePackages = json_decode($invoice->future_product_packages_quantities, true) ?? [];
        return view('pages.agent.show',compact('invoice', 'packages_main', 'packages_future','companies', 'selectedMainPackages', 'selectedFuturePackages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoice = Invoice::with('companies')->where('id',$id)->first();
        $companies = Company::all();
        $packages_main = ProductPackage::where('product_type','Main')->get();
        $packages_future = ProductPackage::where('product_type','Future')->get();
        $selectedMainPackages = json_decode($invoice->main_product_package_quantities, true) ?? [];
        $selectedFuturePackages = json_decode($invoice->future_product_packages_quantities, true) ?? [];
        $title = 'Confirm!';
        $text = "Are you sure you want to save this?";
        confirmDelete($title, $text);
        return view('pages.agent.edit',compact('invoice', 'packages_main', 'packages_future', 'companies', 'selectedMainPackages', 'selectedFuturePackages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $invoice = Invoice::findOrFail($id);
    
    // Validate the input data
    

    // Update the invoice data
    $invoice->delivery_code = $request->delivery_code;
    $invoice->delivery_id = $request->delivery_id;
    $invoice->sri_no1 = $request->input('sriNo1');
    $invoice->sri_no2 = $request->input('sriNo2');
    $invoice->sri_no3 = $request->input('sriNo3');
    $invoice->customer_name = $request->input('customerName');
    $invoice->customer_address = $request->input('customerAddress');
    $invoice->customer_district = $request->input('customerDistrict');
    $invoice->mobile_no1 = $request->input('mobileNo1');
    $invoice->mobile_no2 = $request->input('mobileNo2');
    
    //$invoice->future_product_packages = $request->input('futureProductPackages');
    //$invoice->main_product_package = $request->input('mainProductPackage');
    
    if($request->file('attachments1')){
        $file= $request->file('attachments1');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/attachments'), $filename);
        $invoice->attachments1 = $filename;
    }
    if($request->file('attachments2')){
        $file= $request->file('attachments2');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/attachments'), $filename);
        $invoice->attachments2 = $filename;
    }
    if($request->file('attachments3')){
        $file= $request->file('attachments3');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/attachments'), $filename);
        $invoice->attachments3 = $filename;
    }
    if($request->file('attachments4')){
        $file= $request->file('attachments4');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/attachments'), $filename);
        $invoice->attachments4 = $filename;
    }
    if($request->file('attachments5')){
        $file= $request->file('attachments5');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/attachments'), $filename);
        $invoice->attachments5 = $filename;
    }
    
    // Repeat the above block for attachments3, attachments4, and attachments5
    
    // Calculate the total amount based on selected packages
    $amount = 0.00;
    $discount=0.00;

    // if ($request->input('mainProductPackage') != 'N/A') {
    //     $mainPackage = ProductPackage::findOrFail($request->input('mainProductPackage'));
       
    //     $amount += $mainPackage->amount;
    //     $discount += $mainPackage->discount;

    //     $invoice->main_product_package = $request->input('mainProductPackage');
    // }
    
    // if ($request->filled('mainProductPackage')) {
    //     foreach ($request->input('mainProductPackage') as $mainPackageId) {
    //         $mainPackage = ProductPackage::findOrFail($mainPackageId);
    //         $amount += $mainPackage->amount;
    //         $discount += $mainPackage->discount;
            
    //     }
    // }
   
    
    // if ($request->filled('futureProductPackages')) {
    //     foreach ($request->input('futureProductPackages') as $futurePackageId) {
    //         $futurePackage = ProductPackage::findOrFail($futurePackageId);
    //         $amount += $futurePackage->amount;
    //         $discount += $futurePackage->discount;
            
    //     }
    // }
   
    // $invoice->amount = $amount-$discount;
    $invoice->account_departmet_checked = $request->switchone;
    $invoice->manager_id = Auth::user()->id;
    $invoice->save();
    
    Alert::Alert('Success', 'Invoice Update Sucessfully.')->persistent(true,false);
    return redirect()->route('invoice.index')->with('success', 'User member created successfully.');


}

public function tracking(Request $request, $id)
{
$invoice = Invoice::findOrFail($id);
$invoice->tracking = $request->tracking;
$invoice->taken_by_office = $request->tbo;
$invoice->reason = $request->tbr;

    $invoice->save();
    Alert::Alert('Success', 'Invoice Update Sucessfully.')->persistent(true,false);
    return redirect()->back();
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        // Find the invoice by ID
    $invoice = Invoice::find($id);

    if (!$invoice) {
        // If the invoice is not found, return a response or redirect as per your requirement
        return response()->json(['message' => 'Invoice not found'], 404);
    }

    // Perform any additional validation or checks before deleting the invoice

    // Delete the invoice
    $invoice->delete();
    Alert::Alert('Success', 'Invoice Delete Sucessfully.')->persistent(true,false);
    return redirect()->back();
    }

    public function note(Request $request, $id){
        $invoice = Invoice::findOrFail($id);
        $invoice->remark = $request->remark;
        $invoice->deliver_id = Auth::user()->id;
        $invoice->save();
        Alert::Alert('Success', 'Remark Update Sucessfully.')->persistent(true,false);
        return redirect()->back();


    }


    public function delive_update(Request $request, $id)
    {
        // Use $user_id and $id as needed
        // Retrieve the invoice, update the fields, and save
        
        $invoice = Invoice::findOrFail($id);
        $invoice->remark = $request->remark;
        $invoice->first_call = $request->fcd;
        $invoice->first_call_address = $request->input('fca');
        $invoice->first_call_reason = $request->fcr;
        $invoice->secound_call = $request->scd;
        $invoice->secound_call_address = $request->input('sca');
        $invoice->secound_call_reason = $request->scr;
        $invoice->third_call = $request->tcd;
        $invoice->third_call_address = $request->input('tca');
        $invoice->third_call_reason = $request->tcr;
        $invoice->customer_name = $request->customerName;
        $invoice->customer_address = $request->customerAddress;
        $invoice->customer_district = $request->customerDistrict;
        $invoice->mobile_no1 = $request->mobileNo1;
        $invoice->taken_by_office = $request->tbo;
        $invoice->reason = $request->tbr;
        $invoice->deliver_id = Auth::user()->id;
        $invoice->save();
        Alert::Alert('Success', 'Invoice Data Update Sucessfully.')->persistent(true,false);
        return redirect()->back();
        }


 public function delive_print(Request $request, $id)
    {
        
        // Use $user_id and $id as needed
        // Retrieve the invoice, update the fields, and save
        
        $invoice = Invoice::with('companies')->findOrFail($id);
        $invoice->deliver_departmet_checked = 'printed';
        $invoice->remark = $request->remark;
        $invoice->deliver_id = Auth::user()->id;
        $invoice->save();
      //  dd($invoice);
        $invoice['date'] = '';
        $pdf = PDF::loadView('pdf.invoice', ['invoice' => $invoice]);

// Generate a unique identifier for the PDF file
$randomString = Str::random(8);
$filename = 'invoice_' . $randomString . '.pdf';

// Create the directory if it doesn't exist
$directory = 'temp/';
if (!File::exists($directory)) {
    File::makeDirectory($directory, 0777, true);
}

// Save the PDF file
$pdf->save(public_path($directory . $filename));

// Generate the URL for the PDF file
$pdfUrl = asset($directory . $filename);

// Return the PDF file for download
return response()->download(public_path($directory . $filename))->deleteFileAfterSend(true);
        }       


        public function  print_show(string $id)
        {
            
            $invoice = Invoice::where('id',$id)->with('companies')->first();
            $packages_main = ProductPackage::where('product_type','Main')->get();
            $packages_future = ProductPackage::where('product_type','Future')->get();
            $selectedMainPackages = json_decode($invoice->main_product_package_quantities, true) ?? [];
            $selectedFuturePackages = json_decode($invoice->future_product_packages_quantities, true) ?? [];
            $title = 'Confirm!';
            $text = "Are you sure you want to save this?";
            confirmDelete($title, $text);
            return view('pages.deliver.invoice.show',compact('invoice', 'packages_main', 'packages_future', 'selectedMainPackages', 'selectedFuturePackages'));
        }
        
        

public function delive_print_show(Request $request, $id)
{
    $invoice = Invoice::with('companies')->findOrFail($id);
    
    $invoice->remark = $request->remark;
    $invoice->deliver_id = Auth::id();
    $invoice->save();

    $invoice['date'] = '';

    return view('pdf.invoiceShow', compact('invoice'));
}

        
    
}
