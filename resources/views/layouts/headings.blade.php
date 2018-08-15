@php
    //dump($query);
    //$data_con='data.content.' . app()->getLocale();
    $getContent = function ($string) use ($query) {
        return $query->getContent('data.content.' . app()->getLocale() . '.'.$string);
    };
    //dd($getContent('input'));

@endphp
{{--
<div class="card demokit-headings">
    <div class="card-header card-header-divider">
        <h2>Headings</h2>
        <span class="card-subtitle"><code>{{ '<h1>Heading text</h1>' }}</code></span>
    </div>
    <div class="card-body row">
        @for ($i = 1; $i <=6 ; $i++)
            <div class="col-12">
                <h{{$i}}>h{{$i}}. {{$getContent('input')}}</h{{$i}}>
            </div>
        @endfor
    </div>
</div>
--}}
<div class="card demokit-headings">
    <div class="card-header card-header-divider">
        <h2>Headings with secondary text</h2>
        <span class="card-subtitle">Данные заголовков берутся из поля <code>input</code>, данные вторичного текста из поля  <code>textarea</code> </span>
    </div>
    <div class="card-body row">
        @for ($i = 1; $i <=6 ; $i++)
            <div class="col-12">
                <code>{{ '<h'.$i.'>Heading text <small>secondary text</small></h'.$i.'>' }}</code>
                <h{{$i}}>h{{$i}}. {{$getContent('input')}}  <small>{{$getContent('textarea')}}</small></h{{$i}}>
            </div>
        @endfor
    </div>
</div>