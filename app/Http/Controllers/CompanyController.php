<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Job;
use App\Models\Message;
use App\Models\Entry;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index', compact('user'));
    }

    public function job()
    {
        $jobs = Job::where('company_id', auth('companyUser')->user()->id)->get();
        return view('company.job.index', compact('jobs'));
    }

    public function jobCreate()
    {
        $categories = Category::all();
        return view('company.job.create', compact('categories'));
    }

    public function jobStore(Request $request)
    {
        $inputValues = $request->all();

        $jobs = new Job;
        $jobs->job = $inputValues['job'];
        $jobs->company_id = auth('companyUser')->user()->id;
        $jobs->title = $inputValues['title'];
        $jobs->detail = $inputValues['detail'];
        $jobs->save();

        $jobs->categories()->sync($inputValues['category_ids']);

        return redirect()->route('company.job');
    }

    public function detail($id)
    {
        $job = Job::findOrFail($id);

        return view('company.job.detail', compact('job'));
    }

    public function jobEdit($id)
    {
        $job = Job::findOrFail($id);
        $categories = Category::all();

        return view('company.job.edit', compact('job', 'categories'));
    }

    public function jobUpdate(Request $request, $id)
    {
        $job = $request->except(['category_ids']);

        unset($job['_token']);
        unset($job['_method']);

        Job::find($id)->categories()->sync($request['category_ids']);
        Job::where(['id' => $id])->update($job);

        return redirect()->route('company.job');
    }

    public function jobDelete($id)
    {
        $jobs = Job::findOrFail($id);
        $jobs->delete();

        return redirect()->route('company.job');
    }

    public function category()
    {
        $categories = Category::all();

        return view('company.category.index', compact('categories'));
    }

    public function categoryCreate()
    {
        return view('company.category.create');
    }

    public function categoryStore(Request $request)
    {
        $categories = new Category;
        $categories->name = $request->name;
        $categories->save();

        return redirect()->route('company.category');
    }

    public function categoryDelete($id)
    {
        $companies = Category::findOrFail($id);
        $companies->delete();

        return redirect()->route('company.category');
    }

    public function entry()
    {
        $entries = Entry::where('company_id', auth('companyUser')->user()->id)->get();

        return view('company.entry.index', compact('entries'));
    }

    public function message($id)
    {
        $messageList = [];

        if (Message::all() != null) {
            $messageList = Message::where('user_id', '=', $id)
            ->where('company_id', '=', auth('companyUser')->user()->id)
            ->get();
        }

        return view('company.entry.message', compact('id', 'messageList'));
    }

    public function messageStore(Request $request, $id)
    {
        $inputValues = $request->all();

        $messageList = new Message;
        $messageList->company_id = auth('companyUser')->user()->id;
        $messageList->name = auth('companyUser')->user()->name;
        $messageList->user_id = $id;
        $messageList->message = $inputValues['message'];
        $messageList->save();

        return redirect()->route('company.entry.message', compact('messageList', 'id'));
    }
}
