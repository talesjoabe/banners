<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class BannerItensController extends Controller
{
    use GuardHelpers;
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Banner $banner)
    {
        $id_banner = $banner->id;
        return view('createItens', compact('id_banner'));
    }
}
