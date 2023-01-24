<div class="container border-top mt-5 mb-2">
  @if(session('message')=='accepted')
  <div class="alert alert-success mt-2" role="alert">
    Successfully accepted a schedule.
  </div>
  @elseif(session('message')=='rejected')
  <div class="alert alert-success mt-2" role="alert">
    Successfully rejected a schedule.
  </div>
  @elseif(session('message')=='fail')
  <div class="alert alert-danger mt-2" role="alert">
    Something went wrong.
  </div>
  @endif
<div class="container mt-5">
    <h6> Appointment Requests from Students </h6>
<table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Student Name</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    @php
    $num = 0;
    @endphp
    <tbody>
      @forelse ($schedules as $item)
      @php
          $num++;
      @endphp
    <tr>
      <th scope="row">@php echo $num; @endphp</th>
      <td>{{$item->user->name}}</td>
      <td>{{$item->date}}</td>
      <td>{{$item->time}}</td>
      <td>
        @if ($item->status == 0)
            Pending
        @elseif($item->status == 1)
            Approved
        @else
            Rejected
        @endif
      </td>
      <td>
        @if ($item->status == 0)
          <div class="btn-group">
            <form action="{{route('acceptReq',$item->id)}}" method="POST">
              @csrf
              @method('PUT')
              <input type="hidden" value="{{$item->id}}" name="scheID">
              <input type="hidden" value="1" name="status">
            <button type="submit" class="btn btn-success btn-sm ml-2" >Accept</button>
            </form>
            
            <form action="{{route('rejectReq',$item->id)}}" method="POST">
              @csrf
              @method('PUT')
              <input type="hidden" value="{{$item->id}}" name="scheID">

              <input type="hidden" value="2" name="status">
              <button type="submit" class="btn btn-danger btn-sm ml-2" >Reject</button>
            </form>
            </div>

        @else
          <div class="btn-group" >
            <form action="{{route('acceptReq',$item->id)}}" method="POST">
              @csrf
              @method('PUT')
              <input type="hidden" value="{{$item->id}}" name="scheID">
              <input type="hidden" value="1" name="status">
            <button type="submit" class="btn btn-success btn-sm ml-2" disabled>Accept</button>
            </form>
            
            <form action="{{route('rejectReq',$item->id)}}" method="POST">
              @csrf
              @method('PUT')
              <input type="hidden" value="{{$item->id}}" name="scheID">

              <input type="hidden" value="2" name="status">
              <button type="submit" class="btn btn-danger btn-sm ml-2"disabled >Reject</button>
            </form>
            </div>
        @endif

        
      </td>

    </tr>
    @empty
    <tr>
      <td>No scheduled appointment..</td>
    </tr>
    @endforelse
    </tbody>
  </table>
</div>




