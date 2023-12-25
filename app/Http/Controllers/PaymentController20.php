<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Course;
use App\Models\AppliedCourse;
use App\Models\User;
use App\Models\CohortCourse;
use Auth;

class PaymentController20 extends Controller
{
    public function makePayment(Request $request)
    {
        $request->validate([
            'amount' => 'required',
        ]);
        $referenceId = "OdumareTech" . rand(0, 100000000);
        $course_detail = Course::where('id', '=', $request->course_id)->first();
        $actual_cost = $course_detail->price;
        $discount_cost = $course_detail->discount;
        $paid_amount = $actual_cost - ($actual_cost * $discount_cost * 0.01);
        if ($request->payment_type == "first installment") {
            $amount = intval(0.4 * $paid_amount);
        } else {
            $amount = intval($paid_amount);
        }
        $check_if_attempt_made = Payment::where('user_email', '=', $request->user_email)->where('course_id', '=', $request->course_id)->first();
        $formData = [
            'email' => $request->user_email,
            'amount' => $amount * 100,
            'currency' => "NGN",
            'metadata' => ['referenceId' => $referenceId],
            'callback_url' => route('pay.callback')
        ];
        dd("i got here");
        if ($request->payment == "paystack") {
            $pay = json_decode($this->initializePaymentPaystack($formData));
            if ($pay) {
                if ($pay->status) {
                    if (!$check_if_attempt_made) {
                        $payment = new Payment;
                        $payment->referenceId = $referenceId;
                        $payment->payment = $request->payment;
                        $payment->amount = $amount;
                        $payment->cohort_id = $request->cohort_id;
                        $payment->user_email = $request->user_email;
                        $payment->status = "pending";
                        $payment->admission_status = "pending";
                        $payment->course_id = $request->course_id;
                        $payment->payment_type = $request->payment_type;
                        $payment->save();
                        return redirect($pay->data->authorization_url);
                    } else {
                        Payment::where('course_id', '=', $request->course_id)->where('user_email', '=', Auth::user()->email)->update(['referenceId' => $referenceId, 'amount' => $amount]);
                        return redirect($pay->data->authorization_url);
                    }
                } else {
                    $notification = array(
                        'message' => 'try again later',
                        'alert-type' => 'error'
                    );
                    return back()->with($notification);
                }

            } else {
                $notification = array(
                    'message' => 'No Network',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }

        }elseif ($request->payment == "stripe") {
            dd("i got here");
            $checkoutUrl = $this->generateCheckoutUrlStripe($amount * 100, 'usd', $request->user_email,  $referenceId);
            dd($checkoutUrl);
            if ($checkoutUrl) {
                return redirect($checkoutUrl);
            } else {
                $notification = array(
                    'message' => 'Try again later',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Select a payment option',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }


    public function get_user_id($email)
    {
        $user = User::where('email', $email)->select('id')->first();
        return $user ? $user->id : null;
    }

    public function payment_resolution($id)
    {
        Payment::where('id', $id)->update(['status' => "paid", 'admission_status' => 'accepted']);
        $get_payment_details = Payment::where('id', '=', $id)->first();
        $user_id = $this->get_user_id($get_payment_details->user_email);
        $applied_course = new AppliedCourse;
        $applied_course->user_id = $user_id;
        $applied_course->course_id = $get_payment_details->course_id;
        $applied_course->status = "pending";
        $applied_course->payment_type = $get_payment_details->payment_type;
        $applied_course->admission_status = "accepted";
        $applied_course->payment_id = $get_payment_details->id;
        $applied_course->save();

        $notification = array(
            'message' => 'Payment Resolved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }


    public function generateCheckoutUrlStripe($amount, $currency = 'usd', $email, $externalReference)
    {
        $checkoutData = [
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => $currency,
                        'unit_amount' => $amount,
                        'product_data' => [
                            'name' => 'Payment',
                        ],
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => 'http://localhost/success.php?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'http://localhost/cancel.php',
            'customer_email' => $email,
            'client_reference_id' => $externalReference,
        ];

        $checkoutSession = $this->createCheckoutSessionStripe($checkoutData);

        if (isset($checkoutSession['id'])) {
            return $checkoutSession['url'];
        } else {
            echo "Failed to create Checkout Session: " . json_encode($checkoutSession);
            return null;
        }
    }

    private function createCheckoutSessionStripe($data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.stripe.com/v1/checkout/sessions");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_USERPWD, $this->apiKey . ":");
        $headers = array();
        $headers[] = "Content-Type: application/x-www-form-urlencoded";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return json_decode($result, true);
    }


    public function initializePaymentPaystack($formData)
    {
        $url = "https://api.paystack.co/transaction/initialize";
        $field_string = http_build_query($formData);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $field_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
            "Cache-control: no-cache"
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function verifyPaymentPaystack($reference)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
                "Cache-control: no-cache"
            )
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function paymentCallbackPaystack()
    {
        $response = json_decode($this->verifyPayment(request('reference')));

        $data = $response->data;
        $reference = $data->reference;
        // dd($reference);
        $referenceId = $data->metadata->referenceId;
        // dd($bookingId);
        if ($response) {

            Payment::where('referenceId', $referenceId)->update(['status' => "paid", 'admission_status' => 'accepted']);
            $get_payment_details = Payment::where('referenceId', '=', $referenceId)->first();
            $applied_course = new AppliedCourse;
            $applied_course->user_id = Auth::user()->id;
            $applied_course->course_id = $get_payment_details->course_id;
            $applied_course->status = "pending";
            $applied_course->payment_type = $get_payment_details->payment_type;
            $applied_course->admission_status = "accepted";
            $applied_course->cohort_id = $get_payment_details->cohort_id;
            $applied_course->payment_id = $get_payment_details->id;
            $applied_course->save();

            $notification = array(
                'message' => 'Payment successful',
                'alert-type' => 'success'
            );

            return redirect()->route('user.dashboard')->with($notification);
        } else {
            return back()->withError('something went wrong');
        }

    }

    public function transactions()
    {
        $payments = Payment::all();
        return view('admin.payment', compact('payments'));
    }

    public function transactions_user()
    {
        $payments = Payment::where('user_email', '=', Auth::user()->email)->where('status', '=', 'paid')->get();
        return view('user.payment', compact('payments'));
    }

    public function user_complete(Request $request, $id)
    {
        $payment_details = Payment::findOrFail($id);
        if ($request->payment == "paystack") {
            $course_detail = Course::where('id', '=', $request->course_id)->first();
            $get_user_detail = AppliedCourse::where('user_id', '=', Auth::user()->id)->where('course_id', '=', $request->course_id)->first();
            $get_actual_cost = CohortCourse::where('course_id', '=', $request->course_id)->where('cohort_id', '=', $get_user_detail->cohort_id)->first();

            if (!$get_actual_cost) {
                $notification = array(
                    'message' => 'Please reach out to admin for assistance',
                    'alert-type' => 'error'
                );

                return back()->with($notification);
            }
            $actual_cost = $get_actual_cost->price;
            $discount_cost = $course_detail->discount;
            $paid_amount = $actual_cost - ($actual_cost * $discount_cost * 0.01);

            if ($request->has('second')) {
                $amount = 0.3 * $paid_amount;
                $payment_update = "second installment";
            } elseif ($request->has('third')) {
                $amount = 0.3 * $paid_amount;
                $payment_update = "full";
            } elseif ($request->has('second_third')) {
                $amount = 0.6 * $paid_amount;
                $payment_update = "full";
            }


            $payment_type = $payment_details->payment_type;
            if ($payment_type == "first installment" && $request->has('third')) {
                $notification = array(
                    'message' => 'You need to pay the second installment first',
                    'alert-type' => 'error'
                );

                return back()->with($notification);
            }

            if ($payment_type == "second installment" && $request->has('second')) {
                $notification = array(
                    'message' => 'you have already pay for the second installment',
                    'alert-type' => 'error'
                );

                return back()->with($notification);
            }

            if ($payment_type == "second installment" && $request->has('second_third')) {
                $notification = array(
                    'message' => 'You only need pay the third installment, dont over pay',
                    'alert-type' => 'error'
                );

                return back()->with($notification);
            }

            $formData = [
                'email' => $payment_details->user_email,
                'amount' => $amount * 100,
                'currency' => "NGN",
                'metadata' => ['referenceId' => $payment_details->referenceId, 'payment_type' => $payment_update],
                'callback_url' => route('pay.callback.user.complete')
            ];

            $pay = json_decode($this->initializePayment($formData));
            if ($pay) {
                if ($pay->status) {
                    return redirect($pay->data->authorization_url);
                } else {
                    $notification = array(
                        'message' => 'try again later',
                        'alert-type' => 'error'
                    );

                    return back()->with($notification);
                }

            } else {
                return back()->withError('something went wrong');
            }

        } else {

        }
    }


    public function user_complete_callback()
    {
        $response = json_decode($this->verifyPayment(request('reference')));

        $data = $response->data;
        $reference = $data->reference;
        $referenceId = $data->metadata->referenceId;
        $payment_update = $data->metadata->payment_type;
        if ($response) {
            Payment::where('referenceId', $referenceId)->update(['status' => "paid", "payment_type" => $payment_update, "admission_status" => "accepted"]);
            $get_payment_details = Payment::where('referenceId', '=', $referenceId)->first();

            $get_user_detail = AppliedCourse::where('user_id', '=', Auth::user()->id)->where('course_id', '=', $get_payment_details->course_id)->first();
            $get_actual_cost = CohortCourse::where('course_id', '=', $get_user_detail->course_id)->where('cohort_id', '=', $get_user_detail->cohort_id)->first();
            $actual_cost = $get_actual_cost->price;
            $course_detail = Course::where('id', '=', $get_user_detail->course_id)->first();

            $discount_cost = $course_detail->discount;
            $paid_amount = $actual_cost - ($actual_cost * $discount_cost * 0.01);

            if ($payment_update == "second installment") {
                Payment::where('referenceId', '=', $referenceId)->update(['amount' => 0.7 * $paid_amount]);
            } else {
                Payment::where('referenceId', '=', $referenceId)->update(['amount' => $paid_amount]);
            }

            AppliedCourse::where('payment_id', '=', $get_payment_details->id)->update(['payment_type' => $payment_update, 'admission_status' => 'accepted']);

            $notification = array(
                'message' => 'Payment successful',
                'alert-type' => 'success'
            );

            return redirect()->route('transaction.user.all')->with($notification);
        } else {
            return back()->withError('something went wrong');
        }

    }

}
