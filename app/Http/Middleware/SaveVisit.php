<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SaveVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $existingVisit = Visit::where('ip_address', $request->ip())
            ->where('visited_at', '>=', now()->subMinutes(10)) // Only consider visits in the last 10 minutes
            ->first();
    
        if (!$existingVisit) {
            $visit = new Visit();
            $visit->ip_address = $request->ip();
            $visit->user_agent = $request->header('User-Agent');
            $visit->visited_at = now();
            $visit->save();
        }
    
        return $next($request);
    }
}
