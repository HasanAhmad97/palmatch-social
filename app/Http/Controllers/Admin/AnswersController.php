<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\AnswersRequest;
use App\Question;
use App\Repositories\Eloquents\AnswersEloquent;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    //

    private $answers;

    public function __construct(answersEloquent $answers)
    {
        $this->answers = $answers;
    }

    public function index()
    {
        return view(admin_vw() . '.website.answers.index');
    }

    public function create()
    {
        $data = [
            'questions' => Question::all(),
        ];
        return view(admin_vw() . '.website.answers.create', $data);
    }

    public function edit($id)
    {
        $answer = $this->answers->getById($id);
        $data = [
            'answers' => $answer,
            'questions' => Question::all(),

        ];
        return view(admin_vw() . '.website.answers.edit', $data);
    }

    public function anyData()
    {
        return $this->answers->anyData();
    }


    public function store(AnswersRequest $request)
    {
        return $this->answers->create($request->all());
    }

    public function update(AnswersRequest $request, $id)
    {
        return $this->answers->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->answers->delete($id);
    }

}
