@extends('dashboard.dashboard')
@section('css')
    {!! editor_css() !!}
@endsection
@section('content')
    <form method="post" enctype="multipart/form-data" id="formId">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="col-md-8 col-lg-10">
                <input type="hidden" name="id" value="{{ isset($article['id'])?$article['id']:'' }}">
                <div class="form-group">
                    <label for="titleFormControlInput">Title:</label>
                    <input type="text" name="title" class="form-control"
                           value="{{ isset($article['title'])?$article['title']:'' }}"
                           placeholder="title....">
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">Keyword:</label>
                        <input type="text" class="form-control" name="keywords"
                               value="{{ isset($article['keywords'])?$article['keywords']:'' }}"
                               placeholder="mysql,laravel,bootstrap" required>
                        <div class="invalid-tooltip">
                            Please input a valid keyword. more use , off
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="source">Source:</label>
                        <input type="text" class="form-control"
                               value="{{ isset($article['source'])?$article['source']:'Marki' }}"
                               placeholder="Marki author" name="source" required>
                        <div class="invalid-tooltip">
                            Please input article source. default Marki
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="excerpt">Excerpt:</label>
                    <textarea class="form-control" id="excerpt" name="excerpt"
                              rows="3">{{ isset($article['excerpt'])?$article['excerpt']:'' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <div id="editormd_id">
                        <textarea name="content"
                                  style="display:none;">{{ isset($article['content'])?$article['content']:'' }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-2 border rounded p-3" id="rightPart">
                <div class="form-group">
                    <label for="thumb">Thumb:</label>
                    <input type="file" name="thumb" class="form-control" id="thumb" hidden>
                    <input name="has_thumb" class="form-control" value="{{ isset($article['has_thumb'])?$article['has_thumb']:'' }}" hidden>
                    <div class="pt-1 thumbnail">
                        <img src="{{ isset($article['thumb'])?$article['thumb']:asset('bootstrapdashboard/article.png') }}"
                             id="imgThumb" width="100%">
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="thumb">State:</label>
                    <div class="row">
                        <div class="col-4">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="recommended"
                                       @if(isset($article['recommended'])?$article['recommended']:'0' == 1) checked
                                       @endif >推荐
                            </label>
                        </div>
                        <div class="col-4">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="istop"
                                       @if(isset($article['istop'])?$article['istop']:'0' == 1) checked
                                       @endif >置顶
                            </label>
                        </div>
                        <div class="col-4">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="publish_status"
                                       @if(isset($article['publish_status'])?$article['publish_status']:'1' == 1) checked
                                       @endif >发布
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="button" onclick="ajaxSubmitForm()">Submit form</button>
        <a class="btn btn-dark" href="javascript:history.back(-1)">返回</a>
    </form>
@endsection
@section('script')
    {!! editor_js() !!}
    <script type="text/javascript">
        "use strict";

        $(document).ready(function () {
            $("#imgThumb").height($("#rightPart").width());
        });

        /**
         * click img tag readFile
         * */
        $("#imgThumb").click(function () {//点击img标签显示文件
            $("#thumb").click();//触发选择文件
            $("#thumb").change(function () {
                let context = $(this);

                if (window.FileReader) {//判断是否支持FileReader
                    var reader = new FileReader();
                } else {
                    alert("您的设备不支持图片预览功能！");
                }

                let file = context[0].files[0];//获取文件
                let imageType = /^image\//;

                if (!imageType.test(file.type)) {//是否是图片
                    alert("请选择图片！");
                    return;
                }

                reader.onload = function (e) { //读取完成
                    let editImg = document.getElementById('imgThumb');
                    editImg.style.display = 'block';
                    editImg.setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(file);
            })
        });

        /**
         * ajax submit form
         */
        function ajaxSubmitForm() {
            // var params = $("#formId").serialize();
            let params = new FormData($("#formId")[0]);
            let url    = "/dashboard/article/create";
            post(url, params);
        }
    </script>
@endsection