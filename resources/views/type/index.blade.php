@extends('main.index')

@section('modalContent')
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p>Confirm delete <span id="deleteProduct">XXX</span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form id="modalDeleteResourceForm" action="" method="post">
            @method('delete')
            @csrf
            <input type="submit" class="btn btn-primary" value="Delete type"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
    {{-- @parent --}}
    <div class="row" style="margin-top: 8px;">
        @if(session()->has('user'))
            User is logged in.
        @else
            User is not looged in.
        @endif
        &nbsp;
    </div>
    <div class="row" style="margin-top: 8px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"># id</th>
                    <th scope="col">name</th>
                    <th scope="col">description</th>
                    @if(session()->has('user'))
                    <th scope="col">delete</th>
                    <th scope="col">edit</th>
                    @endif
                    <th scope="col">show</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>
                            {{ $type->id }}
                        </td>
                        <td>
                            {{ $type->nombre }}
                        </td>
                        <td>
                            {{ $type->descripcion }}
                        </td>
                        @if(session()->has('user'))
                            <td>
                                <a href="javascript: void(0);" 
                                   data-name="{{ $type->nombre }}"
                                   data-url="{{ url('type/' . $type->id) }}"
                                   data-toggle="modal"
                                   data-target="#modalDelete">delete</a>
                            </td>
                            <td>
                                <a href="{{ url('type/' . $type->id . '/edit') }}">edit</a>
                            </td>
                        @endif
                        <td>
                            <a href="{{ url('type/' . $type->id) }}">show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if(session()->has('user'))
    <div class="row">
        <a href="{{ url('type/create') }}" class="btn btn-success">add type</a>
    </div>
    @endif
@endsection

@section('scripts')
<script src="{{ url('assets/js/product-modal-delete.js') }}"></script>
@endsection