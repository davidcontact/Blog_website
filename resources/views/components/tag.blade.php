<div class="card mb-4">
    <div class="card-header">Tags</div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-6">
          <ul class="list-unstyled mb-0">
            @foreach ($tags as $tag)
            <li>
              <a href="{{ route('home', ['tag' => $tag->name ])}}"> {{ $tag->name }} </a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>