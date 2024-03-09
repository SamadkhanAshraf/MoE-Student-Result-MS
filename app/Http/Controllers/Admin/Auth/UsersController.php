<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Helpers\Helper;

use App\Http\Controllers\Controller;


class UsersController extends Controller
{
    /**
     * Display all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users-management.users.index', compact('users'));
    }


    public function archive(){
        $users = User::onlyTrashed()->get();
        return view('admin.users-management.users.archive', compact('users'));
    }

    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users-management.users.create', [
            'roles' => Role::latest()->get()
        ]);
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( StoreUserRequest $request)
    {
        $user = new User();
        try{

            $user->name= $request->name;
            $user->username= $request->username;
            $user->email= $request->email;
            $user->phone= $request->phone;
            $user->position= $request->position;
            $user->address= $request->address;

            if($request->profileImage){
                $user->profile_image= Helper::uploadImage($request->profileImage,'avatars');
            }

            if($request->coverImage){
                $user->cover_image= Helper::uploadImage($request->coverImage,'covers');
            }
            $user->status= '1';
            $user->type= $request->userType;
            $user->service=$request->userService;
            $user->password= $request->password;
            if($user->save()){
                return redirect()->route('users.index')
                ->with('success',__('msg.success'));
            }
            else{
                return back()->with('error',__('msg.error'));
            }

        }catch(\Exception $exep){
            return back()->with('error',__('msg.error'));

        }
    }

    /**
     * Show user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    // public function show(User $user)
    // {
    //     return view('admin.users-management.users.show', [
    //         'user' => $user
    //     ]);
    // }

    /**
     * Edit user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users-management.users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        try{

            $user->name= $request->name;
            $user->username= $request->username;
            $user->email= $request->email;
            $user->phone= $request->phone;
            $user->position= $request->position;
            $user->address= $request->address;

            if($request->profileImage){

                $user->profile_image= Helper::updateImage($request->profileImage,$user->profile_image,'avatars');
            }

            if($request->coverImage){
                $user->cover_image= Helper::updateImage($request->coverImage,$user->cover_image,'covers');
            }
            $user->status= '1';
            $user->type= $request->userType;
            $user->service=$request->userService;

            if($request->password!=='' || $request->password!==null){
                $user->password= $request->password;
            }
            if($user->save()){
                $user->syncRoles($request->get('role'));
                return redirect()->route('users.index')
                ->with('success',__('msg.success'));
            }
            else{
                return back()->with('error',__('msg.error'));
            }

        }catch(\Exception $exep){
            return back()->with('error',__('msg.error'));

        }

        // $user->update($request->validated());

        // $user->syncRoles($request->get('role'));

        // return redirect()->route('users.index')
        //     ->with('success',__('msg.updated'));
    }



    public function addToArchive($user)
    {
        $user = User::find($user)->delete();
        return back()->with('success',__('msg.your-recard-added-to-archive'));
    }

    public function restore($user)
    {
        $user = User::withTrashed()->find($user)->restore();
        return back()->with('success',__('msg.restored'));
    }

    public function restoreAll(){
        User::withTrashed()->restore();
        return back()->with('success',__('msg.restored'));
    }

      /**
     * Delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        User::where('id',$user)->forceDelete();
        return back()->with('success',__('msg.deleted'));
    }


    // change user status to suspend or active
    public function changeStatus($id){
        $user = User::find($id);
        $user->status= $user->status===1?0:1;
        if($user->save())
        {
            return back()->with('success',  $user->status?__('msg.user-activated-successfully'):__('msg.user-suspended-successfully'));
        }

    }

    // // Load profile
    // public function profile(){
    //     $user = User::find(\Auth::user()->id);
    //     return view('admin.users-management.user-profile.show',[
    //         'user'=>$user,
    //         'userRole' => $user->roles->pluck('name')->toArray(),
    //         'roles' => Role::latest()->get()
    //     ]);
    // }

    // Update user profle
    public function updateProfile($id, Request $request){
        $user= User::find($id);

        if($request->shavePasswordChanges==='yes'){
            $request->validate([
            'old_password' =>'required|current_password',
            'password' => 'nullable|min:8',
            'password_confirmation' => 'required_with:password|same:password'
            ],
            [
                'old_password.current_password'=>__('msg.old-password-is-incorect'),
            ]);

            $user->password= $request->password;
            if($user->save()) {
                return back()->with('success',__('msg.your-password-successfully-updated'));
            }
            else{
                return back()->with('error',__('msg.failed'));
            }
        }
        else{
            $request->validate( [
                'name' => 'required',
                'email' => 'required|email:rfc,dns|unique:users,email,'.$user->id,
                'phone' => 'nullable|unique:users,phone,'.$user->id,
                'position' => 'nullable|string|min:2',
                'profileImage' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024',
                'coverImage' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024',
                'address' => 'nullable|string|min:3',
            ]);

            $user->name =$request->name;
            $user->email =$request->email;
            $user->phone =$request->phone;
            $user->position =$request->position;
            $user->address =$request->address;
            if($request->profileImage){
                $user->profile_image= Helper::updateImage($request->profileImage,$user->profile_image,'avatars');
            }

            if($request->coverImage){
                $user->cover_image= Helper::updateImage($request->coverImage,$user->cover_image,'covers');
            }
            if($user->save()) {
                return back()->with('success',__('msg.your-profile-successfully-updated'));
            }
            else{
                return back()->with('error',__('msg.failed'));
            }

        }

    }
}
