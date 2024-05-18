<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Trainer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'trainer';
    protected $primaryKey = 'gym_membership_id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact_number',
        'address',
        'bio',
        'specialization',
        'certifications',
        'gym_affiliation',
        'gym_membership_id',
        'certification_proof',
        'background_check_document',
        'terms_accepted',
    ];
    
    // Separate fillable fields for updates
    protected $fillableForUpdates = [
        'name',
        'email',
        'contact_number',
        'address',
        'bio',
        'specialization',
        'gym_affiliation',
    ];

    public function getFillableForUpdates()
    {
        return $this->fillableForUpdates;
    }
}
