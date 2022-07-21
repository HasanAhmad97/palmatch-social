<?php

namespace App\Http\Controllers\Admin;

use App\ContactUs;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\ContactEloquent;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(ContactEloquent $contact)
    {
        $this->contact = $contact;
    }

    public function index()
    {
        return view(admin_vw() . '.contactus.index');
    }


    public function anyData()
    {
        return $this->contact->anyData();
    }


    public function delete($id)
    {
        return $this->contact->delete($id);
    }
}
