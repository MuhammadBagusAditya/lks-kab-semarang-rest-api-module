<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class tokenCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = $request->route("token") ?? $request->get("token") ?? $request->post("token");

        if (!User::where("token", "=", $data)->exists()) {
            return response(["message" => "Unauthorized user"], 401);
        }

        return $next($request);
    }
}
