<footer>
		<div class="row footer">
			<div class="col-xs-12 col-sm-6 footer-left">
				<p class="regular">® Copyright 2017 Zigvy </p>
			</div>
			<div class="footer-right">
				<td align="right">HELLO {{Auth::user()->name}} | <a href="{{route('logout')}}"> LOG OUT</a></td>
			</div>
		</div>
</footer>
