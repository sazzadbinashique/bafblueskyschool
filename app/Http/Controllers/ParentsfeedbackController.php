<?php

namespace App\Http\Controllers;

use App\Mail\ParentFeedbackMail;
use App\Parentsfeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;
use Auth;

class ParentsfeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->name == 'SuperAdmin' || Auth::user()->name == 'BafwwaAdmin'){
          $datas = Parentsfeedback::orderBy('id', 'ASC')->get();
        }else{
          $datas = Parentsfeedback::where('created_by',Auth::user()->name)->orderBy('id', 'ASC')->get();
        }
        
        return view('parentsfeedback-mgmt/index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $created_by = Auth::user()->name;
        return view('parentsfeedback-mgmt/create',compact('created_by'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keys = [
            'email',
            'subject',
            'comments',
            'created_by'
        ];
        
        $input = $this->createQueryInput($keys, $request);
        Parentsfeedback::create($input);

        return redirect()->intended('/parentsfeedback-mgmt')->with('message', 'Data created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parentsfeedback  $parentsfeedback
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Datas = Parentsfeedback::where('id', $id)->first();
        $updated_by = Auth::user()->name;
        return view('parentsfeedback-mgmt/show', ['data' => $Datas,'updated_by' => $updated_by]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parentsfeedback  $parentsfeedback
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Datas = Parentsfeedback::where('id', $id)->first();
        $updated_by = Auth::user()->name;
        return view('parentsfeedback-mgmt/edit', ['data' => $Datas,'updated_by' => $updated_by]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parentsfeedback  $parentsfeedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        $datas = Parentsfeedback::findOrFail($id);

        $keys = [
            'email',
            'subject',
            'comments',
            'updated_by'
        ];

        $input = $this->createQueryInput($keys, $request);

        Parentsfeedback::where('id', $id)->update($input);

        return redirect()->intended('/parentsfeedback-mgmt')->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parentsfeedback  $parentsfeedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parentsfeedback $parentsfeedback)
    {
        //
    }

    // send email
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string',
            'comments' => 'required',
            'gen_reply' => ''
        ]);

        $parentsfeedback = Parentsfeedback::find($request->id);
        
        $email = $request->input('email');
        $subject = $request->input('subject');
        $comments = $request->input('comments');
        $gen_reply = $request->input('gen_reply');

        $data = [
            'email' => $email,
            'subject' => $subject,
            'comments' => $comments,
            "gen_reply" => $gen_reply
        ];

        DB::beginTransaction();
        try {

            Mail::to($email)->send(new ParentFeedbackMail($data));

            $parentsfeedback->gen_reply = $gen_reply;
            $parentsfeedback->email_send_sts = 1;
            $parentsfeedback->save();

            DB::commit();

            // Success message
            Session::flash('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return $e;
            DB::rollback();
            // Error message
            Session::flash('error', 'Failed to send email. Please try again later.');
        }

        return redirect()->back();
    }


    public function remove($id)
    {
        $datas = Parentsfeedback::findOrFail($id);

        Parentsfeedback::where('id', $id)->delete();
        
        return redirect()->intended('/parentsfeedback-mgmt')->with('warning', 'Successfully Removed');
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
}
