@extends('layouts.dashboard') 
@section('styles') 
@include('shared.chat-css') 
@endsection 
@section('content')
<div class="container-fluid inbox">
  <div class="card chat-app">
    <div id="plist" class="people-list">
      @php 
        $users = $conversations->map(function($item) { 
          return $item->participants->map(function($item1) use ($item) { 
            $user = $item1->user;
            $user->conversation = $item; 
            return $user; 
          })->filter(function($item2) { 
              return $item2->id != Auth::user()->id; 
            }); 
          })->flatten(); 
      @endphp
      <div class="d-grid gap-2 mb-3">
        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#new-message">
          Create New Message
        </button>
      </div>
      <div class="mb-3 d-none">
        <input type="search" class="form-control" list="suggestions" placeholder="Search user..." />
        <datalist id="suggestions">
          @foreach(collect($users) as $user)
            <option value="{{ $user->first_name.' '.$user->last_name }}">
          @endforeach
        </datalist>
      </div>
      <ul class="list-unstyled chat-list mb-0 p-2" style="height: 70vh; overflow-y: scroll; overflow-x: hidden;">
        @foreach ($conversations as $data)
        <li>
          <a href="{{ route('inbox.show', $data->id) }}" class="d-flex justify-content-start align-items-center">
            <div class="d-flex justify-content-start align-items-center">
              <div class="avatars">
                @foreach ($data->participants as $participant) 
                  <img src="{{ $participant->user->photo }}" class="avatars__item bg-secondary" style="margin-left: -37px;">
                @endforeach
              </div>
              <div class="about">
                <div class="name">
                  @if(! empty($data->name))
                    {{ $data->name }}
                  @else
                    {{ \App\Helpers\Utils::formatArray($data->participants->map(function($item) { 
                      return $item->user->first_name; 
                    })) }}
                  @endif
                </div>
                <p style="overflow-wrap: break-word; overflow:hidden;" class="status mb-0"> <i class="fa fa-circle offline"></i> {{ substr(strip_tags($data->lastMessage->message ?? ''), 0, 20) }}...</p>
              </div>
            </div>
          </a>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="chat position-relative">
      @if (isset($conversation))
      <div class="chat-header clearfix">
        <div class="row">
          <div class="col-md-8 d-flex justify-content-start align-items-center">
            <div class="chat-about">
              <h6 class="mb-0">
                @if(! empty($conversation->name))
                  {{ $conversation->name }}
                @else
                  {{ \App\Helpers\Utils::formatArray($conversation->participants->map(function($item) { 
                    return $item->user->first_name; 
                  })) }}
                @endif
              </h6>
            </div>
          </div>
          <div class="col-md-4 hidden-sm d-flex justify-content-end align-items-center">
            <a href="javascript:void(0);" class="btn btn-outline-secondary me-1 d-none"><i class="fa fa-camera"></i></a>
            <a href="javascript:void(0);" class="btn btn-outline-primary me-1 d-none"><i class="fa fa-image"></i></a>
            <a href="javascript:void(0);" class="btn btn-outline-info me-1 d-none"><i class="fa fa-cogs"></i></a>
            <a href="javascript:void(0);" class="btn btn-outline-warning me-1 d-none"><i class="fa fa-question"></i></a>

            <button type="button" class="btn btn-success btn-sm me-1" data-bs-toggle="modal" data-bs-target="#rename">
              <i class="fas fa-file-signature"></i>
            </button>

            <button type="button" class="btn btn-success btn-sm me-1" data-bs-toggle="modal" data-bs-target="#add">
              <i class="fas fa-plus"></i>
            </button>
            <button type="button" class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#delete">
              <i class="fas fa-trash"></i>
            </button>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#leave">
              <i class="fas fa-sign-out-alt"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="chat-history">
        <ul class="m-b-0" id="chat-history">
        </ul>
      </div>
      <div class="chat-message clearfix" style="bottom: 0;">
        <form id="chat-message" action="{{ route('inbox.send', $conversation->id) }}" method="POST">
          @csrf
          <div class="input-group mb-3">
            <input type="text" name="message" class="form-control" placeholder="Enter text here...">
            <button class="btn btn-outline-secondary" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </div>
        </form>
      </div>
      <form method="POST" action="{{ route('inbox.update', $conversation->id) }}" data-ajax="true">
        <div class="modal" tabindex="-1" id="rename">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header border-0">
                <h5 class="modal-title">Rename Conversation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                @include('generate.input', [
                  'label' => 'Name',
                  'name' => 'name',
                  'value' => $conversation->name,
                  'formGroupClass' => 'mb-3'
                ])
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="modal fade" id="leave">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h5 class="modal-title" id="leaveLabel">Do you want to <strong class="text-danger">&nbsp;leave&nbsp;</strong>this conversation?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Select "Confirm" below if you are continue this action.</p>
            </div>
            <div class="modal-footer border-0">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <a class="btn btn-danger" href="{{ route('inbox.leave', $conversation->id) }}">Confirm</a>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h5 class="modal-title" id="leaveLabel">Do you want to <strong class="text-danger">&nbsp;delete&nbsp;</strong>this conversation?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Select "Confirm" below if you are continue this action.</p>
            </div>
            <div class="modal-footer border-0">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <a class="btn btn-danger" href="{{ route('inbox.delete', $conversation->id) }}">Confirm</a>
            </div>
          </div>
        </div>
      </div>
      <div class="modal" tabindex="-1" id="add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h5 class="modal-title">Add User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <ul class="list-group">
                @foreach($all_users as $user)
                  @if(! $conversation->participants()->where(['user_id' => $user->id])->first())
                    <li class="list-group-item">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start align-items-center">
                          <div class="me-2">
                            <div class="avatars">
                              <img src="{{ $user->photo }}" class="avatars__item bg-secondary">
                            </div>
                          </div>
                          <div class="about">
                            <div class="name">
                              <h5 class="mb-0">{{ $user->first_name }} {{ $user->last_name }}</h5>
                            </div>
                            <p style="overflow-wrap: break-word; overflow:hidden;" class="status mb-0"> <i class="fas fa-brackets-curly"></i> {{ $user->role->name }}</p>
                          </div>
                        </div>
                        <a href="{{ route('inbox.add', ['conversation_id' => $conversation->id, 'user_id' => $user->id]) }}" class="btn btn-success">
                          <i class="fa fa-plus"></i>
                        </a>
                      </div>
                    </li>
                  @endif
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="h-100 w-100 d-flex justify-content-center align-items-center">
        <p>Select Thread</p>
      </div>
      @endif
    </div>
  </div>
</div>
<form method="POST" action="{{ route('inbox.create') }}" data-ajax="true">
  <div class="modal fade" id="new-message">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="leaveLabel">Create New Message</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @csrf
          @include('generate.input', [
            'label' => 'Group Name (Optional)',
            'name' => 'name',
            'value' => '',
          ])
          <div class="mb-3">
            <label>Recipients</label>
            <select class="js-example-basic-multiple" name="recipients[]" multiple="multiple">
              @if(auth()->user()->role->slug === 'teacher')
                <optgroup label="Subject Codes">
                  @foreach(auth()->user()->subjectCodes as $subjectCode)
                    <option value="subject-code-{{ $subjectCode->id }}">{{ $subjectCode->name }}</option>
                  @endforeach
                </optgroup>
              @endif
              <optgroup label="Users">
                @foreach($all_users as $user)
                  <option value="user-{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
          @include('generate.textarea', [
            'label' => 'Message',
            'name' => 'message',
            'value' => '',
            'rows' => 6,
          ])
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection 
@section('javascript') 
@include('shared.chat-js') 
<script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        theme: "bootstrap-5",
        dropdownParent: $('#new-message')
    });
  });
</script>
@endsection