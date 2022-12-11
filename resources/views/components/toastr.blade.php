@push('js')
    <script>
        function buildToastr(body) {
            toastr.info(body)
        }

        function buildSuccessToastr(body) {
            toastr.success(body)
        }

        function buildErrorToastr(body) {
            toastr.error(body)
        }

        @if(\Illuminate\Support\Facades\Session::has('error'))
            buildErrorToastr("{{ \Illuminate\Support\Facades\Session::get('error') }}");
        @endif
        @if(\Illuminate\Support\Facades\Session::has('success'))
            buildSuccessToastr("{{ \Illuminate\Support\Facades\Session::get('success') }}");
        @endif

    </script>
@endpush
