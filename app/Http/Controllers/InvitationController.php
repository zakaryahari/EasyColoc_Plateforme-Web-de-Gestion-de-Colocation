<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request()->validate([
            'email' => 'required|email'
        ]);

        $Random_Token = str(random(32));

        $activeMembership = auth()->user()->memberships()->whereNull('left_at')->first();
        $id_colocation = $activeMembership->id_colocation;
        
        if (!$activeMembership) {
            return redirect()->back()->with('error', 'You must be in a house to invite people.');
        }

        Invitation::create([
            'email' => $request->email,
            'token' => $Random_Token,
            'id_colocation' => $id_colocation
        ]);

        Mail::raw($request->email, $Random_Token);

        return response()->json(['message' => 'Invitation sent | Token : '. $Random_Token]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
