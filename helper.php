<?php

function app_path($path = '')
{
    return env('app_path') . ltrim($path, '/');
}

function public_path($path = '')
{
    return app_path('../public/') . ltrim($path, '/');
}

function admin_path($path = '')
{
    return __DIR__ . '/' . ltrim($path, '/');
}

function admin_config_path($path = '')
{
    return admin_path('config/') . ltrim($path, '/');
}

function admin_route_path($path = '')
{
    return admin_path('route/') . ltrim($path, '/');
}

function admin_view_path($path = '')
{
    return admin_path('resource/view/') . ltrim($path, '/');
}