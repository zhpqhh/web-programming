<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public const AdminRoleId = 1;
    public const UserRoleId = 2;

    public const AdminTokenName = "admin";
    public const UserTokenName = "user";


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => self::AdminRoleId,
        ]);

        $token = $user->createToken('auth_token',['admin'])->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        if ($user->role_id == self::AdminRoleId)
        {
            $tokenName = self::AdminTokenName;
        }
        else if($user->role_id == self::UserRoleId)
        {
            $tokenName = self::UserTokenName;
        }
        else
        {
            throw new \Exception("Undefined user role.");
        }
        $token = $user->createToken('auth_token',[$tokenName])->plainTextToken;

        return response()->json([
            'message' => 'Hi '.$user->name.', welcome to home',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'token role' => $tokenName]);
    }

    // method for user logout and delete token
    public function logout(Request $request)
    {
        $request->user('sanctum')->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
