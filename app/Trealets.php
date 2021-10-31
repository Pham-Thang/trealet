<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trealets extends Model
{
    use HasFactory;
	
	protected $table = 'trealets';
	protected $primaryKey = 'id';
	public $incrementing = true;
}
