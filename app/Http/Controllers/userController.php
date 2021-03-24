<?php

    namespace App\Http\Controllers;

    use App\Models\User;

    use DB;

    use Illuminate\Http\Request;

    use framework\src\Illuminate\Http;

    use Illuminate\Support\Facades\Storage;

    use App\Providers\RouteServiceProvider;
   

    class userController extends Controller{


        public function uploadAvatar(Request $request){

            if($request->hasFile('image')){
            
                User::uploadAvatar($request->image);
                // $request->session()->flash('message', 'Image Uploaded Successfully');
                return redirect()->back()->with('message', 'Image Uploaded Successfully');
            }else{
                // $request->session()->flash('error', '***Please select the image file first***');
                return redirect()->back()->with('error', '***Please select the image file first***');
            }

           
        }



        public function contact(){

            // $user = new User();

            //create

            
            // $user->name = 'Pallab';
            // $user->email = 'pallab@yahoo.com';
            // $user->password = 'password';
            // $user->save();

            //create

            $data = [
                'name' => 'elon',
                'email' => 'elon2@yandex.com',
                'password' => 'password',
            ];

            // User::create($data);

            //delete
            // User::where('id',1)->delete();

            //update
            // User::where('id', 2)->update(['name'=>'pallabUpdated']);

            //read
            $user = User::all();
            return $user;

            // DB::insert('insert into users (name,email,password) values (?,?,?)',[
            //     'Pallab', 'pallab@aol.com', 'password',
            // ]);
            
            // $data = DB::select('select * from users');

            // return $data;

        }

    }
