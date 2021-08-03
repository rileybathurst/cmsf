wp.domReady( () => {

	wp.blocks.registerBlockStyle(
		'core/group',
		[
			{
				name: 'alignfull',
				label: 'alignfull',
			}
		]
	);

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