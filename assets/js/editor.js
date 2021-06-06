wp.domReady( () => {

	wp.blocks.registerBlockStyle(
		'core/image',
		[
			{
				name: 'desatured-multiply',
				label: 'Desaturated Multiply',
			}
		]
	);

} );