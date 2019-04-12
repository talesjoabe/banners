<?php

namespace App\Http\Controllers;

use App\Banner;
use App\BannerItens;
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
    public function createForm(Banner $banner)
    {
        $id_banner = $banner->id;
        return view('createItens', compact('id_banner'));
    }

    public function createItem(Request $request, Banner $banner, BannerItens $bannerItens)
    {

        $validateData = Validator::make(array_merge($request->all(), ['banner_id' => $banner->id]), [
            'name' => 'required|string|max:255',
            'banner_id' => 'required|integer|exists:banners,id'
        ]);
        
        $bannerItens->name = $request->get('name');
        $bannerItens->banner_id = $banner->id;
       
        if($request->hasFile('filename'))
        {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $mover = $file->move_uploaded_file($name, );         
            if($file->move_uploaded_file($name, public_path()))
            {
                $fileMovido = true;
                $bannerItens->filename = $name;

            }
            else {
                $fileMovido = false;
            }
        }


        if($fileMovido){
           $bannerItens->save();
            
           return redirect('banners')->with('status', 'Item Banner cadastrado com sucesso!'); 
       }
       else {
            return redirect('banners')->with('status', 
            'bla' ); 

       }
    }
}
