<div class="container border-top mt-5 mb-2">
  @if(session('message')=='successdelete')
  <div class="alert alert-success mt-2" role="alert">
    Successfully deleted a schedule.
  </div>
  @endif
<div class="container mt-5">
    <h6> Scheduled Appointments </h6>
<table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
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
      <td>{{$item->date}}</td>
      <td>{{$item->time}}</td>
      <td>
        @if ($item->status == 0)
            Pending
        @else
            Approved
        @endif
      </td>
      <td>
        <form method="POST" action="{{route('schedule.destroy',$item->id)}}">
          @csrf
          @method('DELETE') 
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
        
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



