<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Constant\CityRequest;
use App\Repositories\Eloquents\CityEloquent;
use App\Country;

class CityController extends Controller
{
    //


    private $city;

    public function __construct(CityEloquent $city)
    {
        $this->city = $city;
    }

    public function index()
    {
        return view(admin_constants_vw() . '.cities.index');
    }

    public function create()
    {
        $data = [
            'countries' => Country::all(),
        ];
        return view(admin_constants_vw() . '.cities.create', $data);
    }

    public function edit($id)
    {
        $city = $this->city->getById($id);
        $data = [
            'countries' => Country::all(),
            'city' => $city
        ];
        return view(admin_constants_vw() . '.cities.edit', $data);
    }

    public function anyData()
    {
        return $this->city->anyData();
    }


    public function store(CityRequest $request)
    {
        return $this->city->create($request->all());
    }

    public function update(CityRequest $request, $id)
    {
        return $this->city->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->city->delete($id);
    }
}
