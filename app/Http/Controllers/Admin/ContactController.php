<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactSubmission::latest()->paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function markRead(ContactSubmission $contact)
    {
        $contact->update(['is_read' => true]);
        return back()->with('success', 'Marked as read.');
    }

    public function destroy(ContactSubmission $contact)
    {
        $contact->delete();
        return back()->with('success', 'Message deleted.');
    }
}
