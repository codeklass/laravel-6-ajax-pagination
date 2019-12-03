<table class="table table-striped mt-5">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Location</th>
        
      </tr>
    </thead>
    <tbody id="studData">
    @forelse($students as $student)
      <tr id="stud{{$student->id}}">

        <td>{{$student->id}}</td>
        <td>{{$student->name}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->location}}</td>
      </tr>
      @empty
      <tr id='noStudData'><td colspan="5" class="text-center">Sorry No Students</td></tr>
      @endforelse

    </tbody>
  </table>
  {!! $students->render() !!}