<?php

namespace App\Http\Controllers;

use App\Tread;
use Illuminate\Http\Request;

class TreadController extends Controller
{
    
  public function __construct()
    {
        return $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads= Tread::paginate(15);
        return view('index',compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        
        $this->validate($request,[
            'subject'=>'required',
            'type'=>'required',
            'thread'=>'required',
        ]);
            
            //store
        auth()->user()->threads()->create($request->all());
            
           
        
            //redirect
        
        return back()->withMessage('Thread Created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tread  $tread
     * @return \Illuminate\Http\Response
     */
    public function show(Tread $thread)
    {
        
        return view('single',compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tread  $tread
     * @return \Illuminate\Http\Response
     */
    public function edit(Tread $thread)
    {
        return view('edite',compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tread  $tread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tread $thread)
    {
      if(auth()->user()->id !== $thread->user_id){
        abort(401,"unauthorized");
        }
        
        $this->validate($request,[
            'subject'=>'required',
            'type'=>'required',
            'thread'=>'required',
        ]);
        

        
        //update
        
        $thread->update($request->all());
        
        //redirect
        
        return redirect()->route('thread.show', $thread->id)->withMessage('Thread Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tread  $tread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tread $thread)
    {
     if(auth()->user()->id !== $thread->user_id){
        abort(401,"unauthorized");
     }
        
        $thread->delete();
        
        return redirect()->route('thread.index')->withMessage("Thread Deleted !");
        
    }
}
