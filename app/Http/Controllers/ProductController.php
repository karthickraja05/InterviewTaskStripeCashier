<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\Guest;

class ProductController extends Controller
{
    // ...

    public function show($id)
    {	
    	$product = Product::findorFail($id);
        if(auth()->user()){
            $intent = auth()->user()->createSetupIntent();
        }else{
            $guest = new Guest();
            $intent = $guest->createSetupIntent();
        }

        return view('frontend.coupons.show', compact('intent','product'));
    }

    public function purchase(Request $request,$id)
    {	
        $product = Product::findorFail($id);
    	$user = $request->user();
        $redirect = 'home';
        if(!$user){
            $user = new Guest();
            $user->name = $request->card_holder_name ?? 'Guest User';
            $redirect = '/';
        }
        
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
        return redirect($redirect)->with('status', 'Product purchased successfully!');
    }

}