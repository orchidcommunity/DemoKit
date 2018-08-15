@php
    $getContent = function ($string) use ($query) {
        return $query->getContent('data.content.' . app()->getLocale() . '.'.$string);
    };
@endphp

<div class="card">
    <div class="card-header card-header-divider">
        <h2>Text elements</h2>
        <span class="card-subtitle">Текст генерируется из поля <code>textarea</code> </span>
    </div>
    <div class="card-body row">
        @php
            $textelements=['mark','s','u','small','strong','em'];
        @endphp
        <div class="col-12">
            <code>{{ '<p>text</p>' }}</code>
            <p>{{$getContent('textarea')}}</p>
        </div>
        @foreach($textelements as $textelement)
            <div class="col-12">
                <code>{{ '<p><'.$textelement.'>text</'.$textelement.'></p>' }}</code>
                <p><{{$textelement}}>{{$getContent('textarea')}}</{{$textelement}}></p>
            </div>
        @endforeach
    </div>
</div>