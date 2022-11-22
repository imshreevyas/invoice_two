<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        return 'hi';
    }

    public function dashboard()
    {
        $vendorId = Auth::guard('vendor')->user()->id;
        return view('vendor.index');
    }

    public function login()
    {
        return view('vendor.auth.login');
    }

    public function allInvoice(){
        $data = Invoice::paginate(15);
        return view('vendor.invoice.invoices')->with('data', $data);
    }

    public function addInvoice(){
        return view('vendor.invoice.addInvoice');
    }

    public function editInvoice($id){
        return view('vendor.invoice.editInvoice');
    }

    public function profile(){
        return view('vendor.account.profile');
    }

    //  All POst Functions 
    public function validate_vendor(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        if (!Auth::guard('vendor')->attempt($credentials, false))
            return response()->json($this->response_array('error', ['Incorrect Credentials']));

        $id = Auth::guard('vendor')->user()->id;
        Vendor::find($id)->update(['last_login_ip' => $request->ip(), 'last_login_time' => date('Y-m-d H:i:s')]);

        return response()->json($this->response_array('success', ['Login successful']));
    }

    // Invoice Section 
    public function add_invoice(Request $request){
        // echo 'dsadas';
        // exit;
        dd($request->all());
    }

    
    public function edit_profile(Request $request){

    }

    public function logout()
    {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendorlogin');
    }

    // Helper Functions
    public function response_array($status, $message, $data = [])
    {
        return [
            'type' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }
}
