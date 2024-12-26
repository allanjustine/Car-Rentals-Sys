<?php

namespace App\Http\Controllers;

use App\Models\CarDetail;
use App\Models\Renter;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CarDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car_details = CarDetail::orderBy('make')->with('renters')->paginate(10);

        return inertia('car-details/Index', compact('car_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('car-details/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required|unique:car_details',
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'mileage' => 'required',
            'availability' => 'required',
            'rental_rate' => 'required',
        ]);

        CarDetail::create([
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'color' => $request->color,
            'mileage' => $request->mileage,
            'availability' => $request->availability,
            'rental_rate' => $request->rental_rate,
        ]);

        return redirect('/car-details')->with('success', 'A new book has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car_detail = CarDetail::findOrFail($id);

        return Inertia::render('car-details/Edit', [
            'car_detail' => $car_detail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarDetail $carDetail)
    {
        $carDetail->update([
            'make' => $request->input('make'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'color' => $request->input('color'),
            'mileage' => $request->input('mileage'),
            'availability' => $request->input('availability'),
            'rental_rate' => $request->input('rental_rate'),

        ]);


        return redirect('/car-details')->with('success', 'The Car Detail updated successfully.');
    }

    public function delete($id)
    {
        $car_detail = CarDetail::findOrFail($id);

        return Inertia::render('car-details/Delete', [
            'car_detail' => $car_detail,
        ]);
    }

    public function destroy($id)
    {
        $car_detail = CarDetail::findOrFail($id);

        $renterUse = Renter::where('car_detail_id', $id)->exists();
        if ($renterUse) {
            return back()->with('error', 'Cannot delete the car as it is in use by renters.');
        }

        $car_detail->delete();

        return redirect('/car-details')->with('success', 'Car deleted from list successfully');
    }
}
