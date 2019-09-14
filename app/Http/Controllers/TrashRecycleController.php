<?php

namespace App\Http\Controllers;

use App\Entity\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TrashRecycleController extends Controller
{
    public function index(Request $request)
    {
        $ticket = Ticket::create(
            $request->all()
        );

        return response()
            ->json(['ticket' => $ticket])
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
