@auth
<div class="modal" id="testModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Test Settings</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('test')}}" method="post" id="test-form">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input name="duration" id="duration" class="form-control" placeholder="Set test duration" required>
                    </div>
                    <div class="form-group">
                        <label for="count">Number of questions</label>
                        <input name="count" id="count" class="form-control" placeholder="Set number of questions" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info pull-right">
                            <i class="fa fa-check"></i> Start Test
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endauth