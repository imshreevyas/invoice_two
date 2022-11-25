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
        $data = Clients::orderByDesc('id')->paginate(15);
        return view('vendor.clients.clients')->with('data', $data);
    }

    public function allInvoice()
    {
        $data = Invoice::paginate(15);
        return view('vendor.invoice.invoices')->with('data', $data);
    }
    
    public function addInvoice()
    {
        $clients = Clients::select('client_name')->orderByDesc('id')->get();
        return view('vendor.invoice.addInvoice')->with('clients', $clients);
    }

    public function editInvoice($id)
    {
        return view('vendor.invoice.editInvoice');
    }

    public function invoicePreview()
    {
        $id = 4;
        $data = Invoice::find($id);
        return view('vendor.invoice.invoicePreview')->with('data', $data);
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
        ]);

        if (Clients::create([
            'client_name' => $request->client_name,
            'created_at' => date('Y-m-d H:i:s'),
            'status'      => 1
        ])) {
            return response()->json($this->response_array('success', ['New Added successful']));
        } else
            return response()->json($this->response_array('error', ['Something went Wrong.']));
    }

    public function edit_client(Request $request)
    {
        $data = $request->validate([
            'client_name' => 'required|string',
            'id'          => 'required',
            'status'      => 'required'
        ]);

        if (Clients::where('id', $request->id)->update([
            'client_name' => $request->client_name,
            'status'      => $request->status
        ]))
            return response()->json($this->response_array('success', ['Updated successful']));
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
        // dd($request->all());
        if (Invoice::create([
            'invoice_type' => $request->invoice_type == 0 ? 'Proforma Invoice' : ($request->invoice_type == 1 ? 'P.o Invoice' : 'Commercial Invoice'),
            'client_name' => $request->client_name == 0 ? $request->client_name_text_box : $request->client_name,
            'invoice_no' => $request->invoice_no,
            'invoice_date' => date('Y-m-d H:i:s', strtotime($request->invoice_date)),
            'po_number' => $request->po_number,
            'bill_to' => json_encode($request->bill_to),
            'ship_to' => '',
            'po_details' => '',
            'product_details' =>  json_encode($request->box),
            'notes' =>  json_encode($request->notes),
            'extra' =>  $request->extra,
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 1
        ])) {
            dd($this->response_array('success', ['New Added successful']));
        } else
            dd($this->response_array('success', ['error']));
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
