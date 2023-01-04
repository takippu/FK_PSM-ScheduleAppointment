
<h2 class="text-center mt-5 border-bottom text-monospace text-weight-bold">Scheduler</h2>
<div class="container mt-5">
    <div class="col">
      <form>
      <div class="row justify-content-center">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Date</span>
            <input type="text" class="date form-control" placeholder="date" aria-label="date" aria-describedby="basic-addon1">
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="input-group mb-3">
          <label class="input-group-text" for="inputGroupSelect01">Time</label>
          <select class="form-select" id="basic-addon1">
            <option selected>Choose...</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
      </div>
      <div class="row justify-content-end">
        <button type="submit" class="btn btn-primary">Add new </button>
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