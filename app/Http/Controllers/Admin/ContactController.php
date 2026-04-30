<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $contacts = Contact::when($search, function($query) use ($search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('judul_pesan', 'like', "%{$search}%");
        })->latest('tanggal_kirim')->get();
        
        return view('admin.contacts.index', compact('contacts', 'search'));
    }

    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Pesan kontak berhasil dihapus.');
    }
}
