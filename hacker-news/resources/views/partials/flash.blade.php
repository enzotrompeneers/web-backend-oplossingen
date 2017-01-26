@if (Session::has('flashMessage'))
    <div class="bg-success">
        {{Session('flashMessage')}}
    </div>
@endif