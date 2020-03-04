<script src="{{ asset('customer/js/jquery.js') }}"></script>
<script src="{{ asset('customer/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('customer/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('customer/js/price-range.js') }}"></script>
<script src="{{ asset('customer/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('customer/js/main.js') }}"></script>
<script type="text/javascript">
$('#search').on('keyup',function() {
    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : '{{ url("/cust/search") }}',
        data:{'search':$value},
        success:function(data) {
            var obj = JSON.parse(data);
            $('#list_tag_search').html(obj.table_data);
        }
    });
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
});
</script>