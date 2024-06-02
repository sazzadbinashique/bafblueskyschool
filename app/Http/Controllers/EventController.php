<?php

namespace App\Http\Controllers;

use App\Event;
use App\NoticeBoard;
use App\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use DB;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Event::orderBy('id', 'ASC')->get();
        return view('event-mgmt/index', ['datas' => $datas]);
    }

    public function allShow()
    {
        $datas = Event::orderBy('id', 'ASC')->get();
        return view('frontend/notice', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event-mgmt/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $input['event_title'] = $request->event_title;
        $input['event_publish_dt'] = $request->event_publish_dt;
        $input['event_time'] = $request->event_time;
        $input['event_description'] = $request->event_description;
        $input['location'] = $request->location;
        
        Event::create($input);

        return redirect()->intended('/event-mgmt')->with('message', 'Data created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $datas = Event::find($id);
      return view('event-mgmt/view', ['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Datas = Event::where('id', $id)->first();
        return view('event-mgmt/edit', ['data' => $Datas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    $notice = Event::findOrFail($id);

    $input['event_title'] = $request->event_title;
    $input['event_publish_dt'] = $request->event_publish_dt;
    $input['event_time'] = $request->event_time;
    $input['event_description'] = $request->event_description;
    $input['location'] = $request->location;
    
    $notice->update($input);

    return redirect()->intended('/event-mgmt')->with('message', 'Data updated Successfully');
    
    }

    public function remove($id)
    {
        $datas = Event::findOrFail($id);
        // Specify the path to the image file
        $imageName = $datas['file']; // $imageName is the name of the image file
        // Specify the path to the image file
        $imagePath = public_path($imageName); // $imageName is the name of the image file
        // Check if the file exists before attempting to delete
        if (File::exists($imagePath)) {
            // Delete the file
            File::delete($imagePath);

            // Optionally, you can also remove the image record from the database or take any other necessary actions.
        } else {
            // Handle the case where the file does not exist
        }
        Event::where('id', $id)->delete();
        return redirect()->intended('/event-mgmt')->with('warning', 'Successfully Removed');
    }


    private function createQueryInput($keys, $request)
    {
        $queryInput = [];
        for ($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }

    private function validateInput($request)
    {
        $rules = [
            'title' => 'required'

        ];
        $validator = Validator::make($request->all(), $rules);
        return $validator;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }


}
