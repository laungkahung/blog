@extends('home.home_app')
@section('style')
    <link href="{{ asset('home/css/index.css') }}" rel="stylesheet">
@endsection
@section('content')
        <table class="table table-hover">
            <tbody>
            <tr>
                <td class="pr-0 pl-0 table-td">
                    <div class="imgWrap">
                        <a href="#" target="_blank"><span></span><img class="img-rounded"
                                                                      src="{{ asset('home/images/like-thumb-up-outlined-symbol.png') }}"
                                                                      alt=""/></a>
                    </div>
                    <div class="item-content">
                        <a class="title" target="_blank" href=""><h3>h2. Bootstrap heading</h3></a>
                        <p class="m-1">
                            Secondary text Secondary textSecondary textSecondary
                            textSecondary textSecondary textSecondary textSecondary
                        </p>
                        <div class="meta">
                            <a class="nickname" target="_blank" href="/u/b879ea8ce4da">公子义</a>
                            <a target="_blank" href="/p/cfed03f9d22b#comments">
                                <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 0
                            </a>
                            <span class="glyphicon glyphicon-heart"> 0</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="item-content">
                        <a class="title" target="_blank" href=""><h3>h2. Bootstrap heading</h3></a>
                        <p>Secondary text Secondary textSecondary textSecondary
                            textSecondary textSecondary textSecondary textSecondary
                            textSecondary textSecondary textSecondary text
                            extSecondary textSecondary textSecondary textSecondary
                            textSecondary textSecondary textSecondary textextSecondary textSecondary textSecondary textSecondary
                            textSecondary textSecondary textSecondary text
                            textSecondary textSecondary textSecondary textextSecondary textSecondary textSecondary textSecondary
                            textSecondary textSecondary textSecondary text      textSecondary textSecondary textSecondary textextSecondary textSecondary textSecondary textSecondary
                            textSecondary textSecondary textSecondary text

                        </p>
                        <div class="meta">
                            <a class="nickname" target="_blank" href="/u/b879ea8ce4da">公子义</a>
                            <a target="_blank" href="/p/cfed03f9d22b#comments">
                                <i class="iconfont ic-list-comments"></i> 0
                            </a>
                            <span><i class="iconfont ic-list-like"></i> 0</span>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <ul class="imgWrap clearfix">
                <a href="#" class="imgBox"><span></span><img
                            src="{{ asset('home/images/like-thumb-up-outlined-symbol.png') }}" alt=""/></a>
                <a href="#" class="imgBox"><span></span><img
                            src="{{ asset('home/images/like-thumb-up-outlined-symbol.png') }}" alt=""/></a>
                <a href="#" class="imgBox"><span></span><img
                            src="{{ asset('home/images/like-thumb-up-outlined-symbol.png') }}" alt=""/></a>
                <a href="#" class="imgBox"><span></span><img
                            src="{{ asset('home/images/like-thumb-up-outlined-symbol.png') }}" alt=""/></a>
        </ul>
@endsection
