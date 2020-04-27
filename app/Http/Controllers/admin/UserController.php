<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Gender;
use Illuminate\Http\Request;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // return auth()->user()->roles()->get();die;
      $users = User::latest()->paginate(10);
      return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      $user_roles= $user->role()->get();
      $roles = Role::get();
//       dd($user_roles);
      // return $roles;die;
      return view('admin.user.edit', compact('user','roles','user_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
//        dd($request->all());
      $data = $request->all();
      $user->update($data);
      $user->role()->sync($request->input('roles_id'));
//        dd($user->role()->get());
      return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    
    public function userPanel(){
      return view('admin.userpanel.index');
    }

    public function userEdit(User $user)
    {
        $genders = Gender::all();
      return view('admin.userpanel.edit', ['user' => $user, 'genders'=>$genders]);
    }


  public function userUpdate(Request $request, User $user)
  {
//      dd($request->all());
      
        $data = $request -> validate( [
          'name' => ['required', 'string', 'max:255'],
          'gender_id' => ['nullable']
      ]);
      
      $user = \Auth::user();
      
      if($request['image']){
        $file = $request['image'];
        $image = $this->ImageUploader($file,'profile/');
      }else{
        $image = $user->image;
      }
      
      $user['email'] = \Auth::user()->email;
      $user['name'] = $data['name'];
      $user['gender_id'] = $data['gender_id'];
      $data['image'] = $image;

      $user->save();
//      dd($user);
      return redirect(route('userpanel'));
      
  }


}
