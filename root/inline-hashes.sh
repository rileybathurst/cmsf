#Inline hasehes to be generated and the result
echo -n 'if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}' | openssl sha256 -binary | openssl base64

'3fUfhN2mTz/8Ymg3jrA3Fs88rCDClpZgruCXvG/SZ6s='

echo -n 'var Jetpack_Block_Assets_Base_Url = {"url":"https:\/\/cordellfoundation.org\/wp-content\/plugins\/jetpack\/_inc\/blocks\/"};' | openssl sha256 -binary | openssl base64

'G/I8sfug39/Yi8anH9Jqsx6kGBk/MYoBJzKlcIn+9Gw='

echo -n '_stq = window._stq || [];
	_stq.push([ 'view', {v:'ext',j:'1:10.0',blog:'194729327',post:'28',tz:'0',srv:'cordellfoundation.org'} ]);
	_stq.push([ 'clickTrackerInit', '194729327', '28' ]);' | openssl sha256 -binary | openssl base64

'D3K1C1kOCxhHQDFS4cPinG/Ztqw1UuIvcxAoc9Ln8tg='

