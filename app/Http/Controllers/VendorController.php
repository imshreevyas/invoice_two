<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Invoice;
use App\Models\Clients;
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

    public function allClients()
    {
        $data = Clients::paginate(15);
        return view('vendor.clients.clients')->with('data', $data);
    }

    public function addClient()
    {
        return view('vendor.clients.addClient');
    }

    public function allInvoice()
    {
        $data = Invoice::paginate(15);
        return view('vendor.invoice.invoices')->with('data', $data);
    }

    public function addInvoice()
    {
        return view('vendor.invoice.addInvoice');
    }

    public function editInvoice($id)
    {
        return view('vendor.invoice.editInvoice');
    }

    public function profile()
    {
        return view('vendor.account.profile');
    }

    //  All Post Functions 
    public function add_client(Request $request)
    {
        $data = $request->validate([
            'client_name' => 'required|string',
            'id'          => 'required',
            'status'      => 'required'
        ]);

        if (Clients::create([
            'client_name' => $request->client_name,
            'status'      => $request->status
        ])) {
            return response()->json($this->response_array('success', ['Updated successful']));
        } else
            return response()->json($this->response_array('error', ['Something went Wrong.']));
    }

    public function edit_client(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'client_name' => 'required|string',
            'id'          => 'required',
            'status'      => 'required'
        ]);

        if (Clients::where('id', $request->id)->update([
            'client_name' => $request->client_name,
            'status'      => $request->status
        ]))
            return response()->json($this->response_array('success', ['Added successful']));
        else
            return response()->json($this->response_array('error', ['Something went wrong!']));
    }

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
    public function add_invoice(Request $request)
    {
        // echo 'dsadas';
        // exit;
        dd($request->all());
    }


    public function edit_profile(Request $request)
    {
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
