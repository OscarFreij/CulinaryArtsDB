<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('resources.image');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        //$request->image->move(public_path('images'), $imageName);
        $request->file('image')->storeAs('public', $imageName);


        $image = new Image;
        $image->filename = $imageName;
        $image->user_id = Auth::user()->id;        
        $image->save();
    
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName); 
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $image = Image::find($request->id);

        //dd($image);
        if (isset($image->id))
        {
            if ($image->user_id == Auth::user()->id)
            {
                Image::destroy($image->id);
                if(Storage::disk('public')->exists($image->filename)){
                    Storage::disk('public')->delete($image->filename);
                }else{
                    abort(404, "The image file was not found but the record was deleted.");
                }
                return back()
                    ->with('success','You have successfully deleted image with id '.$image->id.'.');
            }else{
                abort(401, "Unable to delete image, user unauthorized.");
            }
        }
        else
        {
            abort(404, "The image file was not found.");
        }
    }
}
