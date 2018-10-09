@extends('layouts.form')

@section('card')

    @component('components.card')

        @slot('title')
            @lang('Gestion des catégories')
        @endslot


        <table class="table">
            <tbody>
            @foreach($categories as $category)
                <tr id="tr_{{$category->id}}">
                    <td>{{ $category->name }}</td>
                    <td>
                        <a  href="{{ route('category.destroy', $category->id) }}"
                           class="btn btn-danger btn-sm pull-right delt-btn" data-toggle="tooltip"
                           title="@lang('Supprimer la catégorie') {{ $category->name }}"><i
                                    class="fas fa-trash fa-lg"></i></a>
                        <a  href="{{ route('category.edit', $category->id) }}"
                           class="btn btn-warning btn-sm pull-right mr-2" data-toggle="tooltip"
                           title="@lang('Modifier la catégorie') {{ $category->name }}"><i
                                    class="fas fa-edit fa-lg"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endcomponent

@endsection

@section('script')

    @include('partials.script-delete', ['text' => __('Vraiment supprimer cette catégorie ?'), 'return' => 'removeTr'])

@endsection