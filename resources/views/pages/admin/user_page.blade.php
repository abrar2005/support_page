@extends('layout.master')
@section('title', 'vib-future -- User')
@section('content')

    <div class="profile">
        <div class="profile__avatar"><img src="/img/icons/user_img.svg" alt=""></div>
        <div class="profile__content">
            <h1>{{ $user->first_name . ' ' . $user->surname }}</h1>
            <span class="profile__content__id">#{{ $user->id }}</span>
        </div>
    </div>

    <div class="action_buttons" style="margin-block: 1rem">
        {{-- DELETE USER --}}
        <form action="{{ route('user.destroy', $user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="red">delete</button>
        </form>


        <button type="submit" form="update_user" class="orange">update</button>


        {{-- VERIFY USER --}}
        @if ($user->is_verified === 0)
            <form action="/verify_user/{{ $user->id }}" method="post">
                @csrf
                @method('PATCH')

                <button type="submit" class="blue">verify</button>
            </form>
        @else
        @endif
    </div>

    <style>
        .setting__item {
            border-block: 1px solid #503535;
            margin-top: 2rem;
            padding-top: 1rem;
        }

        .setting__item__description span {
            color: grey
        }
    </style>

    <form action="{{ route('user.update', $user->id) }}" method="POST" id="update_user">
        @csrf
        @method('patch')

        <div class="setting">
            <div class="setting__item">
                <div class="setting__item__description">
                    <span>Info:</span>
                </div>
                <div class="setting__item__inputs">
                    <img class="setting__item__inputs__icon" src="/img/icons/user/mail.svg" alt="">
                    <input value="{{ $user->email }}" type="text" name="email" id="">
                    <div class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="setting__item__inputs">
                    <img class="setting__item__inputs__icon" src="/img/icons/user/phone.svg" alt="">
                    <input value="{{ $user->phone }}" type="text" name="phone" id="">
                    <div class="text-danger">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="setting__item__inputs">
                    <img class="setting__item__inputs__icon" src="/img/icons/user/building.svg" alt="">
                    <input value="{{ $user->occupation }}" type="text" name="occupation" id="">
                    <div class="text-danger">
                        @error('occupation')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="setting__item__inputs">
                    <img class="setting__item__inputs__icon" src="/img/icons/user/ticket.svg" alt="">
                    <input value="{{ $ticket_count }} ticket" readonly type="text" name="" id="">
                </div>

            </div>
        </div>

        <div class="setting">
            <div class="setting__item">
                <div class="setting__item__description">
                    <span>Setting:</span>
                </div>
                <div class="setting__item__inputs">
                    <span>Admin</span>
                    <select name="admin_role" id="">
                        <option value="{{ $user->admin_role === 1 ? 1 : 0 }}">
                            {{ $user->admin_role === 1 ? 'True' : 'False' }}
                        </option>
                        <option value="{{ $user->admin_role === 0 ? 1 : 0 }}">
                            {{ $user->admin_role === 0 ? 'True' : 'False' }}
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </form>

    <div class="tickets setting__item">
        <div class="setting__item__description"><span></span></div>
        <div class="ticket">
            <header class="ticket__header">
                <div class="ticket__header__main">
                    <h3>Notes</h3>
                </div>
            </header>

            <form action="{{ route('note.store', ['user_id' => $user->id]) }}" method="post">
                @csrf
                
                    <textarea name="note_content" rows="5" placeholder="Beschrijv een notitie van de gebruiker">{{ $note ? $note->note_content : '' }}</textarea>

                <button type="submit" class="blue">submit</button>
            </form>
        </div>
    </div>

    </div>

@endsection
