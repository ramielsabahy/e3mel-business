<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{asset('assets/front.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Navbar section -->
    <nav class="navbar navbar-expand-sm navbar-light bg-white border-bottom"> <a class="navbar-brand ml-2 font-weight-bold" href="#"><span id="burgundy">The</span><span id="orange">Courses</span></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor" aria-controls="navbarColor" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarColor">
            <ul class="navbar-nav">
                <li class="nav-item rounded bg-light search-nav-item"><input type="text" id="search" class="bg-light" placeholder="Search Courses"><span class="fa fa-search text-muted"></span></li>
                <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-user-o"></span><span class="text">Login</span></a> </li>
                <li class="nav-item "><a class="nav-link" href="#"><span class="fa fa-shopping-cart"></span><span class="text">Cart</span></a> </li>
            </ul>
        </div>
    </nav>
    <div class="filter"> <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#mobile-filter" aria-expanded="true" aria-controls="mobile-filter">Filters<span class="fa fa-filter pl-1"></span></button>
    </div>
    <!-- Sidebar filter section -->
    <section id="sidebar">
        <p> Home | <b>All Courses</b></p>
        <div class="border-bottom pb-2 ml-2">
            <h4 id="burgundy">Filters</h4>
        </div>
        <div class="py-2 border-bottom ml-3" style="height: 250px;overflow-y: scroll">
            <h6 class="font-weight-bold">Categories</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                @foreach($categories as $category)
                    <div class="form-group"> <input class="category" name="category" type="checkbox" value="{{$category->id}}" id="category{{$category->id}}"> <label for="artisan">{{$category->name}}</label> </div>
                @endforeach
            </form>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h6 class="font-weight-bold">Rating</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                @foreach($ratings as $k => $rating)
                <div class="form-group"> <input type="radio" class="rating" name="rating" value="{{$k}}" id="choco">
                    @for($stars = 1; $stars <= $k; $stars++)
                        <i class="fa fa-star-o star"></i>
                    @endfor
                    @for($stars = 5; $stars > $k; $stars--)
                        <i class="fa fa-star-o star-empty"></i>
                    @endfor
                    <label for="choco">
                        <span style="font-size: 12px !important;">({{count($rating)}})</span> <b>{{$k}}</b>
                    </label>
                </div>
                @endforeach
            </form>
        </div>
        <div class="py-2 ml-3">
            <h6 class="font-weight-bold">Level</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                <div class="form-group"> <input class="levels" type="checkbox" name="level" value="beginner" id="beginner"> <label for="beginner">Beginner</label> </div>
                <div class="form-group"> <input class="levels" type="checkbox" name="level" value="intermediate" id="intermediate"> <label for="intermediate">Intermediate</label> </div>
                <div class="form-group"> <input class="levels" type="checkbox" name="level" value="high" id="high"> <label for="high">High Level</label> </div>
            </form>
        </div>
        <div class="py-2 ml-3">
            <h6 class="font-weight-bold">Time</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                <div class="form-group"> <input type="radio" class="time" value="less_4" name="time" id="less_4"> <label for="less_4">Less Than 4 hrs</label> </div>
                <div class="form-group"> <input type="radio" class="time" value="less_8" name="time" id="less_8"> <label for="less_8">Less Than 8 hrs</label> </div>
                <div class="form-group"> <input type="radio" class="time" value="more_8" name="time" id="more_8"> <label for="more_8">More Than 8 hrs</label> </div>
            </form>
        </div>
    </section>
    <!-- products section -->
    <section id="products">
        <div class="container">
            <div class="d-flex flex-row">
                <div class="text-muted m-2" id="res">Showing {{count($courses)}} results</div>
                <div class="ml-auto mr-lg-4">
{{--                    <div id="sorting" class="border rounded p-1 m-1"> <span class="text-muted">Sort by</span> <select name="sort" id="sort">--}}
{{--                            <option value="popularity"><b>Popularity</b></option>--}}
{{--                            <option value="prcie"><b>Price</b></option>--}}
{{--                            <option value="rating"><b>Rating</b></option>--}}
{{--                        </select> </div>--}}
                </div>
            </div>
            <div class="row" id="filter">
                @foreach($courses as $course)
                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1" style="padding-bottom: 15px;height: 450px">
                        <div class="card" style="height: 430px">
                            <img class="card-img-top" src="https://images.pexels.com/photos/1775043/pexels-photo-1775043.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                            <div class="card-body" style="height: 150px">
                                <h5><b style="font-family: sans-serif;font-weight: lighter;color: #2fa360">{{$course->name}}</b> </h5>
                                <div class="d-flex flex-row my-2">
                                    <div class="text-muted"><span style="margin-left: 0;padding-left: 2px;padding-right: 10px" class="fa fa-user-o"></span>Ahmed Za'tar</div>
                                </div>
                                <p style="height: 90px">
                                    {{substr($course->description, 0,90)}}
                                </p>
                                @for($stars = 0; $stars < $course->rating; $stars++)
                                    <span class="fa fa-star" style="color: gold"></span>
                                @endfor
                                @for($stars = 5; $stars > $course->rating; $stars--)
                                    <span class="fa fa-star-o"></span>
                                @endfor
                                <span>({{$course->views}})</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $("input").on('change', function () {
                var categories = [];
                var ratings = null;
                var levels = [];
                var times = null;
                var search = null;
                $('input:checkbox.category').each(function () {
                    if (this.checked){
                        categories.push($(this).val());
                    }
                });
                $('input:checkbox.levels').each(function () {
                    if (this.checked){
                        levels.push($(this).val());
                    }
                });
                $('input:radio.time').each(function () {
                    if (this.checked){
                        times = $(this).val();
                    }
                });
                $('input:radio.rating').each(function () {
                    if (this.checked){
                        ratings = $(this).val();
                    }
                });

                $("#search").each(function(){
                    search = $(this).val();
                })

                $.ajax({
                    url: "{{route('filter')}}",
                    data: {categories: categories, levels: levels, times: times, ratings: ratings, search: search},
                    success:function(result){
                        console.log(result);
                        $("#filter").html('');
                        $("#res").html('');
                        var counter = 0;
                        $.map(result, function(val, key){
                            counter++;
                            var element = `<div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1" style="padding-bottom: 15px;height: 450px">
                        <div class="card" style="height: 430px">
                            <img class="card-img-top" src="https://images.pexels.com/photos/1775043/pexels-photo-1775043.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                            <div class="card-body" style="height: 150px">
                                <h5><b style="font-family: sans-serif;font-weight: lighter;color: #2fa360">`+val.name+`</b> </h5>
                                <div class="d-flex flex-row my-2">
                                    <div class="text-muted"><span style="margin-left: 0;padding-left: 2px;padding-right: 10px" class="fa fa-user-o"></span>Ahmed Za'tar</div>
                                </div>
                                <p style="height: 90px">`;
                            element += val.description.substr(0,90);
                            element += `</p>`;
                            for(var stars = 0; stars < val.rating; stars++) {
                                element += `<span class="fa fa-star" style="color: gold"></span>`
                            }
                            for(var stars = 5; stars > val.rating; stars--){
                                element += `<span class="fa fa-star-o"></span>`;
                            }
                            element += `<span> (`+val.views+`)</span>
                            </div>
                        </div>
                    </div>`
                            $("#filter").append(element)
                        })
                        $("#res").html(`Showing `+counter+` results`)
                    }
                })

            });
        });
    </script>
</body>
</html>
