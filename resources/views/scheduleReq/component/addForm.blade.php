
<h2 class="text-center mt-5 border-bottom text-monospace text-weight-bold">Appointment</h2>
<div class="container mt-5">
  @if(session('message')=='successcreate')
  <div class="alert alert-success mt-2" role="alert">
    Successfully created a schedule.
  </div>
  @elseif(session('message')=='exists')
  <div class="alert alert-warning" role="alert">
    The schedule for the date is already exists.
  </div>
  @endif
    <div class="col">
      <form action="{{route('schedule.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
      <div class="row justify-content-center">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Date</span>
            <input type="text" name="date" class="date form-control" placeholder="date" aria-label="date" aria-describedby="basic-addon1" autocomplete="off" required>
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
      <input type="hidden" value="0" name="status">
      <div class="row justify-content-end">
        <button type="submit" class="btn btn-primary">Add New</button>
        
      </div>
    </div>

  </form>
  </div>
</div>
<script type="text/javascript">
    $('.date').datepicker({  
       format: 'mm-dd-yyyy',
       startDate: 'today'
     });  
</script> 