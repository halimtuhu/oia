<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    public function record($id, $activity){
      $new = new Log;
      $new->uid = $id;
      $new->activity = $activity;
      $new->save();
    }
}
