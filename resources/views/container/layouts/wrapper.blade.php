<div class="row">
    <div class="col-8 border-right">
        @foreach($left as $key => $item)
            {!! $item ?? '' !!}
        @endforeach
    </div>
    <div class="col-4 no-gutter">
        @foreach($right as $key => $item)
            {!! $item ?? '' !!}
        @endforeach
    </div>
</div>
