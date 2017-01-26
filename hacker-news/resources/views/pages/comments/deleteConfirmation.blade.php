

@if($delete === true)
    <div class="bg-danger clearfix">
        <form action="{{ route('cancelDelete') }}" method="post" class="pull-right">
            {{ csrf_field() }}
            <button name="cancel" class="btn">
                <i class="fa fa-btn fa-remove" title="cancel"></i> cancel
            </button>
        </form>
        <form action="{{ route('destroyComments', ['commentID' => $comment->id }}" method="post" class="pull-right">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button name="delete" class="btn btn-danger">
                <i class="fa fa-btn fa-trash" title="delete"></i> confirm delete
            </button>
        </form>
    </div>
@endif