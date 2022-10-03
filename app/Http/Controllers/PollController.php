<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PollService;

class PollController extends Controller
{
    private $pollService;

    public function __construct(PollService $pollService)
    {
        $this->pollService = $pollService;
    }

    public function index()
    {
      return  $this->pollService->index();
    }

    public function create(Request $request)
    {
      return  $this->pollService->create($request);
    }

    public function createPost(Request $request)
    {
      return  $this->pollService->createPost($request);
    }

    public function sendWpp($id)
    {
      return  $this->pollService->sendWpp($id);
    }
}
