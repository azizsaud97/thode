<script src="{{asset('admin/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('admin/js/popper.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/main.js')}}"></script>
<script src="{{asset('admin/js/plugins/pace.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/chart.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/confirm.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">$('#datatable').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/ar.json"
        }
    });
    $('.select2').select2({placeholder: "اختر", width: '100%'});

</script>
@stack('chart')
@stack('js')
<script>
    function confirmation(actionID, type) {
        event.preventDefault()
            dialog.confirm({
                title: "{{__('Confirm Action')}}",
                message: "{{__('Are You Sure Want To delete?')}}" + type,
                cancel: "لا",
                button: "نعم",
                required: true,
                callback: function(value){
                    if(value) {
                        document.getElementById(actionID).submit();
                    }
                }
            });
    }

    function confirmationLogout(actionID) {
        event.preventDefault()
        dialog.confirm({
            title: "{{__('Confirm Action')}}",
            message: "{{__('هل أنت متأكد من تسجيل الخروج?')}}" ,
            cancel: "لا",
            button: "نعم",
            required: true,
            callback: function(value){
                if(value) {
                    document.getElementById(actionID).submit();
                }
            }
        });
    }
</script>
