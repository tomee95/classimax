<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdCategory extends Model
{
    use HasFactory;

    const CATEGORY_ICONS = [
        1 => 'fa-car',
        2 => 'fa-soccer-ball-o',
        3 => 'fa-laptop',
        4 => 'fa-briefcase',
        5 => 'fa-apple',
        6 => 'fa-hand-grab-o',
        7 => 'fa-image',
        8 => 'fa-tree',
        9 => 'fa-home'
    ];
}
