<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use App\Models\User;
use App\Models\Vaccination;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VaccinationController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->route("token") ?? $request->get("token");

        $user = User::where("token", "=", $token)->get()->first();

        $vaccinations = Vaccination::with(["spot"])->where("id_card_number", "=", $user["id_card_number"])->get()->all();

        return response(collect($vaccinations)->map(function ($val) {
            $val["vaccination_at"] = date_format(new Carbon($val["vaccination_at"]), "F d, Y");
            return $val;
        }));
    }

    public function show(Request $request)
    {
        $date = new Carbon($request->get("date")) ?? today("+7");

        $spot = Spot::where("id", "=", $request->route("spot_id"))->get()->first();

        $vaccination_count = count(Vaccination::where("spot_id", "=", $spot["id"])
            ->where("vaccination_at", "=", date_format($date, "Y-m-d"))->get()->all());

        return response([
            "date" => date_format($date, "F d, Y"),
            "spot" => collect($spot)->only(["id", "name", "address", "serve", "capacity"])->map(function ($val, $key) {
                if ($key == "serve") {
                    return (int) $val;
                }
                return $val;
            })->all(),
            "vaccinations_count" => $vaccination_count
        ]);
    }
}
