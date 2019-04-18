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
            'banner_id' => 'required|integer|exists:banners,id',
            'seconds' => 'required|integer'
        ]);
        $bannerItens->name = $request->get('name');
        $bannerItens->banner_id = $banner->id;
        $bannerItens->seconds = $request->get('seconds') * 1000;

        if($request->hasfile('filename'))
        {
            $file = $request->file('filename');
            $htmlOnlyName = explode('.html', $file->getClientOriginalName());
            $name= time(). $htmlOnlyName[0] . '.blade.php';
            if($file->move(base_path().'/resources/views/htmls/', $name))
            {
                $bannerItens->filename = $name;
                $bannerItens->save();

              return redirect('banners')->with('status', 'Item Banner cadastrado com sucesso!');
            }
            else {
                return redirect('banners')->with('error', 'Erro ao cadastrar item!');
            }
        }


    }

    public function deleteBannerItem(BannerItens $bannerItens)
    {   
        $excluirArquivo = unlink(base_path(). '/resources/views/htmls/'. $bannerItens->filename);
        if ($excluirArquivo) {
            if ($bannerItens->delete())
            {
                return redirect('banners')->with('status', 'Item Banner deletado com sucesso!');

            }
            else
            {
                return redirect('banners')->with('error', 'Erro ao deletar Item Banner do banco de dados.');

            }
        }
        else
        {
            return redirect('banners')->with('error', 'Erro ao excluir arquivo da pasta.');

        }
    }
}
