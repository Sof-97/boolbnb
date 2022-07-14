<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\ApartmentSponsorship;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Braintree\Gateway;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function sponsorship(Apartment $apartment)
    {
        $sponsorships = Sponsorship::all();

        return view('admin.apartments.sponsor', compact('sponsorships', 'apartment'));
    }

    public function payment(Request $request,  $ap_id, $sp_id)
    {
        $sponsorship = Sponsorship::where('id', '=', $sp_id)->first();
        $apartment = Apartment::where('id', '=', $ap_id)->first();
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'k27t9pcggf8nd87k',
            'publicKey' => 'f93xyphwqnt7vsg4',
            'privateKey' => 'd17ee649e85705797b1495224c580309'
        ]);
        $token = $gateway->clientToken()->generate();
        return view('admin.apartments.checkout',  compact('token', 'apartment', 'sponsorship'));
    }

    public function checkout(Request $request, Apartment $apartment, Sponsorship $sponsorship)
    {

        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'k27t9pcggf8nd87k',
            'publicKey' => 'f93xyphwqnt7vsg4',
            'privateKey' => 'd17ee649e85705797b1495224c580309'
        ]);

        $amount = $sponsorship->price;
        $nonce = $request->payment_method_nonce;
        $result = $gateway->transaction()->sale([
            'amount' => $amount,

            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true,
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;
            $newTransaction = new ApartmentSponsorship();
            $newTransaction->apartment_id = $apartment->id;
            $newTransaction->sponsorship_id = $sponsorship->id;
            $newTransaction->start = Carbon::now('Europe/Rome');
            $days = 1;
            switch ($sponsorship->id) {
                case 2:
                    $days = 3;
                    break;
                case 3:
                    $days = 6;
                    break;
            }
            $newTransaction->end = Carbon::now('Europe/Rome')->addDay($days);
            $newTransaction->save();
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
