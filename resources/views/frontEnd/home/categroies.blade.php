@yield('categories')
<div class="row">
    @foreach ($categories as  $category)
    <div class="col-lg-6 col-md-6 col-sm-6 p-1">
        @foreach ($category->media->path as $product_imag)
            @if ($loop->first)
                <a  href="/category/{{$category->id}}/{{$category->category_name}}" ><img src="{{asset("storage/$product_imag")}}"   class="img-fluid w-100" alt=""> </a>
            @endif
        @endforeach
    </div>
    @endforeach
</div>
