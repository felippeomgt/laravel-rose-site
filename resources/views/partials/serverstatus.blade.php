<div class="server-status">
    <img src="{{ asset('images/download_button.png') }}">
    <span class="image-overlay server-status-overlay">
                <img src="{{ asset('images/muse.png') }}">
            </span>
    <div class="big-padding">
        <h1 class="border">Status do servidor</h1>
        @if(@fsockopen("54.207.254.207", 29000, $e, $s, 2) && @fsockopen("54.207.254.207", 29100, $e, $s, 2) && @fsockopen("54.207.254.207", 29200, $e, $s, 2))       
            <span class="online">online</span>
        @else
            <span class="offline">offline</span>
        @endif

        <ul class="user-info">
            <li>{{\App\UserInfo::count()}} Contas</li>
            <li>{{\App\Avatar::count()}} Chars</li>
			<li>{{\App\Clans::count()}} Clans</li>			
        </ul>
		
		<h1>Rates do servidor</h1>
        <ul class='rates'>
            <li><span class="server-rate">exp</span>30x</li>
            <li><span class="server-rate">zuly</span>5x</li>
            <li><span class="server-rate">drop</span>1x</li>
        </ul>
    </div>
</div>