<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="@if(request()->segment(2) == 'courses') active @endif">
                    <a href="{{route('courses.index')}}">
                        <i class="iconsminds-shop-4"></i>
                        <span>Courses</span>
                    </a>
                </li>
                <li class="@if(request()->segment(2) == 'categories') active @endif">
                    <a href="{{route('categories.index')}}">
                        <i class="iconsminds-user"></i> Categories
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
