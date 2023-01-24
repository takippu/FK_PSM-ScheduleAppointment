<div class="container border-top mt-5 mb-2">
  @if(session('message')=='successdelete')
  <div class="alert alert-success mt-2" role="alert">
    Successfully deleted a schedule.
  </div>
  @elseif(session('message')=='successedit')
  <div class="alert alert-success mt-2" role="alert">
    Successfully edited a schedule.
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
        @elseif($item->status == 1)
            Approved
        @else
            Rejected
        @endif
      </td>
      <td>
        @if ($item->status == 0)
          <div class="btn-group">
            <form method="POST" action="{{route('schedule.destroy',$item->id)}}">
              @csrf
              @method('DELETE') 
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
            @include('schedule.component.editModal')
            <button type="button" class="btn btn-info btn-sm ml-2" data-toggle="modal" data-target="#editForm-{{$item->id}}">Edit</button>

          </div>
        @elseif($item->status == 1)
            <div class="btn-group">
              <form method="POST" action="{{route('schedule.destroy',$item->id)}}">
                @csrf
                @method('DELETE') 
              <button type="submit" class="btn btn-danger btn-sm" disabled>Delete</button>
              </form>
              @include('schedule.component.editModal')
              <button type="button" class="btn btn-info btn-sm ml-2" data-toggle="modal" data-target="#editForm-{{$item->id}}" disabled>Edit</button>

            </div>
        @else
            <div class="btn-group">
              <form method="POST" action="{{route('schedule.destroy',$item->id)}}">
                @csrf
                @method('DELETE') 
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
              @include('schedule.component.editModal')
              <button type="button" class="btn btn-info btn-sm ml-2" data-toggle="modal" data-target="#editForm-{{$item->id}}">Reschedule</button>

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




