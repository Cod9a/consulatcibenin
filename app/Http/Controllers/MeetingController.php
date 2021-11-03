<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;
use App\Models\Meeting;
use Illuminate\Validation\ValidationException;

class MeetingController extends Controller
{
    public function create() {
        return view('meetings.create');
    }

    public function index()
    {
        $meetings = Meeting::query();
        if (request()->has('date')) {
            $meetings = $meetings->whereDate('meeting_date', '=', request()->get('date'));
        }
        $meetings = $meetings->orderBy('meeting_date', 'desc')->paginate();
        return response()->json($meetings);
    }
    
    public function store(Request $request) {
        $request->validate([
            'payment_token' => ['required', 'exists:demands,payment_token'],
            'meeting_date' => ['required', 'date', 'after:now'],
        ]);
        $demand = Demand::firstWhere('payment_token', $request->payment_token);
        if ($demand->rejection) {
            throw ValidationException::withMessages([
                'payment_token' => 'The selected payment token is invalid',
            ]);
        }
        if ($demand->meeting) {
            throw ValidationException::withMessages([
                'payment_token' => 'Vous ne pouvez pas etablir plusieurs rendez-vous pour une meme demande',
            ]);
        }
        if ($demand->status !== 'disponible')  {
            throw ValidationException::withMessages([
                'payment_token' => 'Votre document n\'est pas encore prêt',
            ]);
        }
        $meeting = Meeting::create([
            'demand_id' => $demand->id,
            'meeting_date' => $request->meeting_date,
        ]);
        return response()->json($meeting, 201);
    }
}
