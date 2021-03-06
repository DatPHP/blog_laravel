<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Paginator;

class UserController extends Controller
{

      public function showRegisterForm(){
        return view('fontend.register');
      }
  
      public function storeUser(Request $request){


        $messages = [
          'required' => 'Trường :attribute bắt buộc nhập.',
          'email'    => 'Trường :attribute phải có định dạng email'
      ];
      $validator = Validator::make($request->all(), [
              'name'     => 'required|max:255',
              'email'    => 'required|email',
              'password' => 'required',
              'website'  => 'required'
  
          ], $messages);
  
          if ($validator->fails()) {
              return redirect('register')
                      ->withErrors($validator)
                      ->withInput();
          } else {

             
              

              if($request->id)
              {   
                  //dd('vo if');
                  $user = User::find($request->id);
                  $user->name = $request->name;
                  $user->email = $request->email;
                  $user->password = $request->password;
                  $user->website = $request->website;
                  $user->save();
              }
              else 
              {
                //dd("vo else");
                $users = new User;
                $users->name = $request->name;
                $users->email = $request->email;
                $users->password = $request->password;
                $users->website = $request->website;
                $users->save();
              }
            
             // dd($users);
          
            return redirect('user/list')
                ->with('message', 'Đăng ký thành công.');
          }
      }

      public function getlist(){
        /*
        $user =  new User;
        $users = $user->simplePaginate(1);
        */

        $users =  User::paginate(3);

        
        return view('fontend.users-list', ['users' => $users]);
      }


      public function edit(Request $request){
        //var_dump($request->id);
        $id= $request->id;
        $user = User::findorFail($id);
        return view('fontend.register', ['user' => $user, 'id'=>$id]);
      }


      public function delete(Request $request){
          $id= $request->id;
          $user = User::find($id);
          $user->delete();
          return redirect('user/list');
      }

}
