<?php

  

namespace App\Http\Controllers\Auth;

  

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

use Hash;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
  

class AuthController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function index()

    {

        return view('auth.login');

    }  

      

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function registration()

    {
        $countries = Country::select('id', 'name')->get();
        return view('auth.registration', compact('countries'));

    }

      

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postLogin(Request $request)

    {

        $request->validate([

            'username' => 'required',

            'password' => 'required',

        ]);

   

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            $data = [];
        
            return $this->successResponse($data, null, 1102);

            // return redirect()->intended('dashboard')

                        // ->withSuccess('You have Successfully loggedin');

        }

  
        return $this->errorResponse(null, 1103);
        // return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');

    }

      

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postRegistration(Request $request)

    {  
        // $validator = Validator::make($request->all(), [
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'contact_no' => 'required|unique:users',

        //     'email' => 'required|email|unique:users',
        //     'username' => 'required|unique:users',
        //     'address' => 'required',
        //     'password' => 'required|min:6',

        //     'country_id' => 'required',
        //     'state_id' => 'required',
        //     'city_id' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return $this->errorResponse($validator, 5006);
        // }
        
        $request->validate([

            'first_name' => 'required',
            'last_name' => 'required',
            'contact_no' => 'required|unique:users',

            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'address' => 'required',
            'password' => 'required|min:6',

            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
        ]);

           

        $data = $request->all();

        $user = $this->create($data);

        //----------- Start:- send email --//
        $login_url=\config('app.url')."/login";

        $emailData=array(
            'email'=>$user->email,
            'subject'=>'Welcome',
            'first_name'=>$user->first_name,
            'last_name'=>$user->last_name,
            'username'=>$user->username,
            'password'=>$request->password,
            'login_url'=>$login_url,
        );
         
        try{
            \Mail::send('emails.registration_email',$emailData, function ($m) use($emailData) {
                $m->to($emailData['email'])->subject($emailData['subject']);
            });
        }catch(\Swift_TransportException $e){
           // throw with(new MessageError($e, 1017)); 
            // return $e->getMessage();
        }
        //---------- End:- send email --//

        $data = [];
        
        return $this->successResponse($data, null, 1101);

        // return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');

    }

    

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function dashboard()

    {

        if(Auth::check()){

            $user = Auth::user();

            return view('dashboard', compact('user'));

        }

  

        return redirect("login")->withSuccess('Opps! You do not have access');

    }

    

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function create(array $data)

    {

      return User::create([

        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'contact_no' => $data['contact_no'],

        'email' => $data['email'],
        'address' => $data['address'],
        'country_id' => $data['country_id'],
        'state_id' => $data['state_id'],
        'city_id' => $data['city_id'],
        'username' => $data['username'],

        'password' => Hash::make($data['password'])

      ]);

    }

    

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function logout() {

        Session::flush();

        Auth::logout();

  

        return Redirect('login');

    }

}