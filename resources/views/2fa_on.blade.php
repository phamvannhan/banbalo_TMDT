





<div class="container">
	<div class="row" style="text-align: center">
		<form action='{{url("/2fa.html")}}' method="post">
			{{csrf_field()}}
			<input type="hidden" value="on" name="stt">
		<div class="col-lg-6">
			<ul style="list-style-type: none">
				<li><img src="{{ $google2fa_url }}" alt=""></li>
				<li>Mã QR</li>
			</ul>
		</div>
		<div class="col-lg-6">
			<ul style="list-style-type: none">
				<li>
					<input type="text" name="secret">
            		<button class="btn btn-primary" type="submit">Xác minh</button>
       			</li>
    		</ul>
		</div>
		<div class="col-md-6">
            <ul style="list-style-type: none">
                @if(session('thongbao'))
                    <li>{{ session('thongbao') }}</li>
                @endif
                @if(count($errors) > 0)
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
                @endif
            </ul>
        </div>
		</form>
	</div>

</div>

