<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{ url('/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/js/bootstrap-colorpicker.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/js/metisMenu.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/js/sb-admin-2.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
            }
        });
    } );
</script>