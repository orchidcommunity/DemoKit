<div class="row">
    <div class="col-7 border-right">
        @foreach($left as $key => $item)
            {!! $item ?? '' !!}
        @endforeach
    </div>
    <div class="col-5 no-gutter">
        @foreach($right as $key => $item)
            {!! $item ?? '' !!}
        @endforeach
    </div>
</div>
