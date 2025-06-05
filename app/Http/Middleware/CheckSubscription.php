<?php

// app/Http/Middleware/CheckSubscription.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSubscription
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        
        if (!$user || !$user->isPremium()) {
            return redirect()->route('premium')->with('error', 'You need a premium subscription to access this content');
        }
        
        return $next($request);
    }
}
