@php
    $getContent = function ($string) use ($query) {
        return $query->getContent('data.content.' . app()->getLocale() . '.'.$string);
    };
@endphp

<div class="card">
    <div class="card-header card-header-divider">
        <h2>Text colors</h2>
        <span class="card-subtitle">Текст генерируется из поля <code>textarea</code> </span>
    </div>
    <div class="card-body row">
        @php
            $textcolors=['muted','primary','success','warning','danger'];
        @endphp
        <div class="col-12">
            <code>{{ '<p>Normal text</p>' }}</code>
            <p>{{$getContent('textarea')}}</p>
        </div>
        @foreach($textcolors as $textcolor)
            <div class="col-12">
                <code>{{ '<p class="text-'.$textcolor.'">'.$textcolor.' text</p>' }}</code>
                <p class="text-{{$textcolor}}">{{$getContent('textarea')}}</p>
            </div>
        @endforeach
    </div>
</div>