@extends('app')

@section('conteudo')
    <br/>
    <div>
        <a href="{{ url('banners')}}" class="btn btn-light">Voltar</a>
    </div>
    <br/>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                EDITAR ITEM PAINEL
            </div>
    
            <div class="links flex-center border rounded">
                <form method="post" action="{{url('banners/update', $itemBanner->id)}}" enctype="multipart/form-data">
                    <div class="form-group">
                        @method('PUT')
        
                        @csrf
                        <label>Item Painel Name:</label>
                        <div class="form-group col-md-12">
                            <input type="text"  name="name" value="{{$itemBanner->name}}" required>
                        </div>
                        <label>Item Painel Seconds:</label>
                        <div class="form-group col-md-12">
                        @php
                            $second = $itemBanner->seconds/1000;
                        @endphp
                            <input type="number" min="1"  name="seconds" value="{{$second}}" required>
                        </div>
                        <label>Item Painel HTML:</label>
                        <div class="form-group col-md-8">
                            <input type="file" name="filename" accept="text/html">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Atualizar Item Painel</button>
                </form>
            </div>
        </div>
    </div>
@endsection