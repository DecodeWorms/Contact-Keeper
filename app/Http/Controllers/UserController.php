<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;
use App\User;
use Hash;

class UserController extends Controller
{
    
    public function create(Request $request){
        $contact = new User();
        $contact->first_name = $request->firstName;
        $contact->last_name = $request->lastName;
        $contact->phone_number = $request->phoneNumber;
        $contact->email = $request->email;
        $contact->password = Hash::make($request->password);
        $contact->save();

        return response()->toJson([
            "Message"=>"Contact record created"
        ],201);
    }

    public function getAllContacts(){
        $contacts =  User::get()->toJson(JSON_PRETTY_PRINT);
        return response($contacts,200);
    }

    public function getContact($id){
        if(User::where("id",$id)->exists()){
        $contact =  User::where("id",$id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($contact,200);

        }else{
            return response()->toJson([
                "Message"=>"User not available"
            ],404);
        }
    }

    public function update(Request $request ,$id){
        if(User::where("id",$id)->exists()){
            $user = User::find($id);

            $user->first_name = is_null($request->firstName) ? $user->first_name : $request->firstName;
            $user->last_name = is_null($request->lastName) ? $user->last_name : $request->lastName;
            $user->phone_number = is_null($request->phoneNumber) ? $user->phone_number : $request->phoneNumber;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->password = is_null($request->password) ? $user->password : $request->password;

            $user->save();

            return response()->toJson([
                "Message"=>"User Updated Successfully"
            ],200);

        }
    }


    public function delete($id){
       if(User::where("id",$id)->exists()){
           $user = User::find($id);
           $user->delete();

           return response()->toJson([
               "Message"=>"User deleted successfully"
           ],202);
       }else{
           return response()->toJson([
               "Message"=>"User not found"
           ],404);
       }

    }
}
