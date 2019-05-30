@component($typeForm,get_defined_vars())
    <div data-controller="demokit--relation"
         data-demokit--relation-id="{{$id}}"
         data-demokit--relation-placeholder="{{$attributes['placeholder'] ?? ''}}"
         data-demokit--relation-value="{{  $value }}"
         data-demokit--relation-model="{{ $relationModel }}"
         data-demokit--relation-name="{{ $relationName }}"
         data-demokit--relation-key="{{ $relationKey }}"
         data-demokit--relation-scope="{{ $relationScope }}"
         data-demokit--relation-route="{{ route('platform.systems.relation') }}"
    >
        <select id="{{$id}}" data-target="demokit--relation.select" @include('platform::partials.fields.attributes', ['attributes' => $attributes])>
        </select>

        <select id="{{$id}}-1" data-target="demokit--relation.select1" @include('platform::partials.fields.attributes', ['attributes' => $attributes])>
        </select>
    </div>
@endcomponent