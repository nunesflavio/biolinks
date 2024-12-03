<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Link extends Model
{

    protected $fillable = ['link', 'name'];


    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function moveUp(): void
    {

        $this->move(-1);

    }

    public function moveDown(): void
    {
       $this->move(+1);
    }

    public function move($to) {
        $order = $this->sort;
        $newOrder = $order + $to;

        $swapWith = $this->user->links()->where('sort', '=', $newOrder)->first();
        // dump($link->toArray(), $swapWith->toArray(), $newOrder);

        $this->fill(['sort' => $newOrder])->save();
        $swapWith->fill(['sort' => $order])->save();
    }
}