 <h2><span>Admin</span> Broadcast Emails</h2>

 <div class="clear"></div>

 <div class="content email-content">
  <form class="form-horizontal" method="post" action="#">

    <div class="row-fluid broadcost-fields" style="padding-bottom: 25px;">
      <div style="width: 16%; float:left; margin-right: 1%; padding-left: 7%">
        <label style="width: 52%">User Type:</label> 
        <select name="" class="input-field" style="width: 47%; margin: 0 0 0 1%;">
          <option selected="selected">Twitter</option>
          <option>Facebook</option>
          <option>Email</option>
          <option>All</option>
        </select>
      </div>

      <div style="width: 16%; float:left; margin-right: 1%">
        <label style="width: 52%">Email Type:</label> 
        <select name="" class="input-field" style="width: 47%; margin: 0 0 0 1%;">
          <option selected="selected">Lorem</option>
        </select>
      </div>

      <div style="width: 30%; float:left; margin-right: 1%">
        <label style="width: 53%">Recency of User Sign In:</label> 
        <select name="" class="input-field" style="width: 30%;">
          <option selected="selected">10 Days</option>
        </select>
      </div>

      <div style="width: 28%; float:left">
        <label style="width: 46%;">Furthest Open Stage:</label> 
        <select name="" class="input-field" style="width: 44%;">
          <option selected="selected">Lorem Ipsum Stage</option>
        </select>
      </div>
    </div>

    <div class="row-fluid">
      <label style="width: 7%">Subject:</label> 
      <input name="" style="width: 90%;" class="input-field" value="" placeholder="Email Subject" type="text">
    </div>
    <!--/ -->
    <div class="row-fluid">
      <label style="width: 7%;">email:</label> 
      <span style="width: 91%; display: inline-block">
        <textarea name="email" id="email"  rows="" cols="" class="input-field" style="width:900px;"></textarea>
      </span>
    </div>

      <div class="control-group">

        <div class="controls" style="margin-left: 0; margin-top: 15px"> <span style="display: block;" class="text-center">

          <button class="btn btn-primary" type="submit">Send</button>

          <button class="btn btn-primary" type="submit">Cancel</button>

        </span> </div>

      </div>


    </form>        

  </div>
<script type="text/javascript">
  $(function(){
    tinymce.init({
      mode : "exact",
      elements : "email",
      width : 'auto',
      theme: "modern",
      plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "template paste textcolor"
      ],
      toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
      toolbar2: "print preview media | forecolor backcolor emoticons",
      image_advtab: true
    });
  });
</script>