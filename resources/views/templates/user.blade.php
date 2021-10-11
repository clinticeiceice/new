<div class="row">
    <div class="col-md-12 mt-2">
        <h1 class="text-secondary text-center mt-3"><strong>Macrohon Municipal Waterworks System</strong></h1>
    </div>
</div>
<h4 class="text-secondary mt-5">WELCOME : {{ strtoupper(Auth::user()->name) }}</h4>
<div class="row">
    <div class="col-md-6">
        <h3 class="mt-2 h5 text-secondary ps-0"><i data-feather="edit-3" class="ps-0"></i>&nbsp; Logged in as: &nbsp;<span class="text-primary">{{ Auth::user()->user_role() }} - {{ Auth::user()->username }}</span></h3>
    </div>
    <div class="col-md-6">
        <form action="{{route('logout')}}" method="post" class="mt-0 px-0 pt-0 w-100">
            @csrf
            <button type="submit" class="btn btn-danger mt-0 float-md-end">
            <i data-feather="log-out" class="feather-16 mb-1"></i>&nbsp; LOGOUT USER
            </button>
        </form>
    </div>
</div>
