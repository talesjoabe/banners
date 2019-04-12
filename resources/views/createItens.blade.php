
@extends('app')

@section('conteudo')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                CRIAR ITEM BANNER {{$id_banner}}
            </div>
    
            <div class="links">
                <form method="post" action="{{ url('banners/itens', $id_banner)}}">
                    <div class="form-group">
                        @csrf
                        <label>Item Banner Name:</label>
                        <input type="text" class="form-control" name="name"/>
                        <label>Item Banner HTML:</label>
                        <input type="file" class="form-control" name="filename"/>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Criar Item Banner</button>
                </form>
            </div>
        </div>
    </div>
@endsection

