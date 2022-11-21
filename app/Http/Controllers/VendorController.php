<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request){
        return 'hi';
    }

    public function dashboard(){
        $vendorId = Auth::guard('vendor')->user()->id;
        return view('vendor.index');
    }

    public function login(){
        return view('vendor.auth.login');
    }

    public function validate_vendor(Request $request){
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

    public function logout(){
        Auth::guard('vendor')->logout();
        return redirect()->route('vendorlogin');
    }

    // Helper Functions
    public function response_array($status, $message, $data = []){
        return [
            'type' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
