<?php

namespace App\Http\Controllers;

use App\Models\RiverSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function form(){
         return view('form.form');
    }

    public function formAction(Request $request){
        $data = $request->all();

        // Handle file uploads
        if ($request->hasFile('river_map')) {
            $data['river_map'] = $request->file('river_map')->store('river_maps');
        }

        if ($request->hasFile('photographs')) {
            $photos = [];
            foreach ($request->file('photographs') as $photo) {
                $photos[] = $photo->store('river_photos');
            }
            $data['photographs'] = json_encode($photos); // or implode(', ', $photos);
        }

        $data['declaration_agreed'] = $request->has('declaration_agreed') ? 1 : 0;

        RiverSubmission::create($data);

        return redirect()->back()->with('success', 'River submission successfully saved! We will contact you later!');
    }

    public function mapPage(){
        return view('map');
    }
}
