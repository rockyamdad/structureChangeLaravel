<?php

namespace App\Http\Controllers\Passport;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Passport\PassportService;
use App\Passport\Mail\UserEmail;
use Illuminate\Support\Facades\Mail;

class PassportController extends Controller
{
    protected $passportservice;
 
    public function __construct(PassportService $passportservice)
    {
    $this->passportservice = $passportservice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = $this->passportservice->getAppointments(); 

        return view('Passport.index',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Passport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->passportservice->createAppointment($request->all());
        $data = 'Congratzz!! You are successfully applied for Passport.';

        Mail::to($request->get('email'))->send(new UserEmail($data));

        return redirect('passports')->with('success', 'Information has been added');
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
        $passport = $this->passportservice->findPassport($id);

        return view('Passport.edit',compact('passport','id'));
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
        $this->passportservice->updateAppointment($request->all(), $id);

        return redirect('passports')->with('success','Information has been  updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->passportservice->deletePassport($id);

       return redirect('passports')->with('success','Information has been  deleted');
    }
}
