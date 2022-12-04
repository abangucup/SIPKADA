{{-- <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
</script> --}}
{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
{{-- <script src="{{ asset('assets/js/jquery-3.5.1.min.js')}}"></script> --}}
<script src="{{ asset('assets/js/popper.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{ asset('assets/js/chart.morris.js')}}"></script>
<script src="{{ asset('assets/plugins/morris/morris.js')}}"></script>
{{-- DataTables --}}
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables/datatables.min.js')}}"></script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="{{ asset('assets/js/script.js')}}"></script>

{{-- <script>
    $(document).ready(function () {
        // var kelurahan_id = $("#kelurahan").val()
        // $("#kelurahan").on('change', function(){
        //     // kelurahan_id.draw();
        //     console.log([kelurahan_id])
        // // });
        // $("#filter").click(function(){
        //     var kelurahan = $('#tablePenerima').DataTable({
        //         processing:true,
        //         serverSide:true,
        //         ajax: {
        //             url:"{{route('filter')}}",
        //             data:function(data){
        //                 data.searchKelurahan = $('#kelurahan').val();
        //             }
        //         },
        //         columns:[
        //             {data:'nik'},
        //             {data:'nama'},
        //             {data:'jk'},
        //             {data:'alamat'},
        //             {data:'kelurahan_id'}
        //         ]
        //     });

        //     $('#kelurahan').on('change', function() {
        //         kelurahan.draw();
        //         // console.log(['kelurahan_id'])
        //     });
        // });
        $('#kelurahan').on('change', function(){
            var kelurahan = $(this).val()
            // console.log([kelurahan])
            $.ajax({
                url:"{{ route('filter') }}",
                type:"GET",
                data:{'kelurahan':kelurahan},
                success:function(data){
                    console.log(data)
                }
            })
        })
    });
</script> --}}


