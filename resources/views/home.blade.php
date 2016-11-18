@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body" id="application-id">
                    <message-component message="You are logged in!"></message-component>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    {{--
        Our View Component
        keywords: text/x-template, id
    --}}
    <script type="text/x-template" id="message-component">
        <p> @{{ message }} </p>
    </script>

    {{--
        Define Our VueJs Component
        keywords: template, props, methods
    --}}
    <script type="text/javascript">
        var messageComponent = Vue.component('message-component',{
            template : '#message-component',
            props : {
                message : ''
            },
            methods : {
                say : function() {
                    alert(this.message);
                }
            }
        });
    </script>

    {{--
        Initialize our VueJs Application
        keyword: new Vue(), el, components
    --}}
    <script type="text/javascript">
        new Vue({
            el : '#application-id',
            components : {
                'message-component' : messageComponent
            }
        })
    </script>

@endsection
