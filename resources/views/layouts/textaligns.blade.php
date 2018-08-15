@php
    $getContent = function ($string) use ($query) {
        return $query->getContent('data.content.' . app()->getLocale() . '.'.$string);
    };
@endphp

<div class="card">
    <div class="card-header card-header-divider">
        <h2>Alignment types</h2>
        <span class="card-subtitle">Текст генерируется из поля <code>textarea</code> </span>
    </div>
    <div class="card-body row">
        @php
            $textarrays=['left','center','right','justify'];
        @endphp
        @foreach($textarrays as $text)
            <div class="col-12">
                <code>{{ '<h3 class="text-'.$text.'">'.$text.' text</h3>' }}</code>
                <h3 class="text-{{$text}}">{{$getContent('input')}}</h3>

                <code>{{ '<p class="text-'.$text.'">'.$text.' text</p>' }}</code>
                <p class="text-{{$text}}">{{$getContent('textarea')}}</p>
            </div>
        @endforeach
    </div>
</div>