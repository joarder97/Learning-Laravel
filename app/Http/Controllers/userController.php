<?php

    namespace App\Http\Controllers;

    use App\Models\User;

    use DB;

    use Illuminate\Http\Request;

    // use framework\src\Illuminate\Http;
   

    class userController extends Controller{


        public function uploadAvatar(Request $request){

            // $request->image->store('images', 'public');
            // return 'Image uploaded';

            if($request->hasFile('image')){
                $fileName= $request->image->getClientOriginalName();
                $request->image->storeAs('images', $fileName, 'public');

                User::find(1)->update(['avatar'=>$fileName]);

                return "uploaded";
            }else{

            // $fileName= $request->getClientOriginalName();

            return "NU";
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
