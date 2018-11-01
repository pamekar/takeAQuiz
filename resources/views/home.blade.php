@extends('layouts.dashboard')

@section('content')
    <div class="content" id="home">
        @include('layouts.partials.home')
    </div>
   
@endsection
@section('scripts')
    <script src="{{asset('/js/datatables.min.js')}}"></script>

    <script>
        $('.table').DataTable();
        function deleteTest(id) {
            swal({
                title: "Are you sure to delete This test",
                text: "Once deleted, you will not be able to recover this test!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {
                    var data = {'id': id};
                    $.ajax({
                        url: '/test/delete/',
                        data: data,
                        type: 'DELETE',
                        success: function(result) {
                            // Do something with the result
                            let home=$('#home');
                            home.fadeOut(500);
                            home.html(result.html);
                            swal(result.status, {
                                icon: result.state,
                            });
                            home.fadeIn(800);
                            $('.table').DataTable();
                        }
                    });
                } else {
                    swal("The test was not deleted!");
        }
        });
        }
    </script>
@endsection