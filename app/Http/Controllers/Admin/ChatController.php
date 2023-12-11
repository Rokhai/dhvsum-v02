<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Musonza\Chat\Facades\ChatFacade as Chat;
use Illuminate\Http\Request;
/**
 * Class ChatController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ChatController extends Controller
{
    public function index($id)
    {
        // $id = 4;
        $user = \App\Models\User::find($id);

        $participants = [$user, backpack_user()];

        // Check if a conversation already exists
        $existingConversation = Chat::conversations()->between($user, backpack_user());

        $conversation = null;

        if (!$existingConversation) {
            // Create a new chat
            $conversation = Chat::makeDirect()
                ->createConversation($participants);
        } else {
            $conversation = $existingConversation;
        }


        // $messageContent = "Hello, dajshdjkahskjdh is a test message!";
        // $message = Chat::message($messageContent)
        //     ->from($user)
        //     ->to($conversation)
        //     ->send();
        // $conversations = Chat::conversations(Chat::conversations()->conversation)
        //     ->setParticipant($participants)
        //     ->get()
        //     ->toArray()['data'];

        // $conversations = Arr::pluck($conversations, 'conversation_id');

        // $data = [
        //     'conversations' => array_map('intval', $conversations),
        //     'participant' => [
        //         'id' => auth()->user()->id,
        //         'type' => get_class(auth()->user())
        //     ]
        // ];


        // Get the conversation by ID
        // $conversationId = $conversation->id;
        

        return view('admin.chat', [
            'title' => 'Chat',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Chat' => false,
            ],
            'page' => 'resources/views/admin/chat.blade.php',
            'controller' => 'app/Http/Controllers/Admin/ChatController.php',
            'conversation' => $conversation,
            'user' => $user,
        ]);
    }

    public function reply(Request $request) {
        $user = \App\Models\User::find($request->user_id);

        $participants = [$user, backpack_user()];

        // Check if a conversation already exists
        $existingConversation = Chat::conversations()->between($user, backpack_user());

        $conversation = null;

        if (!$existingConversation) {
            // Create a new chat
            $conversation = Chat::makeDirect()
                ->createConversation($participants);
        } else {
            $conversation = $existingConversation;
        }

        $message = Chat::message($request->message)
            ->from(backpack_user())
            ->to($conversation)
            ->send();

        if (!$message) {
            return  redirect()->back()->with('error', 'Message not sent');
           
        } 
        // else {
        // }

        return redirect()->back();
    }
}
