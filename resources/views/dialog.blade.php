@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chats</div>

                <div class="panel-body">
                    <dial-messages v-bind:messages="messages"></dial-messages>
                </div>
                <div class="panel-footer">
                    <dial-form v-bind:user="{{auth()->user()}}"
							   v-on:sendmessage="addMessage"	
					></dial-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection