<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class EventsModel extends Model
{
    use HasFactory;

    public function getAllEvents(){
        try {
            return DB::table('events')
                ->select('name','imgPath','slug','eventBegin','eventEnd')
                ->orderBy('created_at','DESC')
                ->get();
        }catch (QueryException $e){
            return collect();
        }
    }
    public function createEvents(array $input){
        try {
            return $this->create([
                'name' => $input['name'],
                'discount' => $input['discount'],
                'imgPath' => $input['imgPath'],
                'eventBegin' => $input['eventBegin'],
                'eventEnd' => $input['eventEnd'],
                'slug' => $input['slug'],
            ]);
        }catch (QueryException $e){
            return collect();
        }
    }
}
