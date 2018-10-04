<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pencil;

class PencilController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	$pencils = Pencil::all();

    	return view ('pencils.index', [
    		'pencils' => $pencils 
    		]);
    }

    public function store (Request $request)
    {
    	 $this->validate($request, [
        'name' => 'required|max:255',
    ]);

    	$pencil = new Pencil();
		$pencil->name = $request->input('name');
		$pencil->user_id = $request->user()->id;
		$pencil->save();

		return redirect('/pencils');
    }

    public function edit($id)
    {
    	$pencil = Pencil::find($id);

		return view('pencils.edit', [
			'pencil' => $pencil
		]);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
			'name' => 'required|min:5'
		]);

		$pencil = Pencil::find($id);	
		$pencil->name = $request->input('name');
		$pencil->save();

		return redirect('/pencils');
    }

   	public function destroy(Request $request, Pencil $pencil)
	{
		
		$pencil->delete();
		return back();
	}


}
