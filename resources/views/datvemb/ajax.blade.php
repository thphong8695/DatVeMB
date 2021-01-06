@section('script')
<script type="text/javascript">
$(function () {
     
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    $('#searchDatVe').click(function (e) {
        e.preventDefault();
        var url = '{{ route('datvemb.index') }}?';
        var total = $(".url_params").length;
        $(".url_params").each(function (index) {
            if ($(this).val().trim().length) {
                   if (index === total - 1) {
                      url += $(this).attr('name') + '=' + $(this).val();
                   } else {
                      url += $(this).attr('name') + '=' + $(this).val() + "&"; 
                   }                        
            }
        });
        window.location.href = url;
    });
    $('body').on('click', '#editDatVe', function () {
      var id = $(this).data('id');
      $.get("{{ route('datvemb.index') }}" +'/' + id , function (data) {
            $('#EditModal').modal('show');
            $('#id_modal').val(data['datvemb'].id);
            $('#sdt_goilen_modal').text(data['datvemb'].sdt_goilen);
            $('#sdt_lienhe_modal').text(data['datvemb'].sdt_lienhe);
            $('#soluong_nguoilon_modal').text(data['datvemb'].soluong_nguoilon);
            $('#soluong_treem_modal').text(data['datvemb'].soluong_treem);
            $('#soluong_embe_modal').text(data['datvemb'].soluong_embe);
            $('#loaive_modal').text(data['datvemb'].loaive);
            $('#hangbay_id_modal').text(data['hangbay'].name);
            $('#madatcho_modal').text(data['datvemb'].madatcho);
            $('#taikhoanthanhtoan_modal').text(data['datvemb'].taikhoanthanhtoan);
            $('#tenkhachhang_modal').text(data['datvemb'].tenkhachhang);
            $('#tinhtrangve_modal').text(data['datvemb'].tinhtrangve);
            $('#thongtinkhac_modal').val(data['datvemb'].thongtinkhac);
            var regex = /<br\s*[\/]?>/gi;
            $('#lichsutraodoi_modal').val(data['datvemb'].lichsutraodoi.replace(regex,"\n"));
            $('#ketqua_modal').val(data['datvemb'].ketqua);
            
      })
   });
});    
</script>
@endsection