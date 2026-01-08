<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ComplaintController extends Controller
{
    public function create()
    {
        return view('complaints.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category'   => ['required','string','max:100'],
            'details'    => ['required','string','max:2000'],

         
            'first_name' => ['nullable','string','max:50'],
            'last_name'  => ['nullable','string','max:50'],
            'email'      => ['nullable','email','max:255'],
            'phone'      => ['nullable','string','max:30'],
        ]);

        $complaintId = (string) Str::uuid();
        $reference = 'cms_' . now()->format('Y') . '-' . str_pad((string) random_int(1, 9999), 4, '0', STR_PAD_LEFT);

    
        $orgId = auth()->user()->organisation_id
            ?? DB::table('organisations')->value('organisation_id');

        if (!$orgId) {
            abort(500, 'No organisations exist. Seed organisations table or set organisation_id on the user.');
        }

        DB::table('complaints')->insert([
            'complaint_id'     => $complaintId,
            'organisation_id'  => $orgId,
            'status'           => 'New',
            'reference_no'     => $reference,
            'category'         => $validated['category'],
            'description'      => $validated['details'],
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);

        return redirect()->route('complaints.submitted', ['reference' => $reference]);
    }

    public function submitted(string $reference)
    {
        $complaint = DB::table('complaints')
            ->where('reference_no', $reference)
            ->first();

        abort_if(!$complaint, 404);

        return view('complaints.submitted', compact('complaint'));
    }

    public function index()
    {
       
        $orgId = auth()->user()->organisation_id;

        $complaints = DB::table('complaints')
            ->when($orgId, fn($q) => $q->where('organisation_id', $orgId))
            ->orderByDesc('created_at')
            ->get();

        return view('complaints.index', compact('complaints'));
    }

    public function show(string $reference)
    {
        $orgId = auth()->user()->organisation_id;

        $complaint = DB::table('complaints')
            ->where('reference_no', $reference)
            ->when($orgId, fn($q) => $q->where('organisation_id', $orgId))
            ->first();

        abort_if(!$complaint, 404);

        return view('complaints.show', compact('complaint'));
    }
}
