@extends('app')

@section('conteudo')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                CRIAR BANNER
            </div>

            <div class="links">
                <form method="post" action="#">
                    <div class="form-group">
                        @csrf
                        <label>Banner Name:</label>
                        <input type="text" class="form-control" name="bannerName"/>
                    </div>
                    <div class="form-group">
                        <label>Banner HTML:</label>
                        <input type="file" class="form-control" name="fileName"/>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Criar Banner</button>
                </form>
            </div>
        </div>
    </div>
@endsection