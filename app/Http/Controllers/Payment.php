<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Billing\Mpesa;
use App\MpesaTransaction;
use App\PaymentDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Throwable;

class Payment extends Controller
{

    function mpesa_stkpush_callback(Request $request)
    {
        try {
            $post_data = Mpesa::get_data_from_callback();
            Log::critical("Processed Response".$post_data);
            $processed_response = Mpesa::process_stkpush_request_callback($post_data);
            Log::critical("Processed Response".$processed_response);
            $status = $processed_response->ResultCode === 0 ? 'success' : 'fail';
            MpesaTransaction::where('MerchantRequestID',$processed_response->MerchantRequestID)
                ->where('CheckoutRequestID',$processed_response->CheckoutRequestID)
                ->update(['status'=>$status]);
            Log::critical("Status: ".$status);
            if ($status === 'success') {
                $transaction = MpesaTransaction::where('MerchantRequestID',$processed_response->MerchantRequestID)
                    ->where('CheckoutRequestID',$processed_response->CheckoutRequestID)
                    ->get();
                Log::critical("Transaction:".$transaction);
                $payment_detail = [
                    'user_id' => $transaction[0]['user_id'],
                    'amount_paid' => $processed_response->Amount,
                    'payment_reference' => $processed_response->MpesaReceiptNumber,
                    'created_at'=>now()->format('Ymdhis')
                ];
                PaymentDetail::create($payment_detail);
                Appointment::where('user_id',$transaction[0]['user_id'])
                    ->update(['has_paid'=>true]);
                if ($transaction){
                    Log::debug("Payment Successful");
                }
            }
            Mpesa::finish_transaction();
        } catch (Throwable $th) {
            Mpesa::finish_transaction(false);
        }
    }

}
