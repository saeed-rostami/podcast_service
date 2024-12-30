{{--@extends('admin.layout')--}}

{{--@section('content')--}}
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">مدیریت پادکست</h2>
                </div>

                <div class="col-auto">
                    <input
                        wire:model.live.debounce.500ms="search"
                        placeholder="نام پادکست.."
                        class="form-control"
                        type="text">
                </div>

                <div class="col-auto">
                    <a wire:navigate href="{{ route('admin.podcast.create') }}" type="button" class="btn btn-primary"><span class="fe fe-plus-circle fe-12 mr-2"></span>ایجاد پادکست جدید</a>
                </div>
            </div>

            <div class="card shadow" wire:loading>
                <div class="card-body text-center">
                    <strong>
                        در حال انجام...
                    </strong>
                </div>
            </div>

            <!-- table -->
            <div wire:loading.remove class="card shadow">
                <div class="card-body">
                    <table class="table table-borderless table-hover">
                        <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>توضیحات</th>
                            <th>تعداد اپیزود</th>

                            <th>کاور</th>
                            <th>دسته بندی</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($podcasts as $podcast)
                            <tr>
                                <td>
                                    {{ $podcast->id }}
                                </td>
                                <td>
                                    <p class="mb-0 text-muted">
                                        <strong>{{$podcast->title}}</strong>
                                    </p>

                                </td>

                                <td>
                                    <p class="mb-0 text-muted">
                                        {{\Illuminate\Support\Str::limit($podcast->description, 30)}}
                                    </p>

                                </td>

                                <td>
                                    {{ $podcast->episodes->count() }}
                                </td>

                                <td>
                                    <img
                                        style="width: 100px; height: 100px"
                                        src="{{ asset('storage/' . $podcast->cover) }}" alt="">
                                </td>


                                <td>
                                    {{ $podcast->category->title }}
                                </td>
                                <td class="text-muted">{{verta($podcast->created_at)->format('%Y, %B %d')}}</td>

                                <td>
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a wire:navigate class="dropdown-item" href="{{ route('admin.podcast.update', $podcast) }}">ویرایش</a>
                                        <button
                                            wire:click="delete({{ $podcast }})"
                                            wire:confirm="آیا مطمنی از پاک کردن؟"
                                            class="btn btn-sm dropdown-item" >حذف</button>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- .col-12 -->
        {{$podcasts->links()}}

    </div> <!-- .row -->

</div> <!-- .container-fluid -->
{{--@endsection--}}
