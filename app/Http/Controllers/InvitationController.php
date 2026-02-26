<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
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

    public function accept(Request $request , $token = null)
    {
        $token = $request->token ?? $token;

        $Invitation = Invitation::where('token' , $token)->firstOrFail();

        if (auth()->user()->hasActiveMembership()) {
            return redirect()->route('colocations.show')
            ->with('error', 'You are already a member of a colocation.'); 
        }

        DB::transaction(function () use ($invitation) {
        
 
            Membership::create([
                'user_id' => auth()->id(),
                'colocation_id' => $invitation->id_colocation,
                'role' => 'member', 
                'joined_at' => now(),
            ]);

            
            $invitation->delete();
        });

        return redirect()->route('colocations.show')
            ->with('success', 'Welcome to your new colocation!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $activeMembership = auth()->user()->memberships()->whereNull('left_at')->first();
        
        if (!$activeMembership) {
            return redirect()->back()->with('error', 'You must be in a house to invite people.');
        }
        
        if ($activeMembership->role !== 'owner') {
            abort(403, 'Only the owner can send invitations.');
        }
        
        $request->validate([
            'email' => 'required|email'
        ]);

        $Random_Token = str(random(32));
            
        Invitation::create([
            'email' => $request->email,
            'token' => $Random_Token,
            'id_colocation' => $activeMembership->colocation_id
        ]);

        Mail::raw("You have been invited! Your token is: " . $Random_Token, function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Invitation to join a Colocation');
        });
        
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
