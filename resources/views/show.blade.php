<div class="container my-5">
    <div class="row">
        <div class="card">
            <img src="{{ asset('storage/app/public/'.$post->cover) }}" alt="" class="img-fluid">
            <div class="card-body">
                <h1 class="card-title">{{ $post->title }}</h1>
                <div class="d-flex my-2">
                    <small class="text-muted">by {{ $post->user->name }} ・ {{
                        Carbon\Carbon::parse($post->created_at)->isoFormat('D MMMM Y'); }}</small>
                </div>
                <p>{{ $post->desc }}</p>
                <div class="card-footer bg-transparent d-flex mx-auto">
                    <a href="{{ route('category',$post->category->slug) }}" class="text-dark">{{ $post->category->name
                        }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
