<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Validator;
use Illuminate\Support\Str;
class AuthController extends Controller
{

    private $apiToken;
    public function __construct()
    {
        $this->apiToken = uniqid(base64_encode(Str::random(40)));
    }

    /**
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request){
        //User check
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password])){
            $user = Auth::user();
            //Setting login response
            $success['token'] = $this->apiToken;
//            $success['email'] =  $user->email;
            return response()->json([
                'status' => 'success',
                'data' => $success
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'data' => 'Unauthorized Access'
            ]);
        }
    }
}
