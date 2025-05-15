<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show($id)
{
    $user = User::findOrFail($id);
    return view('user.show', compact('user'));
}



public function settings(User $user)
{
    return view('user.settings',compact('user'));
}


public function update(UserRequest $request,user $user)
    {
        
        $formFields = $request->validated();
        // Hash/Cryptage
        $formFields['password'] = Hash::make($request->password);
        $this->uploadImage($request,$formFields);
        $user->fill($formFields)->save();

        return to_route('user.settings',$user->id)->with('success','Your profile has been updated successfuly !');

    }

    private function uploadImage(UserRequest $request,array &$formFields){
        unset($formFields['pfp']);
        if($request->hasFile('pfp')){
            $formFields['pfp'] = $request->file('pfp')->store('user','public');
        }
    }

}
