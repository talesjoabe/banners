@extends('app');
@section('conteudo')

            {{--<div id="hide" style="display:show">--}}
                {{--@include('htmls.teste')--}}
            {{--</div>--}}

            {{--<script>--}}
                    {{--setTimeout( function() {--}}
                    {{--$('#hide').hide()--}}
                    {{--}, 4000);--}}
            {{--</script>--}}
    {{----}}
            {{--@foreach()--}}
                {{----}}
                {{--<div id="hide" style="display:show">--}}
                    {{--@include('htmls.teste')--}}
                {{--</div>--}}

                {{--<script>--}}
                    {{--setTimeout( function() {--}}
                        {{--$('#hide').hide()--}}
                    {{--}, 4000);--}}
                {{--</script>--}}
            {{--@endforeach--}}


            @foreach($bannersItens as $itemBanner)

                @php
                 $nameItem = explode('.blade.php', $itemBanner['filename']);
                $name = $nameItem[0];
                @endphp
                <div id="$name" style="display:show">
                    @include('htmls.'. $nameItem[0])
                </div>
                @php
                    $second = $itemBanner['seconds'] * 1000;
                @endphp
                <script>
                    setTimeout( function() {
                        $("#$name").hide()
                    },  {{$second}});
                </script>
            @endforeach

            {{--<div id="hide" style="display:show">--}}
                {{--@include('htmls.teste')--}}
            {{--</div>--}}

            {{--<script>--}}
                {{--setTimeout( function() {--}}
                    {{--$('#hide').hide()--}}
                {{--}, 4000);--}}
            {{--</script>--}}

            {{--<div id="show" style="display:none">--}}
                {{--@include('htmls.teste2')--}}
            {{--</div>--}}

            {{--<script>--}}
                {{--setTimeout( function() {--}}
                    {{--$('#show').show()--}}
                {{--}, 4000);--}}
            {{--</script>--}}




@endsection
