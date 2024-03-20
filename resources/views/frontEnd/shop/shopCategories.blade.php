@yield('shopCategories')
<div class="col-lg-12">
    <div class="mb-3">
        <h4>الاقسام</h4>
        <div class="fruite-name">
            @forelse ($categories as $category)
                <a href="/category/{{$category->id}}/{{$category->category_name}}"  class="btn border border-dark  text-dark px-2 my-1" value="{{$category->category_name}}">{{$category->category_name}} <i
                        class="fas  fa-glasses me-2"></i></a>
            @empty
                <p>لاتوجد اقسام متاحة حاليا</p>
            @endforelse
        </div>
    </div>
</div>

