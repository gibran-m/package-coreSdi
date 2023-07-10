@if (Session::has('success'))
    <div style="display: block;" class="flashdata" data-type="success" data-message="{{ Session::get('success') }}"></div>
    {{ Session::forget('success') }}
    {{ Session::save() }}
@elseif(Session::has('info'))
    <div style="display: block;" class="flashdata" data-type="info" data-message="{{ Session::get('info') }}"></div>
    {{ Session::forget('info') }}
    {{ Session::save() }}
@elseif(Session::has('warning'))
    <div style="display: block;" class="flashdata" data-type="warning" data-message="{{ Session::get('warning') }}"></div>
    {{ Session::forget('warning') }}
    {{ Session::save() }}
@elseif(Session::has('error'))
    <div style="display: block;" class="flashdata" data-type="error" data-message="{{ Session::get('error') }}"></div>
    {{ Session::forget('error') }}
    {{ Session::save() }}
@endif