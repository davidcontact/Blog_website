<div class="card mb-4">
    <div class="card-header">Search</div>
    <div class="card-body">
      <form method="GET" action="{{ route('home') }}">
        @foreach (collect(request()->query())->only(['category_id', 'tag']) as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <div class="input-group">
          <input
          class="form-control"
          name="search"
          type="text"
          placeholder="Enter search term..."
          aria-label="Enter search term..."
          aria-describedby="button-search"
          />
        <button
          class="btn btn-primary"
          id="button-search"
          type="submit"
        >
          Go!
        </button>
      </div>
      </form>
    </div>
  </div>