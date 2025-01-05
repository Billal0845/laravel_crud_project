<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost()
    {
        return view('createPost');
    }

    public function ourFileStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png',
        ]);

        $imageName = null;
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;


        if ($post->save()) {
            echo "data inserted successfully";
            return redirect()->route('home')->with('success', 'Data inserted successfully!');
        }
    }



    public function editdata($id)
    {
        $post = Post::find($id);
        return view('edit', ['postToUpdate' => $post]);
    }

    public function updateData($id, Request $request)
    {



        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png',
        ]);



        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;

        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }


        if ($post->save()) {
            flash()->success('Data updated successfully!');
            return redirect()->route('home');
        }
    }


    public function deleteData($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        flash()->success("Successfully deleted!");
        return redirect()->route('home');
    }


}
