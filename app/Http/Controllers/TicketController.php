<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        if (auth()->user()->admin_role === 1) abort(404);
        if (auth()->user()->phone === null) return view('pages.user.more_inputs')->with('fail', 'Je moet je telefoonnummer en je bedrijfsnaam invullen om tickets te maken');
        if (auth()->user()->occupation === null) return view('pages.user.more_inputs')->with('fail', 'Je moet je telefoonnummer en je bedrijfsnaam invullen om tickets te maken');

        return view('ticket.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'type_problem' => ['required'],
                'problem_desc' => ['required', 'string']
            ],
            [
                'problem_desc.required' => 'Je moet meer over je probleem vertelen'
            ]
        );

        $make_ticket = Ticket::create([
            'type_problem' => $request->type_problem,
            'problem_desc' => $request->problem_desc,
            'status' => 'new',
            'user_id' => auth()->user()->id
        ]);

        if ($make_ticket) {
            return redirect('/alle_tickets')->with('success', 'Je ticket is gemaakt.');

            // if(auth()->user()->admin_role === 1) redirect('/alle_tickets');
        } else {
            return back()->with('fail', 'Er is iets mislukt gegaan. Probeer het later opnieuw.');
        }
    }

    public function show($id)
    {
        if (auth()->user()->admin_role === 0) abort(404);

        $ticket = Ticket::findOrfail($id);

        $ticket->status = 'checked';
        $ticket->update();


        return view('ticket.show', [
            'ticket' => $ticket
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        if (auth()->user()->admin_role === 0) abort(404);
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect('/alle_tickets');
    }
}
