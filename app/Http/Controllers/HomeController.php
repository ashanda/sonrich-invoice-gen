<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\ProductPackage;
use App\Models\Invoice;

class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');

    }

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index(): View

    {

        return view('pages.agent.dashboard');

    } 

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

     public function adminHome(): View
     {
         $invoices = Invoice::all();
         $acc_checked = Invoice::where('account_departmet_checked', 'checked')->count();
         $printed = Invoice::where('deliver_departmet_checked', 'printed')->count();
         $acc_checked_print = Invoice::where('account_departmet_checked', 'unchecked')->where('deliver_departmet_checked', 'not printed')->count();
         $combinedData = [$printed,$acc_checked_print,$acc_checked,];
     
         // Calculate invoice count month-wise
         $invoiceCounts = [];
         foreach ($invoices as $invoice) {
             $createdAtMonth = date('M', strtotime($invoice->created_at));
             if (isset($invoiceCounts[$createdAtMonth])) {
                 $invoiceCounts[$createdAtMonth]++;
             } else {
                 $invoiceCounts[$createdAtMonth] = 1;
             }
         }
     
         return view('pages.admin.dashboard', compact('combinedData', 'acc_checked', 'printed', 'invoiceCounts'));
     }

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function managerHome(): View

    {

        return view('pages.account.dashboard');

    }


    public function deliverHome(): View
    {

        return view('pages.deliver.dashboard');

    }

}
