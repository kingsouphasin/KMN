<?php

namespace App\Http\Controllers\apiController;

use App\Http\Controllers\Controller;
use App\Models\Sender;
use Illuminate\Http\Request;

class SenderController extends Controller
{
    public function insert(Request $request){

        $request->validate([
            'sender_name' => 'required|string',
            'sender_surname' => 'required|string',
            'sender_tel' => 'required|string',
            'sender_address' => 'required|string',
        ]);
        $recipient = new Sender();
        $recipient->name = $request->sender_name;
        $recipient->surname = $request->sender_surname;
        $recipient->tel = $request->sender_tel;
        $recipient->address = $request->sender_address;
        $recipient->save();

        return response('successful', 200);
    }
    public function show($id){
        $recipient = Sender::find($id);
        return $recipient;
    }
    public function edit(Request $request, $id){
        $recipient = Sender::find($id);
        $recipient->update($request->all());

        return $recipient;
    }
    public function delete($id){
        $recipient = Sender::destroy($id);
        return response('Delete successful', 200);
    }
}
