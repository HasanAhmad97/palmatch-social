<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Constant\ReligionRequest;
use App\Repositories\Eloquents\ReligionEloquent;

class ReligionController extends Controller
{
    //

    private $religion;

    public function __construct(ReligionEloquent $religion)
    {
        $this->religion = $religion;
    }

    public function index()
    {
        return view(admin_constants_vw() . '.religions.index');
    }

    public function create()
    {
        return view(admin_constants_vw() . '.religions.create');
    }

    public function edit($id)
    {
        $religion = $this->religion->getById($id);
        $data = [
            'religion' => $religion
        ];
        return view(admin_constants_vw() . '.religions.edit', $data);
    }

    public function anyData()
    {
        return $this->religion->anyData();
    }

    public function store(ReligionRequest $request)
    {
        return $this->religion->create($request->all());
    }

    public function update(ReligionRequest $request, $id)
    {
        return $this->religion->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->religion->delete($id);
    }
}
