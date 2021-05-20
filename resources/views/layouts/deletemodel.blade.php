
   <script>
        $(document).ready(function(){
            $(".deleteListItem").click(function(){
                $("#DeleteModel").show();
                $("#DleteForm").attr("action",$(this).attr("action"));
            });
        });

    </script>

    

<div class="modal modal-fixed-right fade" id="DeleteModel"  tabindex="-1" role="dialog" aria-labelledby="exampleModalRightLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-vertical"  role="document">
    <div class="modal-content border-0 min-vh-100">
    
      <div class="modal-body py-5 text-center">
     
          <div class="row">
            <div class="col-md-12 mt-5">
                <span>
                    <span class="fas fa-trash fa-2x text-danger"></span>
                </span>
                <h5 class="modal-title mt-3" id="UserCradentialLabel">Delete {{Str::ucfirst(Request::segment(1))}}</h5>
                <p>Are you sure you want to delete ?</p>
                <p> <small> Once you delete the {{Str::ucfirst(Request::segment(1))}} will no longer available.</p></small>
            </div>

            <div class="col-md-12">
                <div class="d-flex justify-content-center ">
                    <div class="p-2">
                        <form action="" id="DleteForm" method="post"  class="form-inline">
                            @csrf
                            @method("DELETE")
                            <div class="justify-content-center">
                                <button class="btn btn-primary" type="submit">Yes, Delete</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">No</button> 
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
                
            
           
            
           
        </div>
      </div>

    </div>
  </div>
</div>