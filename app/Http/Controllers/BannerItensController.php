<?php

namespace App\Http\Controllers;

use App\Banner;
use App\BannerItens;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'seconds' => 'required|integer',
            'visible' => 'required|boolean'
        ]);
        $bannerItens->name = $request->get('name');
        $bannerItens->banner_id = $banner->id;
        $bannerItens->seconds = $request->get('seconds') * 1000;
        $bannerItens->visible = $request->get('visible');
        $file = $request->file('filename');
        $typefile = $file->getClientMimeType();
        
        if($request->hasfile('filename')==true && $typefile=="text/html")
        {
            $htmlOnlyName = explode('.html', $file->getClientOriginalName());
            $htmlname = $htmlOnlyName[0];
            $htmlnamefinal = str_replace(' ', '', $htmlname);
            $name= time(). $htmlnamefinal . '.blade.php';
            if( (Storage::disk('s3')->put($name, file_get_contents($file))))
            {
                $bannerItens->filename = $name;
                $bannerItens->save();


              return redirect('banners')->with('status', 'Item Painel cadastrado com sucesso!');
            }
            else {
                return redirect('banners')->with('error', 'Erro ao fazer upload do item!');
            }
        }
        else
        {
            return redirect('banners')->with('error', 'Arquivo não inserido ou inválido.');

        }


    }

    public function deleteBannerItem(BannerItens $bannerItens)
    {   
        $excluirArquivo = Storage::delete($bannerItens->filename);
        if ($excluirArquivo) {
            if ($bannerItens->delete())
            {
                return redirect('banners')->with('status', 'Item Painel deletado com sucesso!');

            }
            else
            {
                return redirect('banners')->with('error', 'Erro ao deletar Item Painel do banco de dados.');

            }
        }
        else
        {
            return redirect('banners')->with('error', 'Erro ao excluir arquivo do S3.');

        }
    }

    public function updateForm(BannerItens $bannerItens)
    {
        $itemBanner = BannerItens::find($bannerItens->id);

        return view('editItem', compact('itemBanner'));

    }

    public function updateItem(Request $request, $bannerItens)
    {
        $validateData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'seconds' => 'required|integer'
        ]);

        $item = BannerItens::find($bannerItens); 
          
        
          
        if($request->hasfile('filename'))
        {       
                $file = $request->file('filename');
                $typefile = $file->getClientMimeType();

                if($typefile=="text/html")
                {
                    Storage::delete($item->filename);
                    $htmlOnlyName = explode('.html', $file->getClientOriginalName());
                    $htmlname = $htmlOnlyName[0];
                    $htmlnamefinal = str_replace(' ', '', $htmlname);
                    $name= time(). $htmlnamefinal . '.blade.php';
                    if( (Storage::disk('s3')->put($name, file_get_contents($file))))
                    {
                        $item->filename = $name;              
                    }
                }
                else
                {
                    return redirect('banners')->with('error', 'Arquivo inválido.');
                }
        }

        $item->name = $request->get('name');
        $item->seconds = $request->get('seconds') * 1000;

        if($item->save())
        {
            return redirect('banners')->with('status', 'Item Painel atualizado com sucesso!');

        }
        else{
            return redirect('banners')->with('error', 'Erro ao atualizar Item Painel!');

        }
    }


    public function visibleBannerItem(BannerItens $bannerItens)
    {
        $bannerItens->visible = TRUE;

        if ($bannerItens->save())
        {
            return redirect('banners')->with('status', 'Item Painel visível!');
        }
        else
        {
            return redirect('banners')->with('error', 'Erro ao atualizar Item Painel!');

        }

    }


    public function invisibleBannerItem(BannerItens $bannerItens)
    {
        $bannerItens->visible = FALSE;

        if ($bannerItens->save())
        {
            return redirect('banners')->with('status', 'Item Painel ocultado!');
        }
        else
        {
            return redirect('banners')->with('error', 'Erro ao atualizar Item Painel!');

        }

    }

    public function teste()
    {
        $tes = Storage::get('1557429579caneta.blade.php');

        return  $tes;
    }
}
