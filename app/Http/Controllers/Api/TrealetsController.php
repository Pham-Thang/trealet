<?php

namespace Vanguard\Http\Controllers\Api;

use Illuminate\Support\Facades\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Trealets;

class TrealetsController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', Trealets::STEPQUEST_TYPE);

        return Trealets::where('type', $type)->get();
    }

    public function show($id)
    {
        return Trealets::find($id);
    }
}
