<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function login()
    {
        
        
       
        $messages = [
            'gresponse.required' => 'Captch Inválido!',
            'gresponse.min' => 'Captch Inválido!',
        ];
        
        $validator = Validator::make(Request::all(), [
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|min:3',
            
        ], $messages);
        
       /*  $secretKey = '6LdzR8wcAAAAAAbOwTXAuLhbDqWYnGTg9YqkdFfL';
        
        // See https://developers.google.com/recaptcha/docs/verify#api-request
        $fields = array(
            'secret'   => $secretKey,
            'response' => $_POST['g-recaptcha-response']
        );
        
        $postVars = '';
        $sep = '';
        foreach ($fields as $key => $value) {
            $postVars .= $sep . urlencode($key) . '=' . urlencode($value);
            $sep = '&';
        }
        
        $ch = curl_init();
        
        curl_setopt($ch,CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $postVars);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        
        curl_close($ch);
        
        $result = json_decode($result, true);
        
         
        if (!$result["success"])  return redirect()->back()->with(['errors'=>$validator->errors()->all()])->withErrors([
            ['errors'=>$validator->errors()->all()],
        ]);
        */
        if ($validator->passes()) {
            if (auth()->attempt(array('email' =>  Request::input('email'),
                'password' =>  Request::input('password')),true))
            {
                return redirect()->intended($this->redirectPath());
            }
            return redirect()->back()->with(['errors'=>$validator->errors()->all()])->withErrors([
                'email' => 'Incorrect email address or password',
            ]);
        }
        
        return redirect()->back()->with(['errors'=>$validator->errors()->all()])->withErrors([
            'email' => 'Incorrect email address or password',
        ]);
    }
}
