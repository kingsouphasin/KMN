<?php

namespace App\Http\Controllers\apiController;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Exception\ClientException;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function socialite(Request $request){
        $provider = $request->input('provider_name');

        $validateToken = $request->input('access_token');

        try {
            $providerUser = Socialite::driver($provider)->userFromToken($validateToken);
        } catch (ClientException $exception) {
            return response()->json(['error' => 'Invalid Credential Provided.'], 422);
        }
        
        // get the provider's user. (In the provider server)
        
        // check if access token exists etc..
        // search for a user in our server with the specified provider id and provider name

        // $user = Provider::where('provider', $provider)->where('provider_id', $providerUser->id)->first();

        // if there is no record with these data, create a new user
        $userCreated = User::firstOrCreate(
            [
                'email' => $providerUser->getEmail(),
            ],
            [
                'email_verified_at' => now(),
                'name' => $providerUser->getName(),
                'profile' => $providerUser->getAvatar()
            ]);
            $userCreated->providers()->updateOrCreate(
                [
                    'provider' => $provider,
                    'provider_id' =>  $providerUser->getId()
                ],
                [
                    'avatar' => $providerUser->getAvatar()
                ]
            );
            

        // create a token for the user, so they can login
        $token = $userCreated->createToken('Bundo')->plainTextToken;
        // return the token for usage
        return response()->json([
            'user' => $userCreated,
            'success' => true,
            'token' => $token
        ]);
    }
}
