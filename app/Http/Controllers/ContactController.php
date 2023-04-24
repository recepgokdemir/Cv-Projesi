<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $list = Contact::all();

        return view('admin.contact.list', compact('list'));
    }
    public function delete(Request $request)
    {
        $contactID = $request->contactID;

        $contact = Contact::query()
            ->where("id", $contactID)
            ->first();
        if ($contact) {
            $contact->delete();
            return response()
                ->json(['status' => "success", "message" => "Başarılı", "data" => ""])
                ->setStatusCode(200);
        }
        return response()
            ->json(['status' => "error", "message" => "Mesaj bilgileri bulunamadı"])
            ->setStatusCode(404);
    }
}
