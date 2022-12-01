<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Invoice;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        return 'hi';
    }

    public function dashboard()
    {
        $vendorData = Auth::guard('vendor')->user();
        return view('vendor.index')->with('vendor_data', $vendorData);
    }

    public function login()
    {
        if (Auth::guard('vendor')->user() != '')
            return redirect()->route('dashboard');
        else
            return view('vendor.auth.login');
    }

    public function allClients()
    {
        $data = Clients::orderByDesc('id')->paginate(15);
        $vendorData = Auth::guard('vendor')->user();
        return view('vendor.clients.clients')->with(['data' => $data, 'vendor_data' => $vendorData]);
    }

    public function allInvoice()
    {
        $data = Invoice::paginate(15);
        $vendorData = Auth::guard('vendor')->user();
        return view('vendor.invoice.invoices')->with(['data' => $data, 'vendor_data' => $vendorData]);
    }

    public function addInvoice()
    {
        $vendorData = Auth::guard('vendor')->user();
        $clients = Clients::select('client_name')->orderByDesc('id')->get();
        $invoiceData = Cache::get('addInvoiceData_' . $vendorData->id);
        return view('vendor.invoice.addInvoice')->with(['clients' => $clients, 'invoiceData' => $invoiceData, 'vendor_data' => $vendorData]);
    }

    public function editInvoice($id)
    {
        return view('vendor.invoice.editInvoice');
    }

    public function invoicePreview($id)
    {
        // $id = 4;
        $data = Invoice::find($id);
        $userData = Auth::guard('vendor')->user();
        $vendorData = Auth::guard('vendor')->user();
        return view('vendor.invoice.invoicePreview')->with(['data' => $data, 'user_data' => $userData, 'vendor_data' => $vendorData]);
    }


    public function createTemplate()
    {
        return view('vendor.template.createTemplate');
    }


    public function profile()
    {
        $vendorData = Auth::guard('vendor')->user();
        return view('vendor.profile.profile')->with(['vendor_data' => $vendorData]);
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
        $id = Auth::guard('vendor')->user()->id;
        dd($request->all());

        $data = [
            'invoice_type' => $request->invoice_type,
            'client_name' => $request->client_name == 0 ? $request->client_name_text_box : $request->client_name,
            'invoice_no' => $request->invoice_no,
            'invoice_date' => date('Y-m-d H:i:s', strtotime($request->invoice_date)),
            'bill_to' => json_encode($request->bill_to),
            'ship_to' => '',
            'po_details' => json_encode($request->po_details),
            'product_details' =>  json_encode($request->box),
            'notes' =>  json_encode($request->notes),
            'extra' =>  json_encode($request->extra),
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 1
        ];

        Cache::forever('addInvoiceData_' . $id, $data);
        // Redis::set('addInvoiceData_'.$id, $data);

        if (Invoice::create($data)) {
            dd($this->response_array('success', ['New Added successful']));
        } else
            dd($this->response_array('error', ['Something went wrong']));
    }


    public function editProfile(Request $request)
    {
        // dd($request->all());
        $vendorData = Auth::guard('vendor')->user();
        $data  = [
            'company_name' => $request->company_name,
            'email' => $request->email,
            'office_no' => $request->office_no,
            'other_no' => $request->other_no,
            'office_address' => $request->office_address,
            'other_address' => $request->other_address,
            'bank_details' => $request->bank_details,
            'swift_bank_details' => $request->swift_bank_details,
            'city' => $request->city,
            'state' => $request->state,
        ];

        if (Vendor::find($vendorData->id)->update($data)){
            session(['type' => 'success', 'msg' => ["Profile Updated Successfully"]]);
            return redirect()->route('profile');
        }else{
            session(['type' => 'error', 'msg' => ["Please Select Profile Photo"]]);
            return redirect()->route('profile');
        }
    }

    public function update_logo(Request $request)
    {
        $vendorData = Auth::guard('vendor')->user();
        if ($request->logo == '') {
            session(['type' => 'error', 'msg' => ["Please Select Profile Photo"]]);
            return redirect()->route('profile');
        }

        $img_name = time() . '.' . $request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('img/'), $img_name);
        $imagePath = 'public/img/' . $img_name;

        $data = [
            'logo' => $imagePath,
        ];

        if (Vendor::find($vendorData->id)->update($data))
            return $this->response_array('success', ['New Added successful']);
        else
            return $this->response_array('error', ['Something went wrong']);
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
