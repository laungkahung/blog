@extends('dashboard.dashboard')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Article</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a class="btn btn-sm btn-outline-secondary" href="/dashboard/article/add">Add</a>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>

    <h2>List</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Keywords</th>
                    <th>Source</th>
                    <th>Updated Time</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
            @forelse($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->keywords }}</td>
                <td>{{ $item->source }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <a class="btn btn-sm btn-outline-secondary" href="/dashboard/article/edit/{{ $item->id }}">Edit</a>
                    <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" onclick="showDelModal('/dashboard/article/delete/'+{{ $item->id }},'#delModal')" >Delete</button>
                </td>
                {{--data-target=".bs-example-modal-sm"--}}
            </tr>
            @empty
            <tr class="bc-white">
                <td colspan="6">
                    <div class="alert alert-warning text-center" role="alert">Is Empty...</div>
                </td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $list->links() }}
    <!-- Small modal -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" id="delModal" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tip</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure delete？</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="sureDel('#delModal')">Sure</button>
                </div>
            </div>
        </div>
    </div>
@endsection