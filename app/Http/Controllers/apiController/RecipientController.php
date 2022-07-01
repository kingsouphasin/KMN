<?php

namespace App\Http\Controllers\apiController;

use App\Http\Controllers\Controller;
use App\Models\Recipient;
use Illuminate\Http\Request;

class RecipientController extends Controller
{
    public function insert(Request $request){

        $request->validate([
            'recipient_name' => 'required|string',
            'recipient_surname' => 'required|string',
            'recipient_tel' => 'required|string',
            'recipient_address' => 'required|string',
        ]);
        $recipient = new Recipient();
        $recipient->name = $request->recipient_name;
        $recipient->surname = $request->recipient_surname;
        $recipient->tel = $request->recipient_tel;
        $recipient->address = $request->recipient_address;
        $recipient->save();

        $response = [
            'Recipient' => $recipient
        ];
        return response($response);
    }
    public function show($id){
        $recipient = Recipient::find($id);
        return $recipient;
    }
    public function edit(Request $request, $id){
        $recipient = Recipient::find($id);
        $recipient->update($request->all());

        return $recipient;
    }
    public function delete($id){
        $recipient = Recipient::destroy($id);
        return response('Delete successful', 200);
    }
}