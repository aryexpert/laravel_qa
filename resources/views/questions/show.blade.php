@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                   <div class="card-body">
                       <div class="card-title">
                           <div class="d-flex align-items-center">
                               <h3>{{ $question->title }}</h3>
                               <div class="ml-auto">
                                   <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Questions</a>
                               </div>
                           </div>
                       </div>

                       <hr>

                       <div class="media">
                           <div class="d-flex flex-column vote-controls">
                               <a title="This question is useful" class="vote-up">
                                   <i class="fas fa-caret-up fa-2x"></i>
                               </a>
                               <span class="votes-count">1230</span>
                               <a title="This question is not useful" class="vote-down-off">
                                   <i class="fas fa-caret-down fa-2x"></i>
                               </a>
                               <a title="click to make as favorite question (click to undo)" class="favorite favorited">
                                   <i class="fas fa-star fa-lg"></i>
                                   <span class="favorites-count">123</span>
                               </a>
                           </div>
                           <div class="media-body">
                               {!! $question->body_html !!}
                               <div class="float-right">
                                   <span class="text-muted">Answered {{ $question->created_date }}</span>
                                   <div class="media mt-2">
                                       <a href="{{ $question->user->url }}" class="pr-2"><img src="{{ $question->user->avatar }}"></a>
                                       <div class="media-body mt-1">
                                           <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                   </div>
                </div>
            </div>
        </div>
        @include ('answers._index', [
                    'answers' => $question->answers,
                    'answersCount' => $question->answers_count,
                    ])
        @include ('answers._create')
    </div>
@endsection
