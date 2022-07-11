<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function NewMessage(Request $request)
    {
        $data = $request->all();

        $newmessage = new Message();

        $newmessage->fill($data);
        $newmessage->save();
        DB::table('messages')->insert($data);
    }

}