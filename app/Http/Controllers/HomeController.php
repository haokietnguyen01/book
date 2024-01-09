<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Image;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $books = Book::all();

        return view('frontend.home', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function bookCreate(Request $request)
    {
        $data = $request->all();
        $uploadedFileUrl = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        // if($request->hasfile('image'))
        // {
        //     // dd($request->hasfile('image'));
        //     foreach($request->file('image') as $image)
        //     {
        //         // dd($image);
        //         $name = $image->getClientOriginalName();
        //         //$image->move('upload/product/', $name);
        //         $path = public_path('upload/book/' . $name);            
        //         Image::make($image->getRealPath())->save($path);
        //         $dataImage[] = $name;
        //     }
        // }
        // dd($uploadedFileUrl);
        $book = new Book();
        $book->book_name = $request['bookname'];
        $book->release_date = $request['releaseDate'];
        $book->actor = $request['Actor'];
        $book->image_Path = $uploadedFileUrl;
        $book->save();
        return redirect('book/list');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function listBook()
    {
        $books = Book::all();
        return view('frontend.listBook', compact('books'));
    }

    /**
     * Display the specified resource.
     */
    public function bookCreateForm()
    {
        return view('frontend.uploadbook');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function bookUpdateForm(Request $request, string $id)
    {
        $book = book::where('id', $id)->first();
        $book->release_date = Carbon::parse($book->release_date)->format('Y-m-d');
        return view('frontend.updateBook', compact('book'));
    }

    public function bookUpdate(Request $request, string $id)
    {
        $data = $request->all();
        if($request->hasfile('image'))
        {
            // dd($request->hasfile('image'));
            foreach($request->file('image') as $image)
            {
                // dd($image);
                $name = $image->getClientOriginalName();
                //$image->move('upload/product/', $name);
                $path = public_path('upload/book/' . $name);            
                Image::make($image->getRealPath())->save($path);
                $dataImage[] = $name;
            }
        }
        // $book = book::findOrFail($id);
        book::where('id',$id)->update([
            'book_name' => $request['bookname'],
            'release_date' => $request['releaseDate'],
            'actor' => $request['Actor'],
        ]);
        if($request->hasfile('image')) {
            book::where('id',$id)->update([
                'image_Path' => json_encode($dataImage),
            ]);
        }
        // $book->book_name = $request['bookname'];
        // $book->release_date = $request['releaseDate'];
        // $book->actor = $request['Actor'];

        // $book->save();
        return redirect('book/list');



    }
    /**
     * Remove the specified resource from storage.
     */
    public function bookDelete(string $id)
    {
       book::where('id', $id)->delete(); 
       return redirect('book/list');
    }
}
