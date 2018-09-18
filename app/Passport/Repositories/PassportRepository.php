<?php
namespace App\Passport\Repositories;

use App\Passport\Models\Passport;

class PassportRepository
{
    protected $passport;

  public function __construct(Passport $passport)
  {
    $this->passport = $passport;
  }
  public function create($attributes)
  {
    $this->passport->create($attributes);
  }
  
  public function all()
  {
    return $this->passport->all();
  }

  public function find($id)
  {
    return $this->passport->find($id);
  }
  
  public function update($id, array $attributes)
  {
     $this->passport->find($id)->update($attributes);
  }
 
  public function delete($id)
  {
    return $this->passport->find($id)->delete();
  }
}