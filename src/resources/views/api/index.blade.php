@extends('layouts.app')
@section('content')
    <form  method="post" enctype="multipart/form-data" action="/api/foo">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="exampleInputFile" name="images">
            <p class="help-block">Example block-level help text here.</p>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox"> Check me out
            </label>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection