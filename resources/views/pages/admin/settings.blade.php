@extends('layout.master')
@section('title', 'vib-future -- Settings')
@section('content')
    <h1>Settings</h1>
    <div class="setting">
        <div class="setting__item">
            <form action="">
                <div class="setting__item__description">
                    <span>Email</span>
                    <p>The email of the tickes would be sent at the following emails. user's email is not editable.</p>
                </div>
                <div class="setting__item__inputs">
                    <input value="info@vib-future.nl" type="text" name="to_email" id="">
                    <span>+</span>
                    <input value="{USER}" readonly type="text" name="" id="">
                    <button class="blue">save</button>
                </div>
            </form>
        </div>


    </div>
@endsection
