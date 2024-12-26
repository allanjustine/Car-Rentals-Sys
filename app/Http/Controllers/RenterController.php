<?php

namespace App\Http\Controllers;

use App\Models\CarDetail;
use App\Models\Renter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renters = Renter::orderBy('name')->with('car_detail')->paginate(10);

        return inertia('renters/Index', compact('renters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $car_details = CarDetail::where('availability', 'Available')->get();
        return inertia('renters/Create', [
            'car_details' => $car_details
        ]);
        return inertia('renters/Create');
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
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'day' => 'required',
            'car_detail_id' => 'required'
        ]);

        $carDetail = CarDetail::findOrFail($request->car_detail_id);

        $rentalRate = $carDetail->rental_rate;
        $numOfDays = $request->day;
        $costs = $rentalRate * $numOfDays;

        Renter::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'day' => $request->day,
            'cost' => $costs,
            'car_detail_id' => $request->car_detail_id
        ]);

        return redirect('/renters')->with('success', 'A new renter has been added.');
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
        $renter = Renter::with('car_detail')->findOrFail($id);
        $car_details = CarDetail::all();

        return Inertia::render('renters/Edit', [
            'renter' => $renter,
            'car_details' => $car_details,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Renter $renter)
    {
        $request->validate([
            'name' => 'required|unique:renters,name,' . $renter->id,
            'address' => 'required',
            'email' => 'required|unique:renters,email,' . $renter->id,
            'phone' => 'required',
            'day' => 'required',
            'car_detail_id' => 'required'
        ]);

        $carDetail = CarDetail::findOrFail($request->car_detail_id);

        $rentalRate = $carDetail->rental_rate;
        $numOfDays = $request->day;
        $costs = $rentalRate * $numOfDays;

        $renter->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'day' => $request->input('day'),
            'cost' => $costs,
            'car_detail_id' => $request->input('car_detail_id')

        ]);


        return redirect('/renters')->with('success', 'The renter detail updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $renter = Renter::with('car_detail')->findOrFail($id);
        $car_details = CarDetail::all();

        return Inertia::render('renters/Delete', [
            'renter' => $renter,
            'car_details' => $car_details,
        ]);
    }

    public function destroy($id)
    {
        $renter = Renter::findOrFail($id);
        $renter->delete();

        return redirect('/renters')->with('success', 'Renter deleted from list successfully');
    }

    public function view($id)
    {
        $renter = Renter::with('car_detail')->findOrFail($id);
        $car_details = CarDetail::all();

        return Inertia::render('renters/View', [
            'renter' => $renter,
            'car_details' => $car_details,
        ]);
    }
}
