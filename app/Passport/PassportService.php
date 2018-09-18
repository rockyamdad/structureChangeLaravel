<?php
namespace App\Passport;

use App\Passport\Repositories\PassportRepository;
use Illuminate\Http\Request;

class PassportService
{
	public function __construct(PassportRepository $passport)
	{
		$this->passportRepo = $passport ;
	}

	public function getAppointments()
	{
		return $this->passportRepo->all();
	}

    public function createAppointment(array $attributes)
	{
        // Image move
        if($attributes['filename'])
         {
            $file = $attributes['filename'];
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
        
        $date = date_create($attributes['date']);
        $format = date_format($date,"Y-m-d");

        $attributes['date'] = strtotime($format);
        $attributes['filename'] = $name;

        // Data save by repository
        $this->passportRepo->create($attributes);
    }
    
    public function findPassport($id)
	{
		return $this->passportRepo->find($id);
    }

    public function updateAppointment(array $attributes, $id)
	{
	    $this->passportRepo->update($id, $attributes);
    }
    
    
    public function deletePassport($id)
    {
        $this->passportRepo->delete($id);
    }    
}
?>