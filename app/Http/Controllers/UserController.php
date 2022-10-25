<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $ticket_count = count(Ticket::where('user_id', $id)->get());
        $note = Note::where('user_id', $id)->first();


        if ($user) {
            return view('pages.admin.user_page', [
                'user' => $user,
                'ticket_count' => $ticket_count,
                'note' => $note
            ]);
        } else {
            return back()->with('fail', 'User not found');
        }
    }

    public function edit($id)
    {
        //
        return $id;
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'phone' => ['nullable', 'regex:/(06)[0-9]/', 'min:10', 'max:10', 'nullable'],
            'email' => ['required', 'email'],
            'occupation' => ['string', 'nullable']
        ]);
        $user = User::findOrFail($id);
        $user->fill($request->input())->save();


        return back()->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        if (auth()->user()->admin_role === 0) abort(404);
        $user = User::findOrFail($id);
        $tickets_from_user = Ticket::where('user_id', $id)->delete();

        if ($user) {
            $user->delete();
            if ($tickets_from_user) {

                return redirect('/users')->with('success', 'User deleted successfuly');
            }
        } else {
            return redirect('/users')->with('fail', 'Ik kon de gebruiker niet vinden');
        }
    }
}
