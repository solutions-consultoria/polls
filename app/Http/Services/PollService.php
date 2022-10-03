<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Poll;
use Session;
 

class PollService {

    private $pollModel;

    public function __construct(Poll $pollModel)
    {
        $this->pollModel = $pollModel;
    }

    public function index()
    {
        $polls = $this->pollModel->paginate(10);
        return view('polls.index',compact('polls'));
    }

    public function create($request)
    {
        return 'oi';
    }


}
