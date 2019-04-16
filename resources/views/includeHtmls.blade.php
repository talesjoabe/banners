@extends('app');
@section('conteudo')
        
       
            
       
        
        @php
           $timeInitial = 0;
           $timeFinaly = 0;
        @endphp
        @foreach($bannersItens as $itemBanner)
                @php
                    $nameItem = explode('.blade.php', $itemBanner['filename']);
                    $name = $nameItem[0];
                    $timeFinaly = $timeFinaly + $itemBanner['seconds'];
                @endphp
                <div id={{$name}} style="display:none">
                    @include('htmls.'. $nameItem[0])
                </div>

                <script>
                    setTimeout( function() {
                        $("#{{$name}}").show()
                    },  {{$timeInitial}});
                    setTimeout( function() {
                        $("#{{$name}}").hide()
                    },  {{ $timeFinaly }} );
                </script>

                @php
                    $timeInitial = $timeInitial + $itemBanner['seconds'];
                @endphp
        @endforeach

@endsection
