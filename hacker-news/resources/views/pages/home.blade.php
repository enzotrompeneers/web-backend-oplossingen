@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Article overview</div>
                    <div class="panel-content">
                        <ul class="article-overview">
                            <li>
                                <div class="vote">                
                                    <div class="form-inline upvote">
                                        <i class="fa fa-btn fa-caret-up disabled upvote" title="You need to be logged in to upvote"></i>
                                    </div>
                                    <div class="form-inline upvote">
                                        <i class="fa fa-btn fa-caret-down disabled downvote" title="You need to be logged in to downvote"></i>
                                    </div>
                                </div>
                                <div class="url">
                                    <a href="http://arstechnica.com/gaming/2016/07/scythe-the-most-hyped-board-game-of-2016-delivers/" class="urlTitle">Scythe, the most-hyped board game of 2016, delivers</a>
                                </div> 
                                <div class="info">
                                    7 points  | posted by Tomte | <a href="comments/1">4 comments</a>
                                </div>
                            </li>

                            <li>
                                <div class="vote">
                                    <div class="form-inline upvote">
                                        <i class="fa fa-btn fa-caret-up disabled upvote" title="You need to be logged in to upvote"></i>
                                    </div>
                                    <div class="form-inline upvote">
                                        <i class="fa fa-btn fa-caret-down disabled downvote" title="You need to be logged in to downvote"></i>
                                    </div>
                                </div>
                                <div class="url">
                                    <a href="https://blog.mozilla.org/security/2016/08/01/enhancing-download-protection-in-firefox/" class="urlTitle">Enhancing Download Protection in Firefox</a>
                                </div> 
                                <div class="info">
                                    3 points  | posted by eto3 | <a href="comments/4">2 comments</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop