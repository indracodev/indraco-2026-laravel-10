<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function about() { return view('pages.about'); }
    public function businesses() { return view('pages.businesses'); }
    public function stores() { return view('pages.stores'); }
    public function download() { return view('pages.download'); }
    public function career() { return view('pages.career'); }
    public function contact() {
        return view('pages.contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|max:255',
            'phone'                 => 'nullable|string|max:50',
            'subject'               => 'nullable|string|max:255',
            'message'               => 'required|string',
            'g-recaptcha-response'  => 'required|string',
        ], [
            'required'                          => __('contact_error_validation'),
            'g-recaptcha-response.required'     => __('contact_error_captcha'),
        ]);

        // Verify reCAPTCHA with Google
        $recaptchaSecret = config('recaptcha.secret_key');
        $recaptchaResponse = $request->input('g-recaptcha-response');

        $verifyResponse = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret'   => $recaptchaSecret,
                'response' => $recaptchaResponse,
                'remoteip' => $request->ip(),
            ]
        );

        $verifyData = $verifyResponse->json();

        if (empty($verifyData['success']) || $verifyData['success'] !== true) {
            return back()->withInput()->with('error', __('contact_error_captcha'));
        }

        try {
            \Illuminate\Support\Facades\DB::table('master_kontak')->insert([
                'nama'        => strip_tags(trim($request->name)),
                'email'       => strip_tags(trim($request->email)),
                'telepon'     => strip_tags(trim($request->phone)),
                'judul_pesan' => strip_tags(trim($request->subject)),
                'pesan'       => strip_tags(trim($request->message)),
            ]);

            return back()->with('success', __('contact_success_msg'));
        } catch (\Exception $e) {
            return back()->withInput()->with('error', __('contact_error_sys'));
        }
    }

    public function equipment() { return view('pages.equipment'); }
    public function foodservice() { return view('pages.foodservice'); }
    public function privacy() { return view('pages.privacy'); }
    public function terms() { return view('pages.terms'); }

    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        return back()->with('success', 'Terima kasih telah berlangganan!');
    }
}
