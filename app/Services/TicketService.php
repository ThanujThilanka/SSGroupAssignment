<?php

namespace App\Services;

use App\Repositories\TicketRepository;

class TicketService
{

    protected $repo;

    public function __construct(TicketRepository $repo)
    {
        $this->repo = $repo;

    }

    public function index()
    {
        $json = $this->repo->json();

        return response()->json($json);

    }

    public function searchByOrganizationId($id)
    {
        $json = $this->repo->searchByOrganizationId($id);
        return response()->json($json);

    }

    public function search($subject)
    {
        $json = $this->repo->search($subject);
        return response()->json($json);

    }

}
