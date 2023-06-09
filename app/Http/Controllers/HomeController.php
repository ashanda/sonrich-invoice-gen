<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\ProductPackage;

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

        return view('pages.admin.dashboard');

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
