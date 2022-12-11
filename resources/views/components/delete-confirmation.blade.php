@push('js')
    <form action="" method="post" id="delete-form">
        @csrf
        @method('delete')
    </form>
    <script>
        function anchorDeleteWithConfirmation(event, el) {
            event.preventDefault();
            var href = $(el).attr('href');
            var message = $(el).attr('message');
            if (typeof message == 'undefined' || message.length < 1) message = $(el).data('message');
            if (typeof message == 'undefined' || message.length < 1) message = "Apakah anda yakin akan menghapus data ?";
            var cf = confirm(message);
            if (cf) {
                $("#delete-form").attr('action', href);
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
