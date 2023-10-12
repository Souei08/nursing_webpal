<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ User, SubjectCode, Conversation, Message, Participant };
use App\Events\MessageEvent;
use App\Http\Requests\{ InboxRequest };
use Carbon\Carbon;

class InboxController extends Controller
{
    public function index(Request $request)
    {
        $allUsers = User::where('id', '!=' , $request->user()->id)->orderBy('first_name', 'ASC')->get();
        $query = Conversation::with('participants')->orderBy('updated_at', 'DESC');
        $query->whereHas('participants', function($query) use ($request) {
            $query->where(['user_id' => $request->user()->id])->whereNull('archived_at');
        });

        return view('inbox.index', [
            'conversations' => $query->get(),
            'all_users' => $allUsers,
        ]);
    }

    public function create(InboxRequest $request)
    {
        $conversation = Conversation::create(['name' => $request->name ?? null]);
        $conversation->participants()->create(['user_id' => $request->user()->id]);

        foreach (($request->recipients ?? []) as $recipient) {
            if (str_contains($recipient, 'user-')) {
                $userId = str_replace('user-', '', $recipient);
                $conversation->participants()->create(['user_id' => $userId]);
            }
            if (str_contains($recipient, 'subject-code-')) {
                $subjectCodeId = str_replace('subject-code-', '', $recipient);
                $subjectCode = SubjectCode::find($subjectCodeId);

                foreach (($subjectCode->students ?? []) as $student) {
                    $conversation->participants()->create(['user_id' => $student->user_id]);
                }
            }
        }

        $conversation->messages()->create([
            'user_id' => $request->user()->id,
            'message' => $request->message,
        ]);

        return response()->json([
            'redirect_url' => redirect(route('inbox.show', $conversation->id))->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
            'dont_show_alert' => true,
        ], 200);
    }

    public function update($id, Request $request)
    {
        $conversation = Conversation::find($id);

        $conversation->update($request->all());

        if (! empty($request->name)) {
            $conversation->messages()->create([
                'user_id' => 1,
                'message' => $request->user()->first_name.' '.$request->user()->last_name.' renamed the conversation to "'.$request->name.'".',
            ]);
        }

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200); 
    }

    public function show($id, Request $request)
    {
        $conversation = Conversation::with(['participants', 'messages.user'])->find($id);
        $allUsers = User::where('id', '!=' , $request->user()->id)->orderBy('first_name', 'ASC')->get();
        $query = Conversation::with('participants')->orderBy('updated_at', 'DESC');
        $query->whereHas('participants', function($query) use ($request) {
            $query->where(['user_id' => $request->user()->id])->whereNull('archived_at');
        });

        return view('inbox.index', [
            'conversations' => $query->get(),
            'conversation' => $conversation,
            'all_users' => $allUsers,
        ]);
    }

    public function send($id, Request $request)
    {
        $conversation = Conversation::with(['participants', 'messages.user'])->find($id);

        $message = $conversation->messages()->create([
            'user_id' => $request->user()->id,
            'message' => $request->message,
        ]);

        $message  = Message::with(['user'])->find($message->id);

        $conversation->touch();
        $conversation->participants()->touch();

        broadcast(new MessageEvent($message))->toOthers();

        return $message;
    }

    public function leave($id, Request $request)
    {
        $conversation->messages()->create([
            'user_id' => 1,
            'message' => $request->user()->first_name.' '.$request->user()->last_name.' leaved the conversation.',
        ]);

        Participant::where(['conversation_id' => $id, 'user_id' => $request->user()->id])->delete();

        return redirect(route('inbox.index'));
    }

    public function delete($id, Request $request)
    {
        Participant::where([
            'conversation_id' => $id, 
            'user_id' => $request->user()->id, 
        ])->update(['archived_at' => Carbon::now()]);

        return redirect(route('inbox.index'));
    }

    public function add($id, $userId, Request $request)
    {
        $conversation = Conversation::with(['participants', 'messages.user'])->find($id);

        if (! $conversation->participants()->where(['user_id' => $userId])->first()) {
            $participant = $conversation->participants()->create(['user_id' => $userId]);

            $conversation->messages()->create([
                'user_id' => 1,
                'message' => $participant->user->first_name.' '.$participant->user->last_name.' added by '.$request->user()->first_name.' '.$request->user()->last_name.' to the conversation.',
            ]);
        }

        return redirect(route('inbox.show', $conversation->id));
    }
}