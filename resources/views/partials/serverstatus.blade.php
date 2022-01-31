<div class="server-status">
    <a href="https://lsroseonline.s3.sa-east-1.amazonaws.com/setup/lsroseonline.exe"><img src="{{ asset('images/download_button.png') }}"></a>
    <span class="image-overlay server-status-overlay">
                <img src="{{ asset('images/muse.png') }}">
            </span>
    <div class="big-padding">
        <h1 class="border-ls">Status do servidor</h1>
        @if(@fsockopen("177.71.147.73", 29000, $e, $s, 2) && @fsockopen("177.71.147.73", 29100, $e, $s, 2) && @fsockopen("177.71.147.73", 29200, $e, $s, 2))       
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
            <li><span class="server-rate">exp</span>10x</li>
            <li><span class="server-rate">zuly</span>5x</li>
            <li><span class="server-rate">drop</span>1x</li>
        </ul>
    </div>
</div>