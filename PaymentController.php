<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alsharie\AlQutaibiBankPayment\AlQutaibiBank;

class PaymentController extends Controller
{
    public function requestPayment(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'account' => 'required',
            'amount' => 'required|numeric',
        ]);

        $phone   = $request->input('phone');
        $account = $request->input('account');
        $amount  = $request->input('amount');

        $alqutaibi = new AlQutaibiBank();

        $response = $alqutaibi
            ->setPaymentCustomerNo($phone)
            ->setPaymentCode($account)
            ->setPaymentAmount($amount)
            ->setPaymentCurr(1) // 1 = YER
            ->RequestPayment();

        if ($response->isSuccess()) {
            return response()->json([
                'status' => 'success',
                'transaction_id' => $response->getTransactionID(),
                'message' => 'تم إرسال طلب الدفع بنجاح، الرجاء إدخال رمز OTP',
            ]);
        }

        return response()->json([
            'status' => 'failed',
            'server_response' => $response->body(),
        ], 400);
    }

    public function confirmPayment(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'account' => 'required',
            'amount' => 'required|numeric',
            'otp' => 'required',
        ]);

        $phone   = $request->input('phone');
        $account = $request->input('account');
        $amount  = $request->input('amount');
        $otp     = $request->input('otp');

        $alqutaibi = new AlQutaibiBank();

        $response = $alqutaibi
            ->setPaymentCustomerNo($phone)
            ->setPaymentCode($account)
            ->setPaymentAmount($amount)
            ->setPaymentCurr(1)
            ->setPaymentOTP($otp)
            ->confirmPayment();

        if ($response->isSuccess()) {
            return response()->json([
                'status' => 'success',
                'transaction_id' => $response->getTransactionId(),
                'message' => 'تم تأكيد عملية الدفع بنجاح',
            ]);
        }

        return response()->json([
            'status' => 'failed',
            'server_response' => $response->body(),
        ], 400);
    }
}
