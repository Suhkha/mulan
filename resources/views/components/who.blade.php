@if(Auth::guard('web')->check())
	<strong>You are --user--</strong>
@else
	<strong>You are not in session --user--</strong>
@endif

@if(Auth::guard('admin')->check())
	<strong>You are --admin--</strong>
@else
	<strong>You are not in session --admin--</strong>
@endif