<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Constant\InterestRequest;
use App\Repositories\Eloquents\InterestEloquent;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    //


    private $interest;

    public function __construct(InterestEloquent $interest)
    {
        $this->interest = $interest;
    }

    public function index()
    {
        return view(admin_constants_vw() . '.interests.index');
    }

    public function create()
    {
        return view(admin_constants_vw() . '.interests.create');
    }

    public function edit($id)
    {
        $interest = $this->interest->getById($id);
        $data = [
            'interest' => $interest
        ];
        return view(admin_constants_vw() . '.interests.edit', $data);
    }

    public function anyData()
    {
        return $this->interest->anyData();
    }


    public function store(InterestRequest $request)
    {
        return $this->interest->create($request->all());
    }

    public function update(InterestRequest $request, $id)
    {
        return $this->interest->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->interest->delete($id);
    }
}
