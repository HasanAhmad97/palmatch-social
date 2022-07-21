<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Constant\HobbyRequest;
use App\Http\Requests\Constant\InterestRequest;
use App\Repositories\Eloquents\HobbyEloquent;
use App\Repositories\Eloquents\InterestEloquent;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    //
    private $hobby;

    public function __construct(HobbyEloquent $hobby)
    {
        $this->hobby = $hobby;
    }

    public function index()
    {
        return view(admin_constants_vw() . '.hobbies.index');
    }

    public function create()
    {
        return view(admin_constants_vw() . '.hobbies.create');
    }

    public function edit($id)
    {
        $hobby = $this->hobby->getById($id);
        $data = [
            'hobby' => $hobby
        ];
        return view(admin_constants_vw() . '.hobbies.edit', $data);
    }

    public function anyData()
    {
        return $this->hobby->anyData();
    }


    public function store(HobbyRequest $request)
    {
        return $this->hobby->create($request->all());
    }

    public function update(HobbyRequest $request, $id)
    {
        return $this->hobby->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->hobby->delete($id);
    }

}
