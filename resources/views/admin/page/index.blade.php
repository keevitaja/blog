@extends('admin.app')

@section('content')
    <main class="container">
        <h1 class="title">@lang('admin.pages')</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>@lang('admin.title')</th>
                    <th class="actions">
                        <a href="{{ route('admin.page.create') }}">
                            @lang('admin.new')
                        </a>
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>
                            <a href="{{ route('admin.page.edit', $page->id) }}">
                                {{ $page->content->title }}
                            </a>
                        </td>
                        <td class="actions">
                            <form
                                action="{{ route('admin.page.destroy', $page->id) }}"
                                method="POST"
                                style="display: inline;"
                            >
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">

                                <a class="destroy" href="{{ route('admin.page.destroy', $page->id) }}">
                                    @lang('admin.delete')
                                </a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection