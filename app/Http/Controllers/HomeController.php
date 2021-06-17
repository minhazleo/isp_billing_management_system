<?php

namespace App\Http\Controllers;

use DateTime;
use App\Package;
use App\Transaction;
use App\User;
use App\Staff;
use App\Client;
use Illuminate\Http\Request;

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
    public function index()
    {
        return view('home');
    }

    public function showUserProfile()
    {
        return view('profile');
    }

    public function showPackages()
    {
        $packages = Package::latest()->get();
        return view('sb_packages')->with('packages', $packages);
    }

    public function createPackage(Request $request)
    {
        $request->validate([
            'profile_name' => 'required|string|max:100',
            'package_name' => 'required|string|max:100',
            'upload_speed' => 'required|integer',
            'download_speed' => 'required|integer',
            'connection_type' => 'required|in:PPoE,HotSpot',
            'price' => 'required|integer',
        ]);

        Package::create([
            'name' => request('profile_name'),
            'title' => request('package_name'),
            'download' => request('upload_speed'),
            'upload' => request('download_speed'),
            'type' => request('connection_type'),
            'price' => request('price'),
        ]);

        return back();
    }

    public function showClients()
    {
        $packages = Package::all();
        // $users = User::where('type', 'client')->latest()->get();
        $users = User::join('clients', 'clients.user_id', '=', 'users.id')->join('packages', 'clients.package_id', '=', 'packages.id')->where('users.type', 'client')->select('users.*','clients.*','packages.name as package_name','packages.title as package_title','packages.download as package_download', 'packages.upload as package_upload', 'packages.type as package_type', 'packages.price as package_price')->orderByDesc('users.created_at')->get();
        return view('sb_user_clients')->with([
            'packages' => $packages,
            'users' => $users,
        ]);
    }

    public function createClient(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100|unique:users,email',
            'password' => 'required|min:8',
            'account_status' => 'required|in:active,inactive',
            'phone' => 'required|integer',
            'package' => 'required|string',
            'company_name' => 'nullable|string|max:100',
            'country' => 'required|string|max:100',
            'address' => 'required|string|max:150',
            'zip_code' => 'required|integer',
        ]);

       $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'phone' => request('phone'),
            'company_name' => request('company_name'),
            'country' => request('country'),
            'address' => request('address'),
            'zip_code' => request('zip_code'),
            'type' => 'client',
        ]);
        
        Client::create([
            'user_id' => $user->id,
            'package_id' => request('package'),
        ]);

        return back();
    }

    public function showResellers()
    {
        $users = User::where('type', 'reseller')->latest()->get();
        return view('sb_user_resellers')->with('users', $users);
    }

    public function createReseller(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100|unique:users,email',
            'password' => 'required|min:8',
            'account_status' => 'required|in:active,inactive',
            'phone' => 'required|integer',
            'company_name' => 'nullable|string|max:100',
            'country' => 'required|string|max:100',
            'address' => 'required|string|max:150',
            'zip_code' => 'required|integer',
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'phone' => request('phone'),
            'company_name' => request('company_name'),
            'country' => request('country'),
            'address' => request('address'),
            'zip_code' => request('zip_code'),
            'type' => 'reseller',
        ]);
        return back();
    }

    public function showStaff()
    {
        $users = User::join('staff', 'staff.user_id', '=', 'users.id')->where('users.type', 'staff')->orderByDesc('users.created_at')->get();
        return view('sb_user_staff')->with('users', $users);
    }

    public function createStaff(Request $request){
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100|unique:users,email',
            'password' => 'required|min:8',
            'account_role' => 'required|in:Technician,Manager',
            'salary' => 'required|integer',
            'account_status' => 'required|in:active,inactive',
            'phone' => 'required|integer',
            'country' => 'required|string|max:100',
            'address' => 'required|string|max:150',
            'zip_code' => 'required|integer',
        ]);
        
        $account_status = false;
        if (request('account_status') == 'active') {
            $account_status = true;
        }
        
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'phone' => request('phone'),
            'country' => request('country'),
            'address' => request('address'),
            'zip_code' => request('zip_code'),
            'type' => 'staff',
            'active' => $account_status,
        ]);

        Staff::create([
            'user_id' => $user->id,
            'role' => request('account_role'),
            'salary' => request('salary'),
        ]);
        return back();
    }

    public function showIncome()
    {
        $incomes = Transaction::where('trans_type', 'income')->latest()->get();
        return view('sb_trans_income')->with('incomes', $incomes);

    }

    public function newIncome(Request $request){
        $request->validate([
            'amount' => 'required',
            'type' => 'required|in:Installation,Monthly Payment,Customer Service,Product Selling,Other',
            'payment_type' => 'required|in:Bkash,Rocket,Nagad,Bank',
            'date' => 'required|date',
            'invoice' => 'required',
            'note' => 'required',
        ]);

        $date = new DateTime(request('date'));

        Transaction::create([
            'price' => request('amount'),
            'type' => request('type'),
            'payment_type' => request('payment_type'),
            'invoice' => request('invoice'),
            'date' => $date->format("Y/m/d H:i:s"),
            'note' => request('note'),
            'trans_type' => 'income',
        ]);
        return back();
    }

    public function showExpenses()
    {
        $expenses = Transaction::where('trans_type', 'expense')->latest()->get();
        return view('sb_trans_expenses')->with('expenses', $expenses);
    }

    public function newExpenses(Request $request){

        $request->validate([
            'amount' => 'required',
            'type' => 'required|in:Installation,Monthly Payment,Customer Service,Product Selling,Other',
            'payment_type' => 'required|in:Bkash,Rocket,Nagad,Bank',
            'date' => 'required|date',
            'invoice' => 'required',
            'note' => 'required',
        ]);

        $date = new DateTime(request('date'));

        Transaction::create([
            'price' => request('amount'),
            'type' => request('type'),
            'payment_type' => request('payment_type'),
            'invoice' => request('invoice'),
            'date' => $date->format("Y/m/d H:i:s"),
            'note' => request('note'),
            'trans_type' => 'expense',
        ]);
        return back();
    }

    public function showTickets()
    {
        return view('sb_option_tickets');
    }

    public function showReports()
    {
        return view('sb_option_reports');
    }

    public function showSettings()
    {
        return view('sb_option_settings');
    }
}
