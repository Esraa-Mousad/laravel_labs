<?php
namespace App\Http\Controllers;

 

use Illuminate\Http\Request;

use Exception;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

 

class GitHubController extends Controller
{
    public function gitRedirect()
    {
        return Socialite::driver('github')->redirect();
    }
       

    public function gitCallback()
    {
        try {
     
            $user = Socialite::driver('github')->stateless()->user();
      
            $searchUser = User::where('github_id', $user->id)->first();
      
            if($searchUser){
      
                Auth::login($searchUser);
     
                return redirect('/posts');
      
            }else{
                $gitUser = User::create([
                    'name' => $user->nickname,
                    'email' => $user->email,
                    'github_id'=> $user->id,
                    'auth_type'=> 'github',
                    'password' => encrypt('gitpwd059')
                    // 'password' => $user->token

                ]);
     
                // dd($user);

                Auth::login($gitUser);
      
                return redirect('/posts');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}