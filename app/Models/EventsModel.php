<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class EventsModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'idEvent';
    protected $guarded = ['idEvent'];

    public function getAllEvents(){
        try {
            return DB::table('events')
                ->select('name','imgPath','slug','eventBegin','eventEnd')
                ->orderBy('created_at','DESC')
                ->get()
                ->pluck(['name','imgPath','slug','eventBegin','eventEnd']);
        }catch (QueryException $e){
            return collect();
        }
    }
    public function createEvents(array $input):bool{
        try {
            $this->create([
                'name' => $input['name'],
                'discount' => $input['discount'],
                'imgPath' => $input['imgPath'],
                'eventBegin' => $input['eventBegin'],
                'eventEnd' => $input['eventEnd'],
                'slug' => $input['slug'],
            ]);
            return true;
        }catch (QueryException $e){
            return false;
        }
    }
}
