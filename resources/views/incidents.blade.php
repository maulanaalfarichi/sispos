@extends('layouts.app-front')

@section('content')
<h1 class="page-title">Daftar status area terdampak</h1>

<div class="search-page search-content-2">
    <div class="search-bar">
        <div class="row">
            <div class="col-md-12">
                <form method="GET" class="no-margin">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Isi kata pencarian..." value="{{ $search }}" />
                        <span class="input-group-btn">
                            <button class="btn blue uppercase bold" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="search-container">
            @if ( ! $list->isEmpty())
                <ul class="search-container">
                @foreach ($list as $item)
                    <li class="search-item clearfix">
                        <div class="search-content text-left">
                            <h2 class="search-title">{{ $item->getPresenter()->title }}</h2>
                            <p class="margin-bottom-10">{{ $item->created_at }} | {{ $item->getPresenter()->author->name }}</p>
                            <p class="search-desc">{!! nl2br($item->description) !!}</p>
                            @if ( ! $item->getPresenter()->files->isEmpty())
                            <div class="row area-status-photos margin-top-10">
                                @foreach ($item->getPresenter()->files as $file)
                                <div class="col-xs-6 col-sm-2">
                                  <a href="{{ sprintf(url('/storage/%s'), $file->filename) }}" target="_blank" class="thumbnail">
                                    <img src="{{ sprintf(url('/storage/%s'), $file->filename) }}" alt="" />
                                  </a>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </li>
                @endforeach
                </ul>
                <div class="search-pagination">
                    <?php echo $list->appends(['search' => $search])->render(); ?>
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
