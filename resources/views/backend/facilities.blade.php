<div class="modal fade" id="facilities_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> FACILITIES</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div id="manage-facilities" class="panel">
                    <div class="panel-hdr color-success-600">
                        <h2>
                            MANAGE FACILITIES
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <form id="manage-facilities" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6 pl-1">
                                            <label class="form-label" for="name">Name</label>
                                            <input id="facility_name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            <div id="name-feedback" class="invalid-feedback">No, you missed this one.</div>
                                        </div>
                                        <div class="col-3 pl-1">
                                            <div class="row no-gutters">
                                                <button id="submit-facility" type="submit" class="btn btn-block btn-success btn-sm mt-4 form-control">{{ __('Add Facility') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            VIEW FACILITIES
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="frame-wrap">
                                <table id="table_facilities" class="table m-0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>

    $(()=>{
        Pace.options = {
            ajax: true,
            // Disable the 'elements' source
            elements: false,

            // Only show the progress on regular and ajax-y page navigation,
            // not every request
            restartOnRequestAfter: false
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const table_facilities = $('#table_facilities');
        const form = $("#manage-facilities");
        const facilities_datatable = table_facilities.DataTable({
            ajax: {
                url: "{{ route('backend.get.facilities') }}",
                dataType:'json',
                dataSrc: ''
            },
            columns: [
                {data: 'number'},
                {data: 'name'},
            ]
        });

        $("#submit-facility").on('click',function(event)
        {
            event.preventDefault();
            let name = $('#facility_name').val();
            if (isEmpty(name)){
                toastr["error"]("Name is required!");
                return;
            }
            let data = {name:name};
            $.ajax({
                url: '{{route('add.facilities')}}',
                data: data,
                type: 'POST',
                success: function (res) {
                    if (res.ok === 'true'){
                        toastr["success"](res.msg);
                        facilities_datatable.ajax.reload();
                    }else if(res.ok === 'false'){
                        toastr["error"](res.msg);
                        $('#name').val('');
                    }
                }
            });
        });
    });
</script>


