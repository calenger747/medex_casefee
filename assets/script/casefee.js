$(document).ready(function(){

  var casefee = $('#casefee').DataTable({
    "pageLength" : 10,
    "serverSide": true,
    "processing": true,
    "order": [[0, "asc" ]],
    "ajax":{
      url :  'http://localhost/medex_casefee/Casefee/showCasefee',
      type : 'POST'
    },
    "lengthMenu": [
    [10, 25, 50, -1],
    [10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search records",
    }
  });

  // Untuk sunting User
  $('#myModalEdit').on('show.bs.modal', function(event) {
    var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
    var modal = $(this)

    // Isi nilai pada field
    // modal.find('#edit_id').attr("value", div.data('id'));
    modal.find('#edit_case_id').attr("value", div.data('case_id'));
    modal.find('#edit_remarks').attr("value", div.data('remarks'));
    modal.find('#edit_payment').attr("value", div.data('payment'));
    modal.find('#edit_date').attr("value", div.data('date'));
    // modal.find('#email').attr("value", div.data('email'));
    // modal.find('#no_telp').attr("value", div.data('no_telepon'));
    // $('.select2_single option[value="'+level+'"]').attr('selected','selected');
  });

  $('#casefee').on('click','.delete_casefee', function(){
    var id =  $(this).data('id');
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this data!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((result) => {
      if (result) {
        $.ajax({
          url: "" + id,  
          method: "GET",
          beforeSend :function() {
            swal({
              title: 'Please Wait',
              html: 'Deleting data',
              onOpen: () => {
                swal.showLoading()
              }
            })      
          },
          success:function(data){
            swal({
              title: "Deleted!",
              icon: "success",
              text: "Data has been deleted",
              buttons: "Close",
            });
            casefee.ajax.reload();
          }
        });
      }
    })
  });
});