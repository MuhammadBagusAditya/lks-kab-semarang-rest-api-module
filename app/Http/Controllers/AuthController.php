<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->json()->all();

        $credentials = [
            "id_card_number" => $data["id_card_number"],
            "password" => $data["password"]
        ];

        if (Auth::attempt($credentials)) {
            User::where("id_card_number", "=", $data["id_card_number"])->update([
                "token" => md5($data["id_card_number"])
            ]);

            $user = User::with(["regional"])->where("id_card_number", "=", $data["id_card_number"])->get()->first();

            return response(collect($user)->except(["id_card_number", "regional_id"]));
        }

        return response([
            "message" => "ID Card Number or Password incorrect"
        ], 401);
    }

    public function logout(Request $request)
    {
        $token = $request->route("token") ?? $request->get("token") ?? $request->post("token") ?? "";

        if (!User::where("token", "=", $token)->exists()) {
            return response(["message" => "Invalid token"], 401);
        }

        User::where("token", "=", $token)->update([
            "token" => ""
        ]);

        return response(["message" => "Logout success"]);
    }
}
