<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Product;

class ProductController extends Controller
{
    // ...

    public function show($id)
    {	
    	$product = Product::findorFail($id);
        $intent = auth()->user()->createSetupIntent();

        return view('frontend.coupons.show', compact('intent','product'));
    }

    public function purchase(Request $request,$id)
    {	
    	$product = Product::findorFail($id);
    	$user          = $request->user();
        // $stripeCustomer = $user->createAsStripeCustomer();
        // dd($stripeCustomer);
        $paymentMethod = $request->input('payment_method');
        // dd($request->all());
        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            // $user->updateDefaultPaymentMethodFromStripe();
            $user->charge($product->price * 100, $paymentMethod);        
        } catch (\Exception $exception) {
        	return back()->with('error', $exception->getMessage());
        }
        return redirect('home')->with('status', 'Product purchased successfully!');
    }

}