<html>

<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
	<table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #ff5353;">
		<thead>
			<tr>
				<th style="text-align:left;"><img style="max-width: 150px;" src="{{asset('site-assets/images/logo-color.png')}}"
						alt=""></th>
				<th style="text-align:right;font-weight:400; font-size: 15px;">{{\Carbon\Carbon::now()->format('l, d F, Y')}}</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td style="height:35px;"></td>
			</tr>
			<tr>
				<td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Hello Customer</td>
			</tr>
			<!-- <tr>
				<td colspan="2" style="padding:15px;">
					<p style="font-size:14px;margin:0;">
						<span style="display:block;font-size:13px;font-weight:normal;"> Your order has been placed successfully with ORDER ID:.</span>
					</p>
				</td>
			</tr> -->
			<tr>
				<td colspan="2" style="padding:15px;">
					<p style="font-size:14px;margin:0;">
						<span style="display:block;font-size:13px;font-weight:normal;text-align: center;">
							Thank you for choosing us.</span>
					</p>
				</td>
			</tr>

			<tr>
				<td>
					<table style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
						<tr>
							<td style="vertical-align: top; padding: 0 2% 0 3%;">
								@foreach($details['data'] as $key => $value)
								{{ucfirst($key)}}: <span style="font-size: small;">{{$value}}</span> <br>
								@endforeach
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</tbody>
		<tfooter>
			<tr>
				<td colspan="2" style="font-size:14px;padding:20px 15px 0 15px;">
					<strong style="display:block;margin:0 0 6px 0;">Regards,</strong>
					<strong style="padding-bottom: 6px; display: inline-block;">Customer Service</strong><br>
					Masala House<br><br>
					<b>Phone:</b> {{$details['phone'] ?? '(525) 847-0411'}}<br>
					<b>Address:</b> {{$details['address'] ?? ''}}<br>
					<b>Email:</b> {{$details['siteemail'] ?? 'sales@gmail.com'}}<br>
					<b>Web:</b> <a href="#!"></a>
				</td>
			</tr>
		</tfooter>
	</table>
</body>

</html>