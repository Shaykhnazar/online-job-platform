<?php

namespace App\Http\Controllers;

use App\Personalinfo;
use App\Services\FileService;
use Illuminate\Http\Request;
use Auth;

class PersonalinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::user()->id;
        $personalinfo = Personalinfo::where('user_id', '=' , $id)->get();
        return view('users.personalinfo.index', compact('personalinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.personalinfo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return response()->json($request);
        $personalinfo = new Personalinfo();

        if ($request->hasFile('file'))
        {
            //image validation
            $request->validate([
                'file'  => 'required|mimes:jpg,jpeg,png|max:2048',
            ]);
            $personalinfo->photo = FileService::uploadCroppedImage($request->file('file'),'profile_photos');
        }


        $personalinfo->user_id = Auth::user()->id;
        $personalinfo->full_name = $request->full_name;
        $personalinfo->father = $request->father;
        $personalinfo->mother = $request->mother;
        $personalinfo->gender = $request->gender;
        $personalinfo->birthdate = $request->birthdate;
        $personalinfo->nid = $request->nid;
        $personalinfo->religion = $request->religion;
        $personalinfo->present_address = $request->present_address;
        $personalinfo->permanent_address = $request->permanent_address;
        $personalinfo->linkedin = $request->linkedin;
        $personalinfo->github = $request->github;
        $personalinfo->facebook = $request->facebook;
        $personalinfo->website = $request->website;
        $personalinfo->mobile = $request->mobile;

        $personalinfo->save();

        return redirect()->route('personalinfo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personalinfo  $personalinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Personalinfo $personalinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personalinfo  $personalinfo
     * @return \Illuminate\Http\Response
     */
    public function edit($personalinfo)
    {
        $personalinfo = Personalinfo::Find($personalinfo);

        return view('users.personalinfo.edit', compact('personalinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personalinfo  $personalinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $personalinfo = Personalinfo::Find($id);

        if ($request->hasFile('file'))
        {
            //image validation
            $request->validate([
                'file'  => 'required|mimes:jpg,jpeg,png|max:2048',
            ]);
            FileService::imageDeleteFromStorage($personalinfo->photo);
            $personalinfo->photo = FileService::uploadCroppedImage($request->file('file'),'profile_photos');
        }

        $personalinfo->user_id = Auth::user()->id;
        $personalinfo->full_name = $request->full_name;
        $personalinfo->father = $request->father;
        $personalinfo->mother = $request->mother;
        $personalinfo->gender = $request->gender;
        $personalinfo->birthdate = $request->birthdate;
        $personalinfo->nid = $request->nid;
        $personalinfo->religion = $request->religion;
        $personalinfo->present_address = $request->present_address;
        $personalinfo->permanent_address = $request->permanent_address;
        $personalinfo->linkedin = $request->linkedin;
        $personalinfo->github = $request->github;
        $personalinfo->facebook = $request->facebook;
        $personalinfo->website = $request->website;
        $personalinfo->mobile = $request->mobile;

        $personalinfo->save();

        return redirect()->route('personalinfo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personalinfo  $personalinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personalinfo $personalinfo)
    {
        //
    }
}
