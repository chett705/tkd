<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest('created_at')->paginate(20);

        return view('Backend.page.contact.contact-messages.index', compact('messages'));
    }

    public function show(string $id)
    {
        $message = ContactMessage::findOrFail($id);

        if ($message->status === 'new') {
            $message->update(['status' => 'read']);
        }

        return view('Backend.page.contact.contact-messages.show', compact('message'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'project_type' => 'required',
            'message' => 'required',
        ]);

        ContactMessage::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'project_type' => $request->project_type,
            'message' => $request->message,
            'status' => 'new',
        ]);

        return back()->with('success', 'Message sent successfully!');
    }

    public function update(Request $request, string $id)
    {
        $message = ContactMessage::findOrFail($id);

        $request->validate([
            'status' => 'required|in:new,read,replied,archived',
        ]);

        $message->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status updated.');
    }

    public function destroy(string $id)
    {
        ContactMessage::findOrFail($id)->delete();

        return redirect()->route('admin.contact-messages.index')->with('success', 'Message deleted.');
    }
}

