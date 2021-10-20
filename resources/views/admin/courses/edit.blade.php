@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/main.css" />
@endsection

@section('content')
    <main>
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 col-lg-6 mb-5">
                    <h5 class="mb-5">Create Course</h5>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Course Form</h5>
                            <form method="POST" action="{{route('courses.update', $course->id)}}" class="needs-validation tooltip-label-right" novalidate>
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group position-relative error-l-50">
                                    <label>Category Name</label>
                                    <select class="form-control" name="category_id">
                                        <option>Select Category</option>
                                        @foreach($categories as $category)
                                            <option @if($course->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-tooltip">
                                        Category Name is required!
                                    </div>
                                </div>
                                <div class="form-group position-relative error-l-50">
                                    <label>Course Name</label>
                                    <input type="text" value="{{$course->name}}" name="name" class="form-control" required>
                                    <div class="invalid-tooltip">
                                        Course Name is required!
                                    </div>
                                </div>
                                <div class="form-group position-relative error-l-50">
                                    <label>Course Description</label>
                                    <textarea name="description" class="form-control">
                                        {{$course->description}}
                                    </textarea>
                                    <div class="invalid-tooltip">
                                        Description is required!
                                    </div>
                                </div>
                                <div class="form-group position-relative error-l-50">
                                    <label>Rating</label>
                                    <input type="number" value="{{$course->rating}}" name="rating" min="1" max="5" step="1" class="form-control" required>
                                    <div class="invalid-tooltip">
                                        Rating is required!
                                    </div>
                                </div>
                                <div class="form-group position-relative error-l-50">
                                    <label>Views</label>
                                    <input type="number" value="{{$course->views}}" name="views" min="1" step="1" class="form-control" required>
                                    <div class="invalid-tooltip">
                                        Views is required!
                                    </div>
                                </div>
                                <div class="form-group position-relative error-l-50">
                                    <label>Level</label>
                                    <select class="form-control" name="levels">
                                        <option>Select Level</option>
                                        <option @if($course->levels == 'beginner') selected @endif value="beginner">Beginner</option>
                                        <option @if($course->levels == 'intermediate') selected @endif value="intermediate">Intermediate</option>
                                        <option @if($course->levels == 'high') selected @endif value="high">High</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Level is required!
                                    </div>
                                </div>
                                <div class="form-group position-relative error-l-50">
                                    <label>Hours</label>
                                    <input type="number" value="{{$course->hours}}" name="hours" min="1" step="1" class="form-control" required>
                                    <div class="invalid-tooltip">
                                        Hours is required!
                                    </div>
                                </div>
                                <div class="form-group position-relative">
                                    <label>Active</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" @if($course->is_active) checked @endif id="customRadio1" name="is_active"
                                               class="custom-control-input" value="1" required>
                                        <label class="custom-control-label" for="customRadio1">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" @if(!$course->is_active) checked @endif id="customRadio2" name="is_active"
                                               class="custom-control-input" value="0" required>
                                        <label class="custom-control-label" for="customRadio2">No</label>
                                    </div>
                                    <div class="invalid-tooltip">
                                        Radio is required!
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('js')
    <script src="{{asset('assets')}}/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/select2.full.js"></script>
    <script src="{{asset('assets')}}/js/vendor/bootstrap-datepicker.js"></script>
    <script src="{{asset('assets')}}/js/vendor/bootstrap-tagsinput.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/jquery.validate/additional-methods.min.js"></script>
    <script src="{{asset('assets')}}/js/dore.script.js"></script>
    <script src="{{asset('assets')}}/js/scripts.js"></script>
@endsection
