@if(session('msg'))
  <div class="flash ok">{{ session('msg') }}</div>
@endif
@if(session('error'))
  <div class="flash err">{{ session('error') }}</div>
@endif
