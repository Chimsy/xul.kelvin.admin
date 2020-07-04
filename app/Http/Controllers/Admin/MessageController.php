<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Product;
use App\User;

class MessageController extends Controller
{

    public function getPrivateMessages()
    {
        abort_unless(\Gate::allows('product_access'), 403);

        $messages = DB::table('messages')
            ->where('msg_type', '=', 'private')
            ->where('msg_state', '=', 0)
            ->get();

        return view('admin.messages.index', compact('messages'));
    }

    public function getPublicMessages()
    {
        abort_unless(\Gate::allows('product_access'), 403);

        $messages = DB::table('messages')
            ->where('msg_type', '=', 'public')
            ->where('msg_state', '=', 0)
            ->get();

        return view('admin.messages.index_public', compact('messages'));
    }

    public function viewPublicMessages(Request $request)
    {
        abort_unless(\Gate::allows('product_edit'), 403);

        $my_id = $request->input('msg_id');
        $msg_id = DB::table('messages')
            ->where('id', '=', $my_id)
            ->get();

        return view('admin.messages.view_public_msg', compact('msg_id'));


    }

    public function editMessages(Request $request)
    {
        abort_unless(\Gate::allows('product_edit'), 403);

        $my_id = $request->input('msg_id');
        $msg_id = DB::table('messages')
            ->where('id', '=', $my_id)
            ->get();

        return view('admin.messages.edit', compact('msg_id'));


    }

    public function update(Request $request)
    {
        abort_unless(\Gate::allows('product_edit'), 403);

        Log::info($request);

        $id = $request->input('source_id');
        $msg_title = $request->input('msg_title');
        $msg_body = $request->input('msg_body');

        DB::table('messages')
            ->where('id', $id)
            ->update([
                'msg_title' => $msg_title,
                'msg_reply' => $msg_body,
                'msg_state' => 1,
            ]);

        return redirect()->route('admin.home');
    }

    public function create()
    {
        return view('admin.messages.create');
    }

    public function broadcast(Request $request)
    {
        $msg_title = $request->input('msg_title');
        $msg_body = $request->input('msg_body');

        DB::table('messages')->insert([
                'msg_title' => $msg_title,
                'msg_body' => $msg_body,
                'msg_type' => 'public',
                'reg_num' => 'R111855J',
        ]);
        Log::info($msg_title);
        Log::info($msg_body);


        return redirect()->route('admin.home');
    }


}
