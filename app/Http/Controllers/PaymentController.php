<?php

namespace App\Http\Controllers;
//require_once('vendor/autoload.php');

use Illuminate\Http\Request;
use Vendor\Autoload;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comerce.payment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_fALLH5Gja0stXYzZMhK7Ract');

        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

        $first_name = $POST['first_name'];
        $last_name = $POST['last_name'];
        $email = $POST['email'];
        $token = $POST['stripeToken'];
        $price = $POST['price'];

        echo $token;

        //Create Customer in Stripe
        $customer = \Stripe\Customer::create(array(
            "email" => $email,
            "source" => $token
        ));

        //Charge Customer
        $charge = \Stripe\Charge::create(array(
            "amount" => $price,
            "currency" => "usd",
            "description" => "Intro To React Course",
            "customer" => $customer->id
        ));

        return redirect()->route('cart.index');
    }
}
