<div class="d-flex flex-column side-menu">
    <div class="d-flex flex-column text-left menu-background">
        <span class="font-weight-bold ml-1">公民館等のこれからを</span>
        <span class="font-weight-bold ml-1">考える会</span>
        <span class="font-weight-light ml-1 mr-1">連絡先: kokyosisetuskodaira@gmail.com</span>
    </div>

    @if($categories)
        @foreach($categories as $category)
            <a href="#" class="btn mb-1 text-left cat">{{$category->name}}</a>
        @endforeach
    @endif

</div>
