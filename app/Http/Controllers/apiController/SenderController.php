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
        $sender = new Sender();
        $sender->name = $request->sender_name;
        $sender->surname = $request->sender_surname;
        $sender->tel = $request->sender_tel;
        $sender->address = $request->sender_address;
        $sender->save();

        $response = [
            'Sender' => $sender
        ];
        return response($response);
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
