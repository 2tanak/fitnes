<?php

namespace Modules\Auth\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Auth\App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Modules\Auth\App\Http\Requests\AuthRequest;

use Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\User\PasswordMail;
use App\Models\User;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth::login');
    }

    /**
     * Show the form for creating a new resource.
     */
	  public function auth(AuthRequest $request): RedirectResponse
        {
        try {
			
            
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
				
				return redirect()->route('admin_index')->with('success', trans('messages.auth.successMessage'));
            }
			
            return redirect()->route('login')->with('error', trans('messages.auth.errorMessage'));
        } catch (Exception) {
            return redirect()->route('login')->with('error', trans('messages.auth.errorException'));
        }
    }
   
  
   function logout(Request $request)
    {
      

	   Auth::logout();
	    if ($request->lang) {
            return redirect('/' . $request->lang . '/');
        } else {
            return redirect('/');
         }
       }
	  
	  
    function api_logout(Request $request)
    {
       $user = auth()->user();
	
	 //$request->user()->token()->revoke();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
	   auth()->user()->tokens()->delete();

	   Auth::logout();
	  
	  

        if ($request->lang) {
            return redirect('/' . $request->lang . '/');
        } else {
            return redirect('/');
        }


        //return redirect()->back(); 

    }
    
	function register (Request $request){
		return view('auth::register');
	}
	
	public function register_save(AuthRequest $request): RedirectResponse
    {
        try {
            $requestData = $request->all();
            User::create($requestData);
            return redirect()->route('admin_index')->with('success', trans('messages.register.successMessage'));
        } catch (Exception) {
            return redirect()->route('login')->with('error', trans('messages.register.errorException'));
        }
    }
	
}
