<?php
namespace App\Passport;

use App\Passport\Models\Passport;
use App\Passport\Repositories\PassportRepository;
use Illuminate\Http\Request;

class PassportService
{
	public function __construct(PassportRepository $passport)
	{
		$this->passport = $passport ;
	}

	public function index()
	{
		return $this->passport->all();
	}

    public function createAppointment($attributes)
	{

        if($request->hasfile('filename'))
         {
            $file = $attributes['filename'];
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/public/images/', $name);
         }

        $passport= new \App\Passport\Models\Passport;
        $passport->name=$request->get('name');
        $passport->email=$request->get('email');
        $passport->number=$request->get('number');
        $date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $passport->date = strtotime($format);
        $passport->office=$request->get('office');
        $passport->filename=$name;
        $passport->save();

        $this->passport->create($attributes);
        return $passport;
	}
}
?>