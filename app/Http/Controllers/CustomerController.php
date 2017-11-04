<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Hash;

class CustomerController extends Controller
{
    public function postCreateCustomer(Request $req)
    {
        $customer = new Customer();
        $customer->cus_name = $req->cus_name;
        $customer->cus_email = $req->cus_email;
        $customer->cus_password = Hash::make($req->cus_password);
        $customer->cus_address = $req->cus_address;
        $customer->cus_phone = $req->cus_phone;
        $customer->save();
        $customer_id = $customer->id;

        echo json_encode(Customer::find($customer_id));
    }
    public function postEditCustomer(Request $req)
    {
        $customer = Customer::findOrFail($req->id);
        $input = $req->all();
        $customer->fill($input)->save();

        echo json_encode(Customer::find($req->id));
    }
}
