@extends('layout.main')

@section('title', 'Officers')

@section('content')

<div class="row mt-4">
  <div class="col-md-12 mt-3">
    @if(session('created'))
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        <strong>Great!</strong> {{session('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
      <div class="col-md-6">
        <h5 class="text-secondary h4 mt-4"><i data-feather="align-right" class="mb-1 feather-30 me-1"></i> Lists of Officers</h5>
      </div>
      <div class="col-md-6">
        <a class="btn btn-primary mb-3 pb-2 pt-2 mt-2 float-end" href="{{route('admin.officers.create')}}"><i data-feather="user-plus" class="feather-20 mx-1 pb-1 pt-1"></i> New Officer</a>
      </div>
    </div>
    <div class="card">
      <div class="table-responsive mb-0">
        <table class="table mb-0">
            <thead>
              <tr>
                <td scope="col" class="border-bottom-0 py-3"><strong>FULL NAME</strong></td>
                <td scope="col" class="border-bottom-0 py-3"><strong>POSITION</strong></td>
                <td scope="col" class="border-bottom-0 py-3"><strong>ACTIONS</strong></td>
              </tr>
            </thead>
            <tbody>
                @forelse($officers as $officer)
                <tr>
                  <td scope="row" class="border-bottom-0 border-top">{{$officer->fullname}}</td>
                  <td class="border-bottom-0 border-top">{{$officer->prettyPosition()}}</td>
                  <td class="border-bottom-0 border-top">

                    <a href="{{route('admin.officers.edit',$officer)}}">Edit</a>
                    <span> | </span>
                    <form action="{{route('admin.officers.destroy',$officer)}}" method="post" style="display:inline">
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure you want to delete this officer? This cannot be reverted back.')">Delete</button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="3" class="text-center border-top border-bottom-0">No records yet!</td>
                </tr>
                @endforelse
            </tbody>
          </table>

      </div>

    </div>
    {{$officers->links()}}
  </div>
</div>
@endsection
