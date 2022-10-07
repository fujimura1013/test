<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\CompanyUser;
use App\Models\Entry;
use App\Models\Message;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\EntryMail;

class UserController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('user.index', compact('jobs'));
    }

    public function form($id)
    {
        $job = Job::find($id);
        $company = CompanyUser::find($job->company_id)->name;

        return view('user.form', compact('company', 'job'));
    }

    public function store(Request $request, $id)
    {
        $inputValues = $request->all();

        $entries = new Entry;
        $entries->user_id = auth('web')->user()->id;
        $entries->company_id = Job::find($id)->company_id;
        $entries->job_id = $id;
        $entries->name = $inputValues['name'];
        $entries->email = $inputValues['email'];
        $entries->ikigomi = $inputValues['ikigomi'];
        $entries->save();

        $name = $inputValues['name'];
        // $email = $inputValues['email'];
        $email = 'nf10131999@gmail.com';

        Mail::send(new EntryMail($name, $email));

        return redirect()->route('user.index');
    }

    public function message($id)
    {
        $messageList = [];

        if (Message::all() != null) {
            $messageList = Message::where('user_id', '=', auth('web')->user()->id)
            ->where('company_id', '=', $id)
            ->get();
        }

        return view('user.message', compact('id', 'messageList'));
    }

    public function messageStore(Request $request, $id)
    {
        $inputValues = $request->all();

        $messageList = new Message;
        $messageList->company_id = $id;
        $messageList->user_id = auth('web')->user()->id;
        $messageList->name = auth('web')->user()->name;
        $messageList->message = $inputValues['message'];
        $messageList->save();

        return redirect()->route('user.message', compact('messageList', 'id'));
    }
}
