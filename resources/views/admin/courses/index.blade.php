@extends('layouts.main')
@section('create-path', route('courses.create'))

@section('css')
    <link rel="stylesheet" href="{{asset('assets')}}/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/font/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/datatables.responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap-float-label.min.css" />

    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.css" integrity="sha512-DYOwgMAsSbNzrSwEU3nQ7bcYo5aEqpIq1lOe5doeuUwXjuFYjIPvIZDZrEOH+QMIXvRpqcc8gPKcoIMIyAZMCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>{{ucfirst(request()->segment(2))}} List</h1>

                    <div class="top-right-button-container">
                        <div class="btn-group">
                            <button class="btn btn-outline-primary btn-lg dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                EXPORT
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" id="dataTablesCopy" href="#">Copy</a>
                                <a class="dropdown-item" id="dataTablesExcel" href="#">Excel</a>
                                <a class="dropdown-item" id="dataTablesCsv" href="#">Csv</a>
                                <a class="dropdown-item" id="dataTablesPdf" href="#">Pdf</a>
                            </div>
                        </div>
                    </div>

                    @include('layouts.partials.create-button')
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4 data-table-rows data-tables-hide-filter">
                    <table id="tableDT" class="data-table responsive nowrap"
                           data-order="[[ 1, &quot;desc&quot; ]]">
                        <thead>
                        <tr>
                            {{--                            <th>Logo</th>--}}
                            <th>Name</th>
                            <th>Category</th>
                            <th>Rating</th>
                            <th>Views</th>
                            <th>Level</th>
                            <th>Hours</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>
                                    <p class="list-item-heading">{{$course->name}}</p>
                                </td>
                                <td>
                                    <p class="list-item-heading">{{$course->category->name}}</p>
                                </td>
                                <td>
                                    @for($counter = 0; $counter < $course->rating; $counter++)
                                        <i style="color: gold" class="glyph-icon simple-icon-star"></i>
                                    @endfor
                                    @for($i = 5; $i > $course->rating; $i--)
                                        <i class="glyph-icon simple-icon-star"></i>
                                    @endfor
                                </td>
                                <td>
                                    <p class="list-item-heading">{{$course->views}}</p>
                                </td>
                                <td>
                                    <p class="list-item-heading">{{$course->levels}}</p>
                                </td>
                                <td>
                                    <p class="list-item-heading">{{$course->hours}}</p>
                                </td>
                                <td>
                                    <div class="custom-switch custom-switch-primary mb-2">
                                        <input onchange="toggleStatus('{{$course->id}}','{{$course->active}}')" class="custom-switch-input customers-switch" id="switch{{$course->id}}" type="checkbox" data-status="{{$course->active}}" data-id="{{$course->id}}" @if($course->is_active) checked @endif>
                                        <label class="custom-switch-btn" for="switch{{$course->id}}"></label>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" data-id="{{$course->id}}" class="delete">
                                        <i style="font-size: 20px" class="glyph-icon simple-icon-trash"></i>
                                    </a>
                                    <a href="{{route('courses.edit', $course->id)}}">
                                        <i style="font-size: 20px" class="glyph-icon iconsminds-file-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script src="{{asset('assets')}}/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/jquery.validate/additional-methods.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/select2.full.js"></script>
    <script src="{{asset('assets')}}/js/dore.script.js"></script>
    <script src="{{asset('assets')}}/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js" integrity="sha512-mBSqtiBr4vcvTb6BCuIAgVx4uF3EVlVvJ2j+Z9USL0VwgL9liZ638rTANn5m1br7iupcjjg/LIl5cCYcNae7Yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var $dataTableRows = $("#tableDT").DataTable({
            pageLength: 10,
            language: {
                paginate: {
                    previous: "<i class='simple-icon-arrow-left'></i>",
                    next: "<i class='simple-icon-arrow-right'></i>"
                }
            },
        });
        function toggleStatus(id, status){
            Swal.fire({
                title: "Are you sure you want to toggle this course status ?",
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed){
                    $.ajax({
                        url: "{{url('/admin/toggle-course/')}}"+"/"+id,
                        method: "GET"
                    }).done(function(){
                        Swal.fire(
                            'Done!',
                            'Status toggled successfully',
                            'success'
                        );
                        // setTimeout(function(){
                        //     document.location.reload();
                        // }, 2000)
                    })
                }else{
                    $("#switch"+id).click();
                    Swal.fire(
                        'Cancelled',
                        'You Cancelled successfully',
                        'error'
                    )
                }

            })
        }

        $(".delete").on('click', function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            Swal.fire({
                title: "Are you sure you want to delete this course ?",
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed){
                    $.ajax({
                        url: "{{url('/admin/delete-course')}}"+"/"+id,
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        method: "get"
                    }).done(function(){
                        Swal.fire(
                            'Done!',
                            'Deleted successfully',
                            'success'
                        );

                        setTimeout(function(){
                            document.location.reload();
                        }, 2000)
                    })
                }else{
                    Swal.fire(
                        'Cancelled',
                        'You Cancelled successfully',
                        'error'
                    )
                }

            })
        })
    </script>
@endsection
