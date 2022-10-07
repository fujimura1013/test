<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\Job;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function company()
    {
        $companies = CompanyUser::all();

        return view('admin.company.index', ['companies'=>$companies]);
    }

    public function create()
    {
        return view('admin.company.create');
    }

    public function store(Request $request)
    {
        $companies = new CompanyUser();
        $companies->name = $request->name;
        $companies->email = $request->email;
        $companies->password = Hash::make($request->password);
        $companies->save();

        return redirect()->route('admin.company');
    }

    public function delete($id)
    {
        $companies = CompanyUser::findOrFail($id);
        $companies->delete();

        return redirect()->route('admin.company');
    }

    public function edit($id)
    {
        $company = CompanyUser::findOrFail($id);

        return view('admin.company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = $request->all();
        $company['password'] = Hash::make($company['password']);
        unset($company['_token']);
        unset($company['_method']);
        CompanyUser::where(['id' => $id])->update($company);

        return redirect()->route('admin.company');
    }

    public function detail($id)
    {
        $company = CompanyUser::findOrFail($id);

        return view('admin.company.detail', compact('company'));
    }

    public function job()
    {
        $jobs = Job::all();

        return view('admin.job.index', compact('jobs'));
    }
}
