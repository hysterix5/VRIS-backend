<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Request;
use App\Http\Resources\TicketResource;

class TicketsController extends Controller
{
    public function tickets_create(Request $request) {

        $tickets = new Tickets();
        $tickets->pads_count = $request->pads_count;
        $tickets->tickets_per_pads = $request->tickets_per_pads;
        $tickets->date_issued = $request->date_issued;
        $tickets->issued_by = $request->issued_by;
        $tickets->issued_to = $request->issued_to;
        $tickets->page_from = $request->page_from;
        $tickets->page_to = $request->page_to;

        $tickets->save();
    }

    public function get_tickets() {
        $tickets = Tickets::all();
        return TicketResource::collection($tickets);
    }
}
