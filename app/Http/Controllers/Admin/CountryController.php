<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Constant\CountryRequest;
use App\Repositories\Eloquents\CountryEloquent;

class CountryController extends Controller
{
    //


    private $country;

    public function __construct(CountryEloquent $country)
    {
        $this->country = $country;
    }

    public function index()
    {
        return view(admin_constants_vw() . '.countries.index');
    }

    public function create()
    {
        return view(admin_constants_vw() . '.countries.create');
    }

    public function edit($id)
    {
        $country = $this->country->getById($id);
        $data = [
            'country' => $country
        ];
        return view(admin_constants_vw() . '.countries.edit', $data);
    }

    public function anyData()
    {
        return $this->country->anyData();
    }


    public function store(CountryRequest $request)
    {
        return $this->country->create($request->all());
    }

    public function update(CountryRequest $request, $id)
    {
        return $this->country->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->country->delete($id);
    }
}
