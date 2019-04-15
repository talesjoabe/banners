@extends('app');
@section('conteudo')
   
  @foreach($banners as $banner)
      <div class="card text-center" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
         <div class="card-header font-weight-bold" style="color: black; ">
            {{$banner['name']}}
         </div>
         <div class="card-body">
            <h5 class="card-title font-weight-bold" style="color: black;">Banners Apresentados</h5>
            <ul class="list-group list-group-flush">
                @foreach($bannersItens as $item)
                    @if($item['banner_id'] == $banner['id'])
                        <li class="list-group-item"><span class="font-weight-bold"> {{$item['name']}}</span> por {{$item['seconds']}} segundos.</li>
                    @endif
                @endforeach
            </ul>
            <br/>
            <a href="{{ url('banners/itens', $banner['id'])}}" class="btn btn-primary">Adicionar Item</a>        <a href="{{ url('teste', $banner['id'])}}" class="btn btn-success">Ativar Banner</a>

         </div>
         <div class="card-footer text-muted" style="color: black;">
            Criado em {{$banner['created_at']}}.
         </div>
      </div>
      <br/>
      <br/>
  @endforeach     
@endsection


