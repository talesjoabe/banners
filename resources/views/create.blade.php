@extends('app')

@section('conteudo')
    <br/>
    <div>
        <a href="{{ url('/')}}" class="btn btn-light">Voltar</a>
    </div>
    <br/>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                CRIAR BANNER
            </div>
    
            <div class="links">
                <form method="post" action="{{route('banners.store')}}">
                    <div class="form-group">
                        @csrf
                        <label>Banner Name:</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Criar Banner</button>
                </form>
            </div>
        </div>
    </div>
@endsection