<?php
/**
 * Created by PhpStorm.
 * User: josiah
 * Date: 03/02/18
 * Time: 22:57
 */
?>

<?php
/**
 * Created by PhpStorm.
 * User: josin
 * Date: 18/01/2018
 * Time: 10:02
 */

?>
<link href="{!! asset('js/toastr.min.css') !!}" rel="stylesheet">
<script src="{{ asset('js/toastr.min.js') }}" type="application/javascript"></script>

<script>

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "4000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    //toastr.success("Are you the six fingered man?");

    $(document).on('focusin', function(e) {
        if ($(e.target).closest(".mce-window").length) {
            e.stopImmediatePropagation();
        }
    });

</script>


@if (session('message'))
    <script>
        {{--swal({   title: "message",   text: "{{Session::get('message')}}", type : "info",     showConfirmButton: true });--}}
        toastr.success("{{Session::get('message')}}");
    </script>
@endif

@if (session('error'))
    <script>
        {{--swal({  title: "error",   text: "{{Session::get('error')}}", type:'error' ,  showConfirmButton: true });--}}
        toastr.error("{{Session::get('error')}}");
    </script>
@endif

@if (session('success'))
    <script>
        {{--swal({  title: "success",   text: "{{Session::get('success')}}",  type:'success',   showConfirmButton: true });--}}
        toastr.success("{{Session::get('success')}}");
    </script>
@endif

@if (session('warning'))
    <script>
        {{--swal({  title: "warning",   text: "{{Session::get('warning')}}",  type:'warning',      showConfirmButton: true });--}}
        toastr.warning("{{Session::get('warning')}}");
    </script>
@endif

@if (session('info'))
    <script>
        {{--swal({ title: "info",    text: "{{Session::get('info')}}",   title: "info",    showConfirmButton: false });--}}
        toastr.info("{{Session::get('info')}}");
    </script>
@endif

@if ($errors->any() )
    @foreach ($errors->all() as $error)
        <script>
            toastr.options.positionClass = "toast-bottom-right";
            toastr.error("{{ $error }}");
        </script>
    @endforeach
@endif


