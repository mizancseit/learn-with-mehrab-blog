<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutCompany extends Model
{
    protected $table = "about_companies";

    protected $fillable = [
        'company_name','contact_1','contact_2','email_1','email_2','location','logo','fb_link','twiter_link','linkedin_link','instagram_link'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

}
