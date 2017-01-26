@if(isset($delete) AND $delete === true)
    <div class="bg-danger clearfix">
            <a href="{{ route('editArticle', ['articleID' => $article->id]) }}" class="btn">
                <i class="fa fa-btn fa-remove" title="cancel"></i> cancel
            </a>
        <form action="{{ route('destroyArticle', ['articleID' => $article->id]) }}" method="post" class="pull-right">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button name="delete" class="btn btn-danger">
                <i class="fa fa-btn fa-trash" title="delete"></i> confirm delete
            </button>
        </form>
    </div>
@endif