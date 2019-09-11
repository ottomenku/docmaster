<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Carbon\Carbon;
class Roletime extends Model
{
    use LogsActivity;
    use SoftDeletes; //add this line
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'role_id','admin_id','pay_id','note','start', 'end'];

    /**
     * A role may be given various permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

 public function pay()
    {
        return $this->belongsTo('App\Pay');
    }
    public function admin()
    {
        return $this->belongsTo('App\Pay');
    }


    public static function hasRole($user_id,$role_id)
    {
        $res=false;
        $date= Carbon::now(); 
      //  $roletime = DB::table('roletimes')->where([
      //    $roletime = Roletime::where([
          $roletimes = Roletime::where([
            ['user_id', '=', $user_id],
            ['role_id', '=', $role_id],
          // ['start', '>=', $date],
           // ['end', '<=', $date],
        ])->get();
    foreach ($roletimes as $roletime) {
      if($roletime->start <=$date && $roletime->end >= $date){$res=true;}
    }
        
        return $res;
    }

}
