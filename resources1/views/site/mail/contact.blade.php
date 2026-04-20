<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Booked Success</title>
	<style>
		table,
		td,
		div,
		h1,
		p {
			font-family: Arial, sans-serif;
		}
	</style>
</head>

<body style="margin:0;padding:0;">


	<table style="background: #f4f4f4; color: #313745; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:.95rem;line-height:1.3; margin: auto; max-width: 660px; width: 100%;">

		<tr>
			<td style="background: #f38643; padding: 1.75rem 2rem; text-align: center">
				<img src="{{asset('site-assets/images/logo.png')}}" alt="Masala House" style="height: 60px; margin: auto; width: auto;">
			</td>
		</tr>

		
		<tr>
			<td style="padding:1rem;">
				<h1 style="color: #313745; font-size: 1.3rem; font-weight: 500; line-height: 1.5; margin: 0 0 .75rem;">Hello {{$details['data']['name'] ?? ''}}!</h1>
				<p style="color: #313745; line-height: 1.5; margin: 0;">
					Thank you for choosing us.
				</p>
				<p style="color: #313745; line-height: 1.65; margin: 1.5rem 0 0;">
					Phone: <b>+{{$details['phone'] ?? '525-847-0411'}}</b> <br />
					Email: <b><a href="mailto:{{$details['siteemail'] ?? 'info@masalahousepittsburg.com'}}" target="_blank" style="color:#006dad;">
							{{$details['siteemail'] ?? 'info@masalahousepittsburg.com'}}</a></b>
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<hr style="margin:0;">
			</td>
		</tr>
		<tr>
			<td style="padding:1rem;">
				<table style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
					<tr>
						<td>
							<h2 style="color:#000;margin:0 0 10px;font-size:14px;font-weight:600;text-transform:uppercase;">
								PERSONAL DETAILS
							</h2>
						</td>
					</tr>
					<tr>
						<td>
							<table style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">


								@isset($details['data'])
								@foreach($details['data'] as $key => $value)
								<tr>
									<td style="width: 170px; font-weight: 600; vertical-align: top;">{{ucfirst($key)}} :</td>
									<td >
										{{$value}}
									</td>
								</tr>
								@endforeach
								@endisset

							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<hr style="margin:0;">
			</td>
		</tr>




		<tr>
			<td style="padding:0.8rem 1rem;">

				<strong style="display:block;margin:0 0 6px 0;">Regards,</strong>
				<strong style="padding-bottom: 6px; display: inline-block;">Customer Service</strong><br>
				Masala House<br><br>
				<b>Phone:</b> {{$details['phone'] ?? '(525) 847-0411'}}<br>

				<b>Email:</b> {{$details['siteemail'] ?? 'sales@gmail.com'}}<br>
				<b>Web:</b> <a href="{{$details['website'] ?? ''}}" target="_blank">{{$details['website'] ?? ''}}</a>
			</td>
		</tr>

		<tr>
			<td style="background: #000000; color: #ddd;  padding: 2.25rem 2rem; text-align: center">
				<table style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
					<tr>
						<td>
							<a href="{{$details['social']['facebook'] ?? ''}}" target="_blank" style="color: #eee;  font-weight: 500; padding: .25rem 1rem; text-decoration: none;">Facebook</a>|
							<a href="{{$details['social']['instagram'] ?? ''}}" target="_blank" style="color: #eee;  font-weight: 500; padding: .25rem 1rem; text-decoration: none;">Instagram</a>|
							<a href="{{$details['website'] ?? ''}}" target="_blank" style="color: #eee;  font-weight: 500; padding: .25rem 1rem; text-decoration: none;">Masala House Pittsburg</a>
						</td>
					</tr>

					<tr>
						<td>
							<p style=" line-height: 1.75; margin: 1rem 0 0;">
								{{$details['address'] ?? ''}}
							</p>
						</td>
					</tr>

					<tr>
						<td style="">
							<p style=" line-height: 1.5; margin: 1.25rem 0 0;">
								<i>© Masala House. All rights reserved. {{ date('Y') }}</i>
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>

</html>