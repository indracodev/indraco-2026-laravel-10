<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Alamat email tidak valid.'
            ], 400);
        }

        $email = $request->email;

        try {
            $subscription = Subscription::where('email', $email)->first();

            if ($subscription) {
                $subscription->update([
                    'subrek' => 'subscribed'
                ]);
            } else {
                Subscription::create([
                    'email' => $email,
                    'nama' => '-',
                    'status' => 'sudah',
                    'subrek' => 'subscribed'
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil berlangganan newsletter!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan pada database.'
            ], 500);
        }
    }
}
