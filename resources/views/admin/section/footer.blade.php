<script src="{{ Url('/js/admin.js') }}"></script>
<script type="text/javascript" src="{{ Url('js/jquery.number.js') }}"></script>
<script type="text/javascript">
    $(function(){
        // Set up the number formatting.

        // $('#price').on('change',function(){
        //     console.log('Change event.');
        //     var val = $('#price').val();
        //     $('#the_number').text( val !== '' ? val : '(empty)' );
        // });
        //
        // $('#price').change(function(){
        //     console.log('Second change event...');
        // });
        //
        // $('#price').number(true);



    });
</script>
{{--<script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>--}}
{{--<script>--}}
    {{--CKEDITOR.replace('editor1');--}}
{{--</script>--}}
@yield('scripts')

</body>
</html>