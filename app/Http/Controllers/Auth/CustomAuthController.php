<?php

namespace App\Http\Controllers\Auth;
use DB;
use Auth;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;                                                                    
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Record;

class CustomAuthController extends Controller
{
    public function indexPage(){
        return view('login');
    }
    public function UserDashboard(){
        if(Auth::check()){
            $user_id = Auth::id();
            $income = 'Income';
            $expense = 'Expense';
            $totalIncome = DB::table('records')->where([ ['type',$income],['user_id',$user_id] ])->groupBy('type')
            ->select('type', DB::raw('SUM(amount) as total_inccome'))->get();
            $total_income = 0;
            foreach($totalIncome as $totalincome){
              $total_income =  $totalincome->total_inccome;
            }

            $totalExpense = DB::table('records')->where([ ['type',$expense],['user_id',$user_id] ])->groupBy('type')
            ->select('type', DB::raw('SUM(amount) as total_expense'))->get();
            $total_expense = 0;
            foreach($totalExpense as $totalexpense){
              $total_expense =  $totalexpense->total_expense;
            }

            $total_balance = $total_income-$total_expense;


            return view('pages.dashboard', compact('total_income','total_expense','total_balance'));
        }else{
            return redirect()->intended('/');  
        }
    }
    public function customRegistration(Request $request){

        $already_exist = User::where('email', $request->email)->get();

            # check if email is more than 1
            if(sizeof($already_exist) > 0){
                # tell user not to duplicate same email
                $msg = 'This user already signed up !';
                Session::flash('userExistError', $msg);
                return back();
            }

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'cnf-password' => 'required|same:password',

        ],

        [
            'username.required' => 'The username field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
        ]);

        if($validator->fails()){
            return redirect('/')->withErrors($validator)->withInput();    
            //return response()->json(['error'=>$validator->errors()], 401);
        }else{
            $user = new User;
            $user->remember_token = $request->_token;
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('/')->with('success',"Registration successful! Please log in.");

        }
        
    }

    public function customLogin(Request $request){

        if(Auth::attempt(['email' => request('username'), 'password' => request('password')])){
            $user = Auth::user();
            return redirect()->intended('/dashboard');
        }

        return redirect('/')->with('error', 'Invalid credentials. Please try
             again.');
    }

    public function logout(){
        Auth::logout();
        Session::flush(); // Clear all session data
        Session::regenerate(); // Regenerate the session ID
        return redirect()->intended('/');

    }
}
