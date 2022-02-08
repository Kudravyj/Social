<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Profile extends Model
{
    use HasFactory;
    
    
    protected $guarded = [];
    
    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : '\profile\Sci9clsWhDwAcPLaqBf293QDYNByjXC9pGHXlY5k.jpg';

        return '/storage/' . $imagePath;
    }
    public function profile_bg_Image()
    {
        $imagePath = ($this->bg_image) ? $this->bg_image : 'profile/Новый проект.webp';

        return '/storage/' . $imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
