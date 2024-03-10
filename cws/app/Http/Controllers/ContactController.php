<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Http\Request;



class ContactController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = $request->get('query');
        $perPage = $request->input('per_page', 5); // Default to 10 items per page if not specified
    
        if ($query) {
            $data = Contact::where('name', 'LIKE', "%$query%")->paginate($perPage);
        } else {
            $data = Contact::paginate($perPage);
        }
    
        return response()->json($data);

        // return response()->json(["data" => Contact::all()]);
    }

    public function manageMessage(Request $request){

        $query = $request->get('query');
        $perPage = $request->input('per_page', 5); // Default to 10 items per page if not specified
    
        if ($query) {
            $data = Contact::where('name', 'LIKE', "%$query%")->paginate($perPage);
        } else {
            $data = Contact::paginate($perPage);
        }
    
        return response()->json($data);
    
        
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->mobile_no = $request->input('mobile_no');
        $contact->message = $request->input('message');
        $contact->save();

        return response()->json(['message' => 'Contact stored successfully', 'data' => $contact], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(Contact $contact)
    {
        return response()->json(["data" => $contact]);
    }

    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
