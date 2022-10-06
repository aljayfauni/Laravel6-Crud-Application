<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\images;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    
       // $allusers = User::latest()->orderBy('created_at','')->paginate(5);
       $allusers = User::orderBy('id')->paginate(5);
        return view('users.index',compact('allusers'))
                ->with('i',(request()->input('page',1)-1)* 5);





                

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     
    //public function store(Request $request)
   // {
        //

     //   $request->validate([

      //          'fname'=> 'required',
      //          'lname'=> 'required',
      //          'email'=> 'required',
      //          'bday'=> 'required',
     //   ]);

          

     //   User::create($request->all());

   

      //  return redirect()->route('users.index')

       //                 ->with('success','User created successfully.');
    //}

    public function add_user(Request $request)
    {
        //
           
        

        $request->validate([

                'fname'=> 'required',
                'lname'=> 'required',
                'email'=> 'required',
                'password'=> 'required',
                'bday'=> 'required',
                'profile'=> 'required|mimes:jpeg,png,jpg,bmp,pdf|max:5000',
        ]);
         
        // if validation success
        if($file   =   $request->file('profile')) {

            $name      =   time().time().'.'.$file->getClientOriginalExtension();
            
            $target_path    =    public_path('/images/');
            
                if($file->move($target_path, $name)) {
                   
                    // save file name in the database
                 
     
              
               }  

            //    $password = Hash::make($request->password);
            //    $fname_encrypted = Crypt::encryptString($request->fname); 
            //    $lname_encrypted = Crypt::encryptString($request->lname); 
            //    $email_encrypted = Crypt::encryptString($request->email); 
            //    $password_encrypted = Crypt::encryptString($password); 
            //    $bday_encrypted = Crypt::encryptString($request->bday); 
            //    $profile_encrypted = Crypt::encryptString($name);


                $password = Hash::make($request->password);
            //    $fname_encrypted = Crypt::encryptString($request->fname); 
            //    $lname_encrypted = Crypt::encryptString($request->lname); 
            //    $email_encrypted = Crypt::encryptString($request->email); 
            //    $password_encrypted = Crypt::encryptString($password); 
            //    $bday_encrypted = Crypt::encryptString($request->bday); 
            //    $profile_encrypted = Crypt::encryptString($name);

        
            $insert_data =  User::create([
                'fname'=> $request->fname,
                'lname'=> $request->lname,
                'email'=> $request->email,
                'password'=> $password,
                'bday'=> $request->bday,
                'profile'=> 'images/'.$name

        //      $insert_data =  User::create([
        //     'fname'=> Crypt::decryptString($fname_encrypted),
        //     'lname'=> Crypt::decryptString($lname_encrypted),
        //     'email'=> Crypt::decryptString($email_encrypted),
        //     'password'=> Crypt::decryptString($password_encrypted),
        //     'bday'=> Crypt::decryptString($bday_encrypted),
        //     'profile'=> 'images/'.Crypt::decryptString($profile_encrypted)
         
          ]);
        
        // User::create($request->all());
        //     $datas = [
        //         'fname' =>$fname_encrypted,
        //         'lname'=> $request['lname'],
        //         'email'=> $request['email'],
        //         'bday'=> $request['bday'],
        //         'profile'=> 'images/'.$name
        //     ];
         
     
      //return $datas;
        }
       return redirect()->route('users.index')

  ->with('success','User created successfully.');
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
        return view('users.show',compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('users.edit',compact('user'));

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
        //

        $request->validate([

            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'bday' => 'required',

        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success','Users has been Updated Successfully');

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

        $user->delete();
            return redirect()->route('users.index')
                    ->with('success','Product has been deleted successfully');


                }


                //search functionality 

     public function search_users(Request $request)
    
    {
        $search = $request->get('search');
        $allusers =DB::table('users')
    
        ->where('fname','like','%'.$search.'%')
        ->orWhere('lname', 'like', '%' . $search . '%')
        ->orWhere('id', 'like', '%' . $search . '%')
        
        
        ->paginate(5);
       
      //  $allusers =DB::table('users')->where('lname','like','%'.$search.'%')->paginate(5);
      //  $allusers =DB::table('users')->where('id','like','%'.$search.'%')->paginate(5);
        return view('users.index',['allusers' => $allusers]);
      
     

    }

}
