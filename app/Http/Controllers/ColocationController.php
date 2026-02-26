<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColocationController extends Controller
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($request->user()->hasActiveMembership()) {
            return redirect()->back()->with('error', 'You are already an active member of a colocation.');
        }

        DB::transaction(function() use ($request){
            $colocation = Colocation::create([
                'name' => $request->name,
                'description' => $request->description,
                'owner_id' => $request->user()->id,
            ]);

            Membership::create([
                'user_id' => $request->user()->id,
                'colocation_id' => $colocation->id,
                'role' => 'owner',
                'joined_at' => now()
            ]);
        });

        return redirect()->route('dashboard')->with('success', 'Colocation created successfully!');
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
        $colocation = Colocation::findOrFail($id);
        
        $userRole = DB::table('colocation_user')
            ->where('colocation_id', $id)
            ->where('user_id', auth()->id())
            ->whereNull('left_at')
            ->value('role');
        
        if ($userRole !== 'owner') {
            abort(403);
        }
        
        return view('colocations.edit', compact('colocation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $colocation = Colocation::findOrFail($id);
        
        $userRole = DB::table('colocation_user')
            ->where('colocation_id', $id)
            ->where('user_id', auth()->id())
            ->whereNull('left_at')
            ->value('role');
        
        if ($userRole !== 'owner') {
            abort(403);
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        
        $colocation->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        return redirect()->back()->with('success', 'Colocation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
