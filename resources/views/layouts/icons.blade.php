<style>
    .demokit-icons i{
        font-size: 18px;
        display: inline-block;
        width: 40px;
        margin: 0;
        text-align: center;
        vertical-align: middle;
        -webkit-transition: font-size .2s;
        transition: font-size .2s;
    }
    .demokit-icons div {
        line-height: 40px;
        white-space: nowrap;
    }
    .demokit-icons div:hover i{
        font-size: 32px;
    }
    .demokit-icons span{
        font-size: 16px;
    }
</style>
<div class="wrapper-md">
    <h2>{{$data}}</h2>
    <h3>Orchid icon collection</h3>
    <div class="row demokit-icons">
        @foreach($icons as $icon)
            <div class="col-4">
                <i class="icon-{{$icon}} icons"></i>
                <span class="name">icon-{{$icon}}</span>
            </div>
        @endforeach
    </div>
</div>