<?php

namespace App\Http\Controllers;

use App\About;
use App\Client;
use App\Experience;
use App\HappyClient;
use App\Portfolio;
use App\Service;
use App\Settings;
use App\Skill;
use App\Social;
use App\SocialLink;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ServerBag;

class FrontEndController extends Controller
{

    // public function __construct()
    // {
    //     $this->middlware('verified');
    // }

    function Front(){
        $about = About::all();
        $client = Client::all();
        $experience = Experience::all();
        $happyclient = HappyClient::all();
        $portfolio = Portfolio::all();
        $service = Service::all();
        $skill = Skill::all();
        $social = Social::all();
        $sociallink = SocialLink::all();
        $setting = Settings::all();
        return view('frontend.front',[
            'about'=> $about,
            'client'=> $client,
            'experience'=> $experience,
            'happyclient'=> $happyclient,
            'portfolio'=> $portfolio,
            'service'=> $service,
            'skill'=> $skill,
            'social'=> $social,
            'sociallink'=> $sociallink,
            'setting'=> $setting,
        ]);
    }
}
