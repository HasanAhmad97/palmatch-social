<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\StoryRequest;
use App\Repositories\Eloquents\StoryEloquent;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    //
    private $story;

    public function __construct(StoryEloquent $story)
    {
        $this->story = $story;
    }

    public function index()
    {
        return view(admin_vw() . '.website.stories.index');
    }

    public function create()
    {
        return view(admin_vw() . '.website.stories.create');
    }

    public function edit($id)
    {
        $story = $this->story->getById($id);
        $data = [
            'story' => $story
        ];
        return view(admin_vw() . '.website.stories.edit', $data);
    }

    public function anyData()
    {
        return $this->story->anyData();
    }


    public function store(StoryRequest $request)
    {
        return $this->story->create($request->all());
    }

    public function update(StoryRequest $request, $id)
    {
        return $this->story->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->story->delete($id);
    }
}
