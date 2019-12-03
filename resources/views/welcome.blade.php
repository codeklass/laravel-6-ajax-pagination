@extends('layouts.app')

@section('content')
<div class="container mt-3">
  <h2>Laravel 6 AJAX Students CRUD Tutorial</h2>
             
             
             <div class="clearfix"></div>
             <div id="studentContainer">
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
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">


$(document).on('click', '.pagination a',function(e)
    {
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        e.preventDefault();
        var myurl = $(this).attr('href');
        console.log(myurl);
       var page=$(this).attr('href').split('page=')[1];
       console.log(page);
       getData(page);
    });


function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html",
            // beforeSend: function()
            // {
            //     you can show your loader 
            // }
        })
        .done(function(data)
        {
            console.log(data);
            
            $("#studentContainer").empty().html(data);
            //location.hash = page;
            console.log(location.hash);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });
}
</script>
@endsection