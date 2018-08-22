@php

    $getContent = function ($string) use ($query) {
        return $query->getContent('data.content.' . app()->getLocale() . '.'.$string);
    };
//dd($getContent('tags'));
    if (is_array($getContent('tags'))) {
        $tags=$getContent('tags');
    } else {
        $tags=explode(',',$getContent('tags'));
    }


@endphp
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header card-header-divider">
                <h2>Marked list</h2>
                <span class="card-subtitle">Текст генерируется из поля <code>tags</code> </span>
            </div>
            <div class="card-body row">
                <div  class="col-12">
                    <code>{{'<ul><li>text</li>...</ul>' }}</code>
                </div>
                <div  class="col-12">
                    <ul>
                        @foreach($tags as $tag)
                                <li>{{$tag}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header card-header-divider">
                <h2>Numbered list</h2>
                <span class="card-subtitle">Текст генерируется из поля <code>tags</code> </span>
            </div>
            <div class="card-body row">
                <div  class="col-12">
                    <code>{{'<ol><li>text</li>...</ol>' }}</code>
                </div>
                <div  class="col-12">
                    <ol>
                        @foreach($tags as $tag)
                            <li>{{$tag}}</li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
