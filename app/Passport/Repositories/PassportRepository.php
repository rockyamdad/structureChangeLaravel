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
    return $this->passport->create($attributes);
  }
  
  public function all()
  {
    return $this->passport->all();
  }

//   public function find($id)
//   {
//    return $this->post->find($id);
//   }
  
//   public function update($id, array $attributes)
//   {
//   return $this->post->find($id)->update($attributes);
//   }
 
//   public function delete($id)
//   {
//    return $this->post->find($id)->delete();
//   }
}