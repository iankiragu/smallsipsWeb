<div class="modal fade" id="doctor_appointments_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> APPOINTMENTS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            VIEW APPOINTMENTS
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="frame-wrap">
                                <table id="table_appointments" class="table m-0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Description</th>
                                        <th>Payment Status</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Actions</th>
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

    const table_appointments = $('#table_appointments');
    const form = $("#manage-facilities");
    const appointments_datatable = table_appointments.DataTable({
        ajax: {
            url: "{{ route('backend.get.appointments') }}",
            dataType:'json',
            dataSrc: ''
        },
        columns: [
            {data: 'number'},
            {data: 'patient_name'},
            {data: 'phone_number'},
            {data: 'description'},
            {data: 'has_paid'},
            {data: 'app_time'},
            {data: 'time'},
            {data: 'actions'},
        ]
    });

    appointments_datatable.on('click','#call',function (event) {
        event.preventDefault();
        window.location.replace("{{route('backend.make_call')}}")
    });
    appointments_datatable.on('click','#video',function (event) {
        event.preventDefault();
        window.location.replace("https://video-app-4432-dev.twil.io/");
    });

</script>


