<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function validate_token(Request $request)
    {
        $token = $request->bearerToken();
        if (!$token) {
            $token = $request->token;
        }

        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token not provided.'
            ]);
        }

        if ($token === "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkZhaG1pIEdhbnRlbmciLCJpYXQiOjE1MTYyMzkwMjJ9.5bcb0crk3zHMBwb7UGgIaUpOTmFRvpU9GZirir_E3rA") {
            return response([
                'status' => 'success',
                'data' => [
                    'authorization_code' => '5afcd3dc-4094-473a-bf51-5614e481575c',
                    'member_id' => 420,
                    'updated_at' => '2022-03-15 12:34:08',
                    'created_at' => '2022-03-15 12:34:08',
                    'id' => 2
                ]
            ]);
        } else {
            return response([
                'error' => "invalid_credentials"
            ]);
        }
    }
}
