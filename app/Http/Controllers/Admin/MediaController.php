<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\MediaRequest;
use App\Repositories\Eloquents\MediaEloquent;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    //
    private $media;

    public function __construct(MediaEloquent $media)
    {
        $this->media = $media;
    }

    public function index()
    {
        return view(admin_vw() . '.website.media.index');
    }

    public function create()
    {
        return $this->media->modal_create();
    }

    public function edit($id)
    {
        return $this->media->modal_update($id);

    }

    public function anyData()
    {
        return $this->media->anyData();
    }


    public function store(MediaRequest $request)
    {
        return $this->media->create($request->all());
    }

    public function update(MediaRequest $request, $id)
    {
        return $this->media->update($request->only(['icon', 'name', 'link']), $id);
    }

    public function delete($id)
    {
        return $this->media->delete($id);
    }
}
