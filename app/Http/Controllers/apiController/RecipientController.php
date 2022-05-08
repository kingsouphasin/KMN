<?php

namespace App\Http\Controllers\apiController;

use App\Http\Controllers\Controller;
use App\Models\Recipient;
use Illuminate\Http\Request;

class RecipientController extends Controller
{
    public function insert(Request $request){
        $recipient = new Recipient();
        $recipient->name = $request->recipient_name;
        $recipient->surname = $request->recipient_surname;
        $recipient->tel = $request->recipient_tel;
        $recipient->address = $request->recipient_address;
        $recipient->save();

        return response('success', 200);
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