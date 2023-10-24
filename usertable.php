<?php include'header.php'; ?>

<div class="card">
   <div class="card-header d-flex justify-content-between">
      <div class="header-title">
         <h4 class="card-title">Client information</h4>
      </div>

   </div>
   <div class="card-body">
     
          <div class="form-group col-md-3 float-right">
            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Type User First Name here" />
          </div>
          <div class="table-responsive" id="dynamic_content">
            
          </div>
        </div>
      </div>
      <script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{action:"show_all_user",page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });

  });
</script>

<?php include'footer.php' ?>