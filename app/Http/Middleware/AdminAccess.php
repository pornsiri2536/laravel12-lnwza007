<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        // ตรวจสอบว่าเป็น admin หรือไม่
        if (!$user->hasRole('admin') && !$user->hasRole('super_admin')) {
            abort(403, 'คุณไม่มีสิทธิ์เข้าถึงหน้า Admin');
        }

        return $next($request);
    }
}
