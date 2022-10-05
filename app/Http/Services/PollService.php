<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\User;
use App\Models\Answer;
use Session;
 

class PollService {

    private $pollModel;
    private $userModel;

    public function __construct(Poll $pollModel, User $userModel, Answer $answerModel)
    {
        $this->pollModel = $pollModel;
        $this->userModel = $userModel;
        $this->answerModel = $answerModel;
    }

    public function index()
    {
        $polls = $this->pollModel->whereNull('deleted_at')->paginate(10);
        return view('polls.index',compact('polls'));
    }

    public function create($request)
    {
        return view('polls.create');
    }

    public function createPost($request)
    {
        if (is_null($request->name) || is_null($request->answer1)) {
            flash('Campos necessários não foram inseridos');
            return redirect()->route('polls.create');
        } 

        //Criação da enquete
        $poll = $this->pollModel->create(['name' => $request->name]);

        $pollId =  $poll->id;

        $this->receiveAnswersAndTryCreate($pollId, $request->answer1);
        $this->receiveAnswersAndTryCreate($pollId, $request->answer2);

        //Como cada enquete tem pelo menos 2 respostas possíveis, validação para as outras 3
        if (!is_null($request->answer3)) $this->receiveAnswersAndTryCreate($pollId, $request->answer3);
        if (!is_null($request->answer4)) $this->receiveAnswersAndTryCreate($pollId, $request->answer4);
        if (!is_null($request->answer5)) $this->receiveAnswersAndTryCreate($pollId, $request->answer5);
           
        flash('A enquete foi criada com sucesso');
        return redirect()->route('polls.index');

    }

    public function sendWpp($id)
    {
        $poll = $this->pollModel->where('id', $id)->first();

        $users = $this->userModel->all();

        return view('polls.sendwpp',compact('poll', 'users'));
    }

    private function receiveAnswersAndTryCreate($pollId, $answer) 
    {
      if (is_null($pollId)) {
            flash('Uma ou mais questões não foram criadas');
            return redirect()->route('polls.create');
      }

      $createdAnswer = $this->answerModel->create(['name' => $answer, 'poll_id' => $pollId]);

      if (isset($createdAnswer->id)) return true;


      flash('Uma ou mais questões não foram criadas');
      return redirect()->route('polls.create');
    }

    public function delete ($id)
    {
       
        if ($this->pollModel->where('id', $id)->delete() && $this->answerModel->where('poll_id', $id)->delete()) {
            flash('Enquete deletada com sucesso');
            return redirect()->route('polls.index');
        }
            flash('Enquete deletada não foi deletada');
            return redirect()->route('polls.index');
        
    }


}
