<?php

use App\Models\Alert;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

function isNavbarActive(string $url): string
{
    return Request()->is($url) ? 'active' : '';
}
function isNavbarTreeActive(string $url): string
{
    return Request()->is(app()->getLocale().'/'.$url) ? 'is-expanded' : '';
}
function isFullUrl(string $url): string
{
    return Request()->fullUrl() == url(app()->getLocale().'/'.$url) ? 'active' : '';
}
function getAuthByGuard(string $guard): Authenticatable
{
    return auth()->guard($guard)->user();
}
function hasRole($roleName): bool
{
    $user = Auth::user();
    if ($user->id == 1) {
        return true;
    }
    // Ensure user is authenticated and has a role
    if ($user && $user->role) {
        return $user->role->name === $roleName;
    }

    return false;
}
function hasPermission($permissionName)
{
    $user = Auth::user();
    if ($user->id == 1) {
        return true;
    }
    return false;
}

function getAlerts()
{


    return Auth::check() ? Alert::where('user_id', Auth::id())->orderBy('timestamp', 'desc')->limit(10)->get() : [];

}
