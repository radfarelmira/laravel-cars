<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Car;
use App\Category;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $form_data = $request->all();

        $request->validate($this->getValidationRules());


        // salviamo le informazioni nel database
        $new_car = new Car();
        $new_car->fill($form_data);
        
        $new_car->save();

        return redirect()->route('admin.cars.show', [$new_car->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);
        // add category
        $categories = Category::all();
        // dd($category);
        $data = [
            'car' => $car,
            'categories' => $categories
        ];

        return view('admin.cars.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $categories = Category::all();

        $data = [
            'car' => $car,
            'categories' => $categories
        ];

        return view('admin.cars.edit', $data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $form_data = $request->all();
        $request->validate($this->getValidationRules());

        $car_to_update = Car::findOrFail($id);
        
        $car_to_update->update($form_data);

        return redirect()->route('admin.cars.show', [$car_to_update->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car_to_delete = Car::findOrFail($id);
        $car_to_delete->delete();

        return redirect()->route('admin.cars.index');
    }

    
    // all validation here
    protected function getValidationRules() {
        return [
            'marca' => 'required',
            'modello' => 'required',
            'cilindrata' => 'required',
            'porte' => 'required',
            'img' => 'required',
            'category_id' => 'exists:categories,id|nullable'
        ];
    }
}
