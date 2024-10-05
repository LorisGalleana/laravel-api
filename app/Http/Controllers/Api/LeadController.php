<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;



class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $success = true;


        $validator = Validator::make($data,
            [
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:100',
                'message' => 'required|string|min:10',
            ],
            [
                'name.required' => 'Il campo nome è obbligatorio',
                'name.string' => 'Il campo nome deve essere una stringa',
                'name.max' => 'Il campo nome deve avere al massimo :max caratteri',
                'email.required' => 'Il campo email è obbligatorio',
                'email.email' => 'Il campo email deve essere un indirizzo email valido',
                'email.max' => 'Il campo email deve avere al massimo :max caratteri',
                'message.required' => 'Il campo messaggio è obbligatorio',
                'message.string' => 'Il campo messaggio deve essere una stringa',
                'message.min' => 'Il campo messaggio deve avere almeno :min caratteri',
            ]
        );
        if($validator->fails()){
            $success = false;
            $errors = $validator->errors();
            return response()->json(compact('success', 'errors'));
        }

        //salviamo il messaggio nel DB
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        //inviamo la mail
        Mail::to($new_lead->email)->send(new NewContact($new_lead));

        return response()->json(compact('success'));



    }
}
