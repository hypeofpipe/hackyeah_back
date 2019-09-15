<?php

namespace App\Http\Controllers;

use App\Entity\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TrashRecycleController extends Controller
{
    public function index(Request $request)
    {
        $ticket = Ticket::add($request->all());
        $ticket->uploadTrashImage($request->image);

        return response()
            ->json(['ticket' => $ticket])
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
