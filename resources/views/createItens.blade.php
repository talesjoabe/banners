
@extends('app')

@section('conteudo')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                CRIAR ITEM BANNER {{$id_banner}}
            </div>
    
            <div class="links flex-center">
                <form method="post" action="{{ url('banners/itens', $id_banner)}}" enctype="multipart/form-data">
                    <div class="form-group">
                        @csrf
                        <label>Item Banner Name:</label>
                        <div class="form-group col-md-12">
                            <input type="text"  name="name">
                        </div>
                        <label>Item Banner Seconds:</label>
                        <div class="form-group col-md-12">
                            <input type="number"  name="seconds">
                        </div>
                        <label>Item Banner HTML:</label>
                        <div class="form-group col-md-8">
                            <input type="file" name="filename">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Criar Item Banner</button>
                </form>
            </div>
        </div>
    </div>
@endsection

