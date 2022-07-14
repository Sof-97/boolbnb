<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Braintree\Gateway;

class PaymentController extends Controller
{
    public function sponsorship(Apartment $apartment)
    {
        $sponsorships = Sponsorship::all();

        return view('admin.apartments.sponsor', compact('sponsorships', 'apartment'));
    }

    public function payment(Request $request,  $ap_id, $sp_id)
    {
        dump($ap_id);
        dump($sp_id);
        $sponsorship = Sponsorship::where('id', '=', $sp_id)->first();
        $apartment = Apartment::where('id', '=', $ap_id)->first();
        dump($apartment);
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'k27t9pcggf8nd87k',
            'publicKey' => 'f93xyphwqnt7vsg4',
            'privateKey' => 'd17ee649e85705797b1495224c580309'
        ]);
        $token = $gateway->clientToken()->generate();
        return view('admin.apartments.checkout', [
            'token' => $token,
            'sponsorship' => $sponsorship,
            'apartment' => $apartment
        ]);
    }

    public function checkout(Sponsorship $sponsorship, Apartment $apartment, Request $request)
    {
        dd($apartment);
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'k27t9pcggf8nd87k',
            'publicKey' => 'f93xyphwqnt7vsg4',
            'privateKey' => 'd17ee649e85705797b1495224c580309'
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;
        $result = $gateway->transaction()->sale([
            'amount' => $request->$sponsorship->price,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true,
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;

            return back()->with('success_message', 'Transazione completata. ID: ' . $transaction->id);
        } else {
            $errorString = '';
            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Errore: ' . $error->code . ': ' . $error->message . '\n';
            }
            return back()->withErrors('Errore nella transazione: ' . $result->message);
        }
    }
}
