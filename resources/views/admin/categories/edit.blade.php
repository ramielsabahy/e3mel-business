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
                    <h5 class="mb-5">Edit Category {{$category->name}}</h5>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Category Form</h5>
                            <form method="POST" action="{{route('categories.update', $category->id)}}" class="needs-validation tooltip-label-right" novalidate>
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group position-relative error-l-50">
                                    <label>Name</label>
                                    <input type="text" value="{{$category->name}}" name="name" class="form-control" required>
                                    <div class="invalid-tooltip">
                                        Name is required!
                                    </div>
                                </div>
                                <div class="form-group position-relative">
                                    <label>Active</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="is_active"
                                               class="custom-control-input" @if($category->is_active) checked @endif value="1" required>
                                        <label class="custom-control-label" for="customRadio1">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" @if(!$category->is_active) checked @endif name="is_active"
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
