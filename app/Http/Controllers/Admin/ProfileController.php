<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use Illuminate\Support\facades\Auth;

class ProfileController extends Controller
{
    public function add()
    {
    	$id = Auth::id();
    	$profiles = Profile::find($id);
        if(empty($profiles)){
            $profiles = new Profile;
        }
        return view('admin.profile.profile', ['profiles' => $profiles]);
    }

    public function edit(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profiles = new Profile;
        $form = $request->all();
        unset($form['_token']);

        $profiles = Profile::firstOrNew(['id' => Auth::id()]);
        $profiles->fill($form);
        $profiles->save();
        
        return redirect('admin/profile');
    }

    public function front(Request $request)
   {
	$id = Auth::id();
	$profiles = Profile::find($request->user_id = $id);

	return view('admin.profile.front', ['profiles' => $profiles]);

     }
}
