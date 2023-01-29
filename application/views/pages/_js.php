<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js" integrity="sha512-D7wym1iXOnyjJbX5hKh84TRFqnXTd7Qc0biqMOmoKgTRRZjUznfgM4Fk8Ta7x8Wp3o8HyKLb3A2kgxq1S6/4fA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $('#birthDate').datepicker({
          formatDate: 'mm-dd-yy',
          changeMonth: true,
          changeYear: true,
          autoclose: true,
          orientation: 'top',
          todayHighlight: true
        });

        $(".addDocuments").click(function(){
          addDocuments();
        });
    });

    var place = $("#documentPlace");
    function addDocuments(){
      var html = '<div class="row mb-3">' +
          '<div class="col-lg-3">' +
              '<input type="file" name="documents[]" accept="application/pdf" class="form-control"/>' +
              '<p style="font-style: italic;font-size:12px">*File maks. 2MB dan memiliki ekstensi .pdf</p>' +
              '<p style="color: red;font-size:12px" class="documentsError"></p>' +
          '</div>' +
          '<div class="col-lg-3">' +
              '<button type="button" class="btn btn-danger delDocuments">-</button>' +
              '<button type="button" class="btn btn-success addDocuments" onClick="addDocuments()">+</button>' +
          '</div>' +
      '</div>';

      place.append(html);
      _reTypeId();
    }

    function delDocuments(idx){
      place.find('.row[data-id='+idx+']').remove();
      _reTypeId();
    }

    function _reTypeId(){
      place.find('.row').each(function(k,v){
        var idx = k+1;
        $(this).attr('data-id', idx);
        $(this).find('.delDocuments').attr('onClick','delDocuments('+idx+')');
        $(this).find('input').attr('name','documents['+idx+']');
      });
    }

</script>