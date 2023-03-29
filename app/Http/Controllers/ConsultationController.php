<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();

        $token = $request->route("token") ?? $request->get("token") ?? $request->post("token");

        $user = User::where("token", "=", $token)->get()->first();

        if (Consultation::where("id_card_number", "=", $user["id_card_number"])->exists()) {
            return response([
                "message" => "Consultation has been created before"
            ], 400);
        }

        Consultation::create([
            "id_card_number" => $user["id_card_number"],
            "disease_history" => $data["disease_history"],
            "current_symptoms" => $data["current_symptoms"]
        ]);

        return response([
            "message" => "Request consultation sent successful"
        ]);
    }

    public function show(Request $request)
    {
        $token = $request->route("token") ?? $request->get("token") ?? $request->post("token");

        $user = User::where("token", "=", $token)->get()->first();

        $consultation = Consultation::where("id_card_number", "=", $user["id_card_number"])->get()->first();

        return response([
            "consultation" => collect($consultation)->except(["id_card_number"])
        ]);
    }
}
