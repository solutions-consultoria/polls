<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\User;
use Session;
 

class PollService {

    private $pollModel;
    private $userModel;

    public function __construct(Poll $pollModel, User $userModel)
    {
        $this->pollModel = $pollModel;
        $this->userModel = $userModel;
    }

    public function index()
    {
        $polls = $this->pollModel->paginate(10);
        return view('polls.index',compact('polls'));
    }

    public function create($request)
    {
        return view('polls.create');
    }

    public function createPost($request)
    {
        return $request->all();
    }

    public function sendWpp($id)
    {
        $poll = $this->pollModel->where('id', $id)->first();
        $users = $this->userModel->all();
        return view('polls.sendwpp',compact('poll', 'users'));
    }


}
