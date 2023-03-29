<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use App\Models\User;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->route("token") ?? $request->get("token") ?? $request->post("token") ?? "";

        $user = User::where("token", "=", $token)->get()->first();

        $spots = Spot::where("regional_id", "=", $user["regional_id"])->get()->map(function ($val) {
            unset($val["regional_id"]);
            $val["available_vaccines"] = json_decode($val["available_vaccines"]);
            $val["serve"] = (int) $val["serve"];
            return $val;
        });

        return response([
            "spots" => $spots
        ]);
    }
}
