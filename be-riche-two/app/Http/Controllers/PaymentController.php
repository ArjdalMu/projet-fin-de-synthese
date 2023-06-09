<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use App\Models\Product;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;



use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;


class PaymentController extends Controller
{

    protected $apiContext;
    
    public function __construct()
    {
        // Set up PayPal API context with your credentials
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                env('PAYPAL_CLIENT_ID'),
                env('PAYPAL_SECRET')
            )
        );
    }

    public function createPayment($amount)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $totalAmount = floatval($amount);
        
        $amount = new Amount();
        $amount->setTotal($totalAmount); // Set the total amount for the payment
        $amount->setCurrency('USD'); // Set the currency
        
        $transaction = new Transaction();
        $transaction->setAmount($amount);
        
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(url('/payment/success'));
        $redirectUrls->setCancelUrl(url('/payment/cancel'));
        
        $payment = new Payment();
        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setTransactions([$transaction]);
        $payment->setRedirectUrls($redirectUrls);
        
        try {
            $payment->create($this->apiContext);
            
            // Redirect user to PayPal payment page
            return redirect($payment->getApprovalLink());
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Payment failed. Please try again.');
        }
    }
    
    public function paymentSuccess(Request $request)
    {
        // Handle successful payment response from PayPal
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
    
        // Execute the payment
        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);
    
        try {
            $result = $payment->execute($execution, $this->apiContext);
            // Process the payment success
            if ($result->getState() === 'approved') {
                // Get the cart items for the authenticated user
                $userId = auth()->user()->id;
                $cartItems = Cart::where('user_id', $userId)->get();
    
                // Loop through the cart items and create orders for each product
                foreach ($cartItems as $cartItem) {
                    $product = Product::find($cartItem->product_id);
    
                    // Create an order
                    $order = new Order();
                    $order->user_id = $userId;
                    $order->product_id = $product->id;
                    $order->quantity = $cartItem->quantity;
                    $order->total_price = $product->price;
                    $order->save();
    
                    // Decrement the product quantity
                    $product->quantity -= $cartItem->quantity;
                    $product->save();
                }
    
                // Clear the cart for the authenticated user
                Cart::where('user_id', $userId)->delete();
    
                return redirect()->route('buyer.profile')->with('message', 'Order Accepted. Thank You');
            }
        } catch (\Exception $ex) {
            return redirect()->route('buyer.profile')->with('danger', 'Order Declined ');
    
        }
    }

    
   


    


    
}
