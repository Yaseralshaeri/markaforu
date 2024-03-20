@yield('categories')
<div class="col-lg-12">
    <div class="mb-4">
        <h4>الاقسام</h4>
        <ul class="list-unstyled fruite-categorie">
            @forelse ($categories as $category)
                <li>
                    <div class="d-flex justify-content-between fruite-name">
                        <a href="shop/{{$category->id}}" class="text-dark"> {{$category->category_name}} <i class="fas fa-glasses me-2"></i></a>
                        <span>{{$category->id}}</span>
                    </div>
                </li>
            @empty
                <p>لاتوجد اقسام متاحة حاليا</p>
            @endforelse
        </ul>
    </div>
</div>
