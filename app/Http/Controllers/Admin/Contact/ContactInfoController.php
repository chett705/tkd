<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
         $info = ContactInfo::first();

        if (!$info) {
            $info = new ContactInfo();
        }

        return view('backend.page.contact.contact-info.index', compact('info'));
    }

    public function storeOrUpdate(Request $request)
    {
        $data = $request->validate([
            'address'       => 'nullable|string',
            'email'         => 'nullable|email',
            'phone_1'       => 'nullable|string',
            'phone_2'       => 'nullable|string',
            'working_hours' => 'nullable|string',
        ]);

        $info = ContactInfo::first();

        if ($info) {
            $info->update($data);
        } else {
            ContactInfo::create($data);
        }

        return redirect()->back()->with('success', 'Contact info updated successfully.');
    }
}
