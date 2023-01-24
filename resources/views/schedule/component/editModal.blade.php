<!-- Modal -->
<div class="modal fade" id="editForm-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editForm-{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Schedule #@php echo $num; @endphp</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col">
                <form action="{{route('schedule.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="row justify-content-center">
                  <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Date</span>
                      <input type="text" name="date" class="date form-control" value="{{$item->date}}" aria-label="date" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row justify-content-center">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Time</label>
                    <select class="form-select" name="time" id="basic-addon1" required>
                      <option   selected>...</option>
                      <option value="9.00 AM">9.00 AM</option>
                      <option value="10.00 AM">10.00 AM</option>
                      <option value="12.00 PM">12.00 PM</option>
                    </select>
                  </div>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" value="0" name="status">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        
        </div>
         </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $('.date').datepicker({  
       format: 'mm-dd-yyyy',
       startDate: 'today'
     });  
</script> 