<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function alle_tickets()
    {
        // check if user is verified
        if (auth()->user()->is_verified === 0) return view('pages.user.await_verification');

        // check if he is admin
        if (auth()->user()->admin_role === 1) {
            $tickets = Ticket::all()->sortByDesc('created_at');
            if (!$tickets) return view('pages.admin.alle_tickets');
            return view('pages.admin.alle_tickets', ['tickets' => $tickets]);
        } else if (auth()->user()->admin_role === 0) {
            $tickets = Ticket::all()->sortByDesc('created_at')->where('user_id', auth()->user()->id);
            if (!$tickets) return view('pages.user.alle_tickets');
            return view('pages.user.alle_tickets', ['tickets' => $tickets]);
        }
    }

    public function users()
    {
        if (auth()->user()->admin_role === 0) abort(404);


        $users = User::where('admin_role', 0)->orderBy('first_name')->get();

        return view('pages.admin.Users', [
            'users' => $users
        ]);
    }

    public function history()
    {
        if (auth()->user()->admin_role === 0) abort(404);
        $checked_tickets = Ticket::where('status', 'checked')->get();

        return view('pages.admin.history', [
            'tickets' => $checked_tickets
        ]);

    }

    public function trashed()
    {
        if (auth()->user()->admin_role === 1) {
            return view('pages.admin.trashed');
        } else {
            abort(404);
        }
    }

    public function settings()
    {
        if (auth()->user()->admin_role === 1) {
            return view('pages.admin.settings');
        } else {
            abort(404);
        }
    }
}
